<?php

namespace App\Filament\Widgets;

use App\Models\Product; // Pastikan model Product diimpor
use Filament\Widgets\Widget;

class CustomerKatalog extends Widget
{
    protected string $view = 'filament.widgets.customer-katalog';

    // Membuat widget memenuhi lebar layar penuh
    protected int | string | array $columnSpan = 'full';

    // Fungsi untuk memanggil produk di file blade
    public function getProducts()
    {
        return Product::with('variants')->get();
    }
}
