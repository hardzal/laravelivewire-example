<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal Pesan</td>
                            <td>Nama Produk</td>
                            <td>Status</td>
                            <td>Total Harga</td>
                            <td colspan="2">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shoppings as $shopping)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $shopping->created_at }}</td>
                            <td>{{ $shopping->product->name }}</td>
                            <td>
                                @if($shopping->status == 0)
                                <strong>Belum ada ongkir</strong>
                                @elseif($shopping->status == 1)
                                <strong>Sudah ada ongkir</strong>
                                @elseif($shopping->status)
                                <strong>Pesanan sudah dibayar</strong>
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($shopping->total_harga) }}</strong></td>
                            <td>
                                @if($shopping->status == 0)
                                <a href="{{ url('addongkir/'. $shopping->id) }}"
                                    class="btn btn-danger btn-block">Tambahkan Ongkir</a>
                                @elseif($shopping->status == 1)
                                <a href="{{ url('pay/'. $shopping->id) }}" class="btn btn-warning btn-block">Pilih
                                    Pembayaran</a>
                                @elseif($shopping->status == 2)
                                <a href="{{ url('pay/'. $shopping->id) }}" class="btn btn-primary btn-block">Lihat
                                    Status</a>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-danger btn-block"
                                    wire:click="destroy({{ $shopping->id }})">Hapus</button>
                            </td>
                        </tr>
                        @empty
                        <p>Belum ada pembelian</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
