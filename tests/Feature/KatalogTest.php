<?php

namespace Tests\Feature;

use App\Models\Kategori;
use App\Models\Produk;
use Database\Seeders\KatalogSeeder;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class KatalogTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_katalog_menampilkan_produk_kategori_harga_dan_stok_dari_database(): void
    {
        $this->seed(KatalogSeeder::class);

        $response = $this->get(route('katalog.index'));

        $response->assertOk()
            ->assertSeeInOrder(['Buku Tulis', 'Kopi Ende', 'Nasi Bungkus', 'Pulpen', 'Roti', 'Teh Kotak'])
            ->assertSee('Minuman')
            ->assertSee('Rp 15.000')
            ->assertSee('12 tersedia')
            ->assertSee('Habis')
            ->assertSee('Menampilkan 6 produk');
        $this->assertTrue($response->viewData('produk')->every(fn (Produk $item) => $item->relationLoaded('kategori')));
    }

    public function test_katalog_menampilkan_pesan_ketika_database_kosong(): void
    {
        $this->get(route('katalog.index'))
            ->assertOk()
            ->assertSee('Belum ada produk.')
            ->assertSee('Menampilkan 0 produk');
    }

    public function test_pencarian_memfilter_nama_produk_dan_menampilkan_pesan_jika_tidak_ada_hasil(): void
    {
        $this->seed(KatalogSeeder::class);

        $this->get(route('katalog.index', ['q' => 'Kopi']))
            ->assertOk()
            ->assertSee('Kopi Ende')
            ->assertDontSee('Teh Kotak')
            ->assertSee('Menampilkan 1 produk');

        $this->get(route('katalog.index', ['q' => 'tidak ada']))
            ->assertOk()
            ->assertSee('Belum ada produk.')
            ->assertSee('Tidak ada hasil untuk');
    }

    public function test_pencarian_menolak_input_yang_bukan_teks(): void
    {
        $this->from(route('katalog.index'))
            ->get(route('katalog.index').'?q[]=kopi')
            ->assertRedirect(route('katalog.index'))
            ->assertSessionHasErrors('q');
    }

    public function test_katalog_mengambil_perubahan_terbaru_dan_mengamankan_output(): void
    {
        $this->seed(KatalogSeeder::class);
        Produk::where('sku', 'KOP-001')->update(['nama' => '<script>alert(1)</script>', 'harga' => 20000]);

        $this->get(route('katalog.index'))
            ->assertOk()
            ->assertSee('<script>alert(1)</script>')
            ->assertDontSee('<script>alert(1)</script>', false)
            ->assertSee('Rp 20.000');
    }

    public function test_seeder_dapat_diulang_dan_relasi_kategori_berfungsi(): void
    {
        $this->seed(KatalogSeeder::class);
        $this->seed(KatalogSeeder::class);

        $this->assertDatabaseCount('kategori', 3);
        $this->assertDatabaseCount('produk', 6);
        $kopi = Produk::where('sku', 'KOP-001')->firstOrFail();
        $minuman = Kategori::where('nama', 'Minuman')->firstOrFail();
        $this->assertSame('Minuman', $kopi->kategori->nama);
        $this->assertSame(2, $minuman->produk()->count());
        $this->assertSame(1, $minuman->produk()->where('stok', '>', 0)->count());
    }

    public function test_produk_menolak_kategori_yang_tidak_ada(): void
    {
        $this->expectException(QueryException::class);

        Produk::create([
            'kategori_id' => 999,
            'sku' => 'INVALID',
            'nama' => 'Produk tanpa kategori',
            'harga' => 1000,
            'stok' => 1,
        ]);
    }
}
