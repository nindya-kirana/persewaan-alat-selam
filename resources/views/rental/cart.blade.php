
<style>
    .cart-page {
        background-color: #6b9a85; /* Hijau sage mockup */
        min-height: 100vh;
        padding: 40px 20px;
        font-family: 'Poppins', sans-serif;
    }

    .cart-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .cart-title {
        color: white;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    /* Card Item Keranjang */
    .cart-item {
        background: white;
        border-radius: 20px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .item-left {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .item-checkbox {
        width: 20px;
        height: 20px;
        accent-color: #052c16;
        cursor: pointer;
    }

    .item-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
        background: #f0f0f0;
    }

    .item-info h3 {
        margin: 0;
        color: #052c16;
        font-size: 1.1rem;
        font-weight: 700;
    }

    .item-info p {
        margin: 5px 0 0;
        color: #1a7f64;
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Bagian Aksi */
    .item-right {
        text-align: right;
    }

    .item-price {
        font-size: 1.3rem;
        font-weight: 800;
        color: #052c16;
        margin-bottom: 15px;
    }

    .action-group {
        display: flex;
        align-items: center;
        gap: 15px;
        justify-content: flex-end;
    }

    .btn-delete {
        background: none;
        border: none;
        color: #64748b;
        cursor: pointer;
        font-size: 1.2rem;
        transition: 0.2s;
    }

    .btn-delete:hover { color: #ef4444; }

    /* Kontrol Jumlah (+/-) */
    .qty-control {
        display: flex;
        align-items: center;
        background: #f1f5f9;
        border-radius: 10px;
        padding: 5px;
        border: 1px solid #cbd5e1;
    }

    .qty-btn {
        width: 30px;
        height: 30px;
        border: none;
        background: none;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        color: #1a7f64;
    }

    .qty-btn:disabled { color: #cbd5e1; cursor: not-allowed; }

    .qty-input {
        width: 40px;
        text-align: center;
        border: none;
        background: none;
        font-weight: 700;
        font-size: 1rem;
        color: #052c16;
    }

    /* Ringkasan */
    .ringkasan-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-top: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .ringkasan-card h3 {
        margin-top: 0;
        color: #052c16;
        font-size: 1.2rem;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin: 15px 0;
        font-weight: 700;
        color: #052c16;
    }

    .total-text { font-size: 1.5rem; }

    .btn-checkout {
        background: #052c16;
        color: white;
        border: none;
        width: 100%;
        padding: 15px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-checkout:hover {
        background: #0a4d27;
        transform: translateY(-2px);
    }
</style>

<div class="cart-page">
    <div class="cart-container">
        <h1 class="cart-title">
            <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">❮</a> 
            Keranjang Saya
        </h1>

        @php $total = 0; $totalItems = 0; @endphp

        @forelse($cart as $id => $details)
            @php 
                $subtotal = $details['price'] * $details['quantity'];
                $total += $subtotal;
                $totalItems += $details['quantity'];
            @endphp
            
            <div class="cart-item">
                <div class="item-left">
                    <input type="checkbox" class="item-checkbox" checked>
                    <img src="{{ asset('storage/' . $details['image']) }}" class="item-img" onerror="this.src='https://placehold.co/200x200'">
                    <div class="item-info">
                        <h3>{{ $details['name'] }}</h3>
                        <p>Varian: {{ $details['variant_name'] }}</p>
                    </div>
                </div>

                <div class="item-right">
                    <div class="item-price">Rp {{ number_format($subtotal, 0, ',', '.') }}</div>
                    
                    <div class="action-group">
                        <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" title="Hapus Item">🗑️</button>
                        </form>

                        <div class="qty-control">
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="decrease">
                                <button type="submit" class="qty-btn" {{ $details['quantity'] <= 1 ? 'disabled' : '' }}>−</button>
                            </form>
                            
                            <input type="text" value="{{ $details['quantity'] }}" readonly class="qty-input">
                            
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="increase">
                                <button type="submit" class="qty-btn">+</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div style="text-align: center; color: white; padding: 50px;">
                <h2>Keranjangmu masih kosong :(</h2>
                <a href="{{ url('/') }}" style="color: #052c16; background: white; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-weight: bold; display: inline-block; margin-top: 20px;">Sewa Alat Sekarang</a>
            </div>
        @endforelse

        @if(count($cart) > 0)
        <div class="ringkasan-card">
            <h3>Ringkasan Alat Sewa</h3>
            
            <div class="summary-row">
                <span>Jumlah alat</span>
                <span>{{ $totalItems }}</span>
            </div>

            <div class="summary-row total-text">
                <span>Total</span>
                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>

            <button class="btn-checkout">Checkout</button>
        </div>
        @endif
    </div>
</div>