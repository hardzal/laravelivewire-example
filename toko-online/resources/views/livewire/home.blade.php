<div class="container">
    <!-- Authentication navigation -->
    @if(Auth::user())
    @if(Auth::user()->role_id == 1)
    <div class="div col-md-3">
        <a href="{{ url('/addproduct') }}" class="btn btn-success block">Tambah Produk</a>
    </div>
    @endif
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" wire:model="search" id="" class="form-control" placeholder="search..." />
            </div>
            <div class="input-group mb-3">
                <input type="text" wire:model="min_price" id="" class="form-control" placeholder="min price..." />
            </div>
            <div class="input-group mb-3">
                <input type="text" wire:model="max_price" id="" class="form-control" placeholder="max price..." />
            </div>
        </div>
    </div>

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
                    <div class="col-md-12 text-center">
                        <h5><strong>{{ $product->name }}</strong></h5>
                        <h6><strong>Rp {{ number_format($product->price) }}</strong></h6>
                    </div>
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
