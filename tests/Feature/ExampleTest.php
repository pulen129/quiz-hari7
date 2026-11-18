<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_halaman_utama_mengarahkan_ke_katalog(): void
    {
        $this->get('/')->assertRedirect('/katalog');
    }
}
