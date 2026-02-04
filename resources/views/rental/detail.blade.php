<style>
    /* Styling Halaman Utama */
    .detail-wrapper { padding: 50px; max-width: 1200px; margin: 0 auto; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
    .product-main { display: flex; gap: 50px; background: #fff; padding: 30px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .product-img { width: 450px; height: 450px; object-fit: cover; border-radius: 20px; background: #f8f9fa; }
    
    .info h1 { color: #052c16; font-size: 2.8rem; margin-bottom: 10px; font-weight: 700; }
    .price { font-size: 2rem; color: #1a7f64; font-weight: 600; margin-bottom: 20px; }
    .price span { font-size: 1.1rem; color: #6c757d; font-weight: 400; }
    
    .variant-label { font-weight: 600; margin-bottom: 15px; display: block; color: #333; }
    .variant-list { display: flex; gap: 12px; }
    .v-btn { 
        padding: 12px 35px; border: 2px solid #e2e8f0; border-radius: 12px; 
        background: #fff; cursor: pointer; font-weight: 600; transition: all 0.3s; color: #4a5568;
        font-family: inherit;
    }
    .v-btn:hover { border-color: #1a7f64; color: #1a7f64; background: #f0fdf4; }

    /* Box Deskripsi Hijau */
    .desc-box { margin-top: 40px; background: #6b9a85; color: white; padding: 30px; border-radius: 20px; line-height: 1.6; }
    .desc-box h4 { margin-bottom: 15px; font-size: 1.3rem; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 10px; font-weight: 700; }

    /* Modal Overlay & Card */
    .modal-overlay { 
        position: fixed; inset: 0; background: rgba(0,0,0,0.6); 
        display: none; align-items: center; justify-content: center; z-index: 9999; 
    }
    .modal-card { 
        background: white; padding: 40px; border-radius: 30px; width: 480px; 
        position: relative; animation: slideUp 0.4s ease; font-family: 'Segoe UI', sans-serif;
    }
    @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

    .close-modal { 
        position: absolute; right: 25px; top: 20px; background: none; border: none; 
        font-size: 24px; color: #1a7f64; cursor: pointer; font-weight: bold; 
    }

    .m-header { display: flex; gap: 20px; align-items: center; margin-bottom: 25px; }
    .m-header img { border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    .m-price { font-size: 1.8rem; color: #052c16; font-weight: 700; margin: 0; }
    
    .badge-size { 
        background: #f1f5f9; padding: 12px 30px; border-radius: 10px; 
        border: 2px solid #1a7f64; font-weight: 700; display: inline-block; margin: 10px 0 25px 0; color: #1a7f64;
    }

    .qty-control { display: flex; align-items: center; gap: 20px; margin-bottom: 30px; }
    .qty-btn { 
        width: 40px; height: 40px; border-radius: 10px; border: 1px solid #cbd5e1; 
        background: white; cursor: pointer; font-size: 1.2rem; font-weight: bold; transition: 0.2s;
    }
    .qty-btn:hover { background: #f8fafc; border-color: #1a7f64; }
    .qty-input { width: 60px; text-align: center; border: none; font-size: 1.2rem; font-weight: 700; font-family: inherit; }

    .btn-submit-cart { 
        background: #052c16; color: white; width: 100%; padding: 18px; 
        border-radius: 15px; border: none; font-weight: 700; cursor: pointer; font-size: 1.1rem; transition: 0.3s;
        font-family: inherit;
    }
    .btn-submit-cart:hover { background: #0a4d27; transform: translateY(-2px); }
</style>

<div class="detail-wrapper">
    <div class="product-main">
        <img src="{{ asset('storage/' . $product->image) }}" class="product-img" 
             onerror="this.src='https://placehold.co/500x500?text=No+Image'">
        
        <div class="info">
            <h1>{{ $product->nama_alat }}</h1>
            <p class="price">Rp {{ number_format($product->variants->min('harga_per_hari'), 0, ',', '.') }} <span>/Hari</span></p>
            
            <hr style="border: 0; border-top: 1px solid #f1f5f9; margin-bottom: 25px;">
            
            <span class="variant-label">Pilih Varian :</span>
            <div class="variant-list">
                @foreach($product->variants as $v)
                    <button type="button" class="v-btn" 
                            onclick="openModal('{{ $v->id }}', '{{ $v->size }}', {{ $v->stok_total }}, {{ $v->harga_per_hari }})">
                        {{ $v->size }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <div class="desc-box">
        <h4>Detail Produk :</h4>
        <p>{{ $product->deskripsi }}</p>
    </div>
</div>

{{-- Modal Keranjang --}}
<div id="cartModal" class="modal-overlay" onclick="if(event.target == this) closeModal()">
    <div class="modal-card">
        <button class="close-modal" onclick="closeModal()">&times;</button>
        
        <div class="m-header">
            <img src="{{ asset('storage/' . $product->image) }}" width="120" height="120" style="object-fit: cover;" onerror="this.src='https://placehold.co/200x200'">
            <div>
                <h2 id="m-price" class="m-price">Rp 0</h2>
                <p id="m-stock" style="margin: 5px 0 0 0; font-weight: 600;"></p>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #f1f5f9; margin-bottom: 20px;">

        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="variant_id" id="m-variant-id">
            <input type="hidden" name="start_date" value="{{ $start }}">
            <input type="hidden" name="end_date" value="{{ $end }}">

            <label style="font-weight: 600; color: #64748b;">Ukuran Terpilih</label><br>
            <div id="m-size-badge" class="badge-size">-</div>

            <label style="font-weight: 600; color: #64748b; display: block; margin-bottom: 10px;">Tentukan Jumlah</label>
            <div class="qty-control">
                <button type="button" class="qty-btn" onclick="updateQty(-1)">−</button>
                <input type="number" name="quantity" id="m-qty" value="1" min="1" readonly class="qty-input">
                <button type="button" class="qty-btn" onclick="updateQty(1)">+</button>
            </div>

            <button type="submit" id="m-submit" class="btn-submit-cart">
                🛒 Masukan Keranjang
            </button>
        </form>
    </div>
</div>

<script>
    let currentMaxStock = 0;

    function openModal(id, size, stock, price) {
        const modal = document.getElementById('cartModal');
        const submitBtn = document.getElementById('m-submit');
        const stockText = document.getElementById('m-stock');
        
        currentMaxStock = stock;
        document.getElementById('m-variant-id').value = id;
        document.getElementById('m-price').innerText = 'Rp ' + price.toLocaleString('id-ID');
        document.getElementById('m-size-badge').innerText = size;
        
        if(stock > 0) {
            stockText.innerText = 'Stok tersedia: ' + stock;
            stockText.style.color = '#1a7f64';
            submitBtn.disabled = false;
            submitBtn.innerText = '🛒 Masukan Keranjang';
            document.getElementById('m-qty').value = 1;
        } else {
            stockText.innerText = 'Maaf, Stok Habis';
            stockText.style.color = '#ef4444';
            submitBtn.disabled = true;
            submitBtn.innerText = 'Stok Tidak Tersedia';
            document.getElementById('m-qty').value = 0;
        }

        modal.style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('cartModal').style.display = 'none';
    }

    function updateQty(val) {
        const input = document.getElementById('m-qty');
        let newVal = parseInt(input.value) + val;
        
        if(newVal >= 1 && newVal <= currentMaxStock) {
            input.value = newVal;
        }
    }
</script>