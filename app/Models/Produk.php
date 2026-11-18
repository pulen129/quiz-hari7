<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Produk extends Model {
    protected $table = 'produk';
    protected $fillable = ['kategori_id', 'sku', 'nama', 'harga', 'stok'];
    protected $casts = ['harga' => 'integer', 'stok' => 'integer'];
    public function kategori(): BelongsTo {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
