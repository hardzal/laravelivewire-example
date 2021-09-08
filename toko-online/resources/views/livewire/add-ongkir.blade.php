<div class="container">
    <div class="row justify-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Tambah Ongkir') }}</div>
                <div class="card-body">

                    <form wire:submit.prevent="getOngkir">
                        <label for="provinsi" class="col-md-12 col-form-label text-md-left">
                            {{ ('Silahkan pilih provinsi Anda') }}
                        </label>
                        <select name="provinsi" id="provinsi_id" class="form-control" wire:model="province_id">
                            <option value="0">Pilih Provinsi</option>
                            @forelse($provinces as $province)
                            <option value="{{ $province['province_id'] }}">
                                {{ $province['province'] }}
                            </option>
                            @empty
                            <option value="0">Provinsi tidak ada</option>
                            @endforelse
                        </select>

                        <label for="city" class="col-md-12 col-form-label text-md-left">
                            {{ ('Silahkan pilih kota Anda') }}
                        </label>

                        <select name="city" id="city_id" class="form-control" wire:model="city_id">
                            <option value="">Pilih Kabupaten / Kota</option>
                            @if($province_id)
                            @forelse ($cities as $city)
                            <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                            @empty
                            <option value="0">Kota tidak ada</option>
                            @endforelse
                            @endif
                        </select>

                        <label for="service_name" class="col-md-12 col-form-label text-md-left">
                            {{ ('Jasa Pengiriman') }}
                        </label>
                        <select name="service_name" class="form-control" wire:model="service_name">
                            <option value="">Pilih Jasa Pengiriman</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>

                        <br><br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-black">Lihat Daftar Ongkir</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
