<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Tambah Produk' }}</div>

                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <label for="name" class="col-md-12 col-form-label text-md-left">
                            {{ 'Nama Produk' }}
                        </label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            wire:model="name" value="{{ old('name') }}" required autofocus />

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="price" class="col-md-12 col-form-label text-md-left">
                            {{ 'Harga Produk' }}
                        </label>
                        <input type="number" id="price" class="form-control @error('price') is-invalid @enderror"
                            wire:model="price" value="{{ old('price') }}" required autofocus />

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="weight" class="col-md-12 col-form-label text-md-left">
                            {{ 'Berat Produk' }}
                        </label>
                        <input type="number" id="weight" class="form-control @error('weight') is-invalid @enderror"
                            wire:model="weight" value="{{ old('weight') }}" required autofocus />

                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="image" class="col-md-12 col-form-label text-md-left">
                            {{ 'Gambar Produk' }}
                        </label>
                        <input type="file" id="image" class="form-control @error('weight') is-invalid @enderror"
                            wire:model="image" />

                        @error('weight')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-block">Tambah Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
