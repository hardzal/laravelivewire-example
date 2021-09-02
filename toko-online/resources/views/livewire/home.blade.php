<div class="container">
    <!-- Authentication navigation -->
    @if(Auth::user())
    @if(Auth::user()->role_id == 1)
    <div class="div col-md-3">
        <a href="{{ url('/addproduct') }}" class="btn btn-success block">Tambah Produk</a>
    </div>
    @endif
    @endif

    <section class="products md-5">
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/photos/'. $product->image) }}" alt="{{ $product->name }}"
                            width="200px" height="270px" />
                    </div>
                </div>
                <div class="row mt-2">
                    <h5><strong>{{ $product->name }}</strong></h5>
                    <h6><strong>Rp {{ number_format($product->price) }}</strong></h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-block"
                            wire:click="buyProduct({{ $product->id }})">Buy</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
