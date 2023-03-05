@extends('layouts.dashboard')

@section('title', 'Data Transaksi')

@push('css')
    <link rel="stylesheet" href="/package/select2/dist/css/select2.min.css">
@endpush
@section('content')
    <div class="section-header">
        <h1>Advanced Forms</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <form action="{{ route('transaksi.store') }}" method="POST">

                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Konsumen</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pilih Konsumen</label>
                                        <select class="form-control select2" id="select_konsumen" name="id_konsumen">
                                            <option>Pilih Konsumen</option>
                                            @foreach ($konsumen as $item)
                                                <option value="{{ $item->id }}"
                                                    data-kode_konsumen="{{ $item->kode_konsumen }}"
                                                    data-nama="{{ $item->nama }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kode Konsumen</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_kode_konsumen" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_nama_konsumen" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Data Paket</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pilih Paket</label>
                                        <select class="form-control select2" id="select_paket" name="id_paket">
                                            <option>Pilih Paket</option>
                                            @foreach ($paket as $item)
                                                <option value="{{ $item->id }}" data-jenis_paket="{{ $item->jenis }}"
                                                    data-jumlah_hari="{{ $item->jumlah_hari }}"
                                                    data-satuan="{{ $item->satuan }}" data-harga="{{ $item->harga }}">
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jenis Paket</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_jenis_paket" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Jumlah Hari</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_jumlah_hari" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_harga" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Berat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="berat" id="input_berat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_satuan" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="tanggal_masuk" id="input_tanggal_masuk" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Estimasi Tanggal Keluar</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="tanggal_keluar" id="input_tanggal_keluar"
                                                readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Data Pembayaran</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Tipe Pembayaran</label>
                                        <select class="form-control select2" name="id_tipe_pembayaran">
                                            <option>Pilih Tipe Pembayaran</option>
                                            @foreach ($tipe_pembayaran as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" name="status">
                                        <label>Pilih Status Bayar</label>
                                        <select class="form-control select2" name="status">
                                            <option>Pilih Status Bayar</option>
                                            <option value="1">Bayar</option>
                                            <option value="0">Belum Bayar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kode Transaksi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="invoice" id="input_kode_transaksi" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah Bayar</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_jumlah_bayar" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Diskon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="diskon" id="input_diskon" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Bayar</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="total_bayar" id="input_total_bayar" readonly
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Hutang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_hutang" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kembalian</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="input_kembalian" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="/package/select2/dist/js/select2.full.min.js"></script>
    <script src="/js/page/forms-advanced-forms.js"></script>

    <script>
        $('document').ready(function() {
            $('#select_konsumen').on('change', function() {
                var kode_konsumen = $('#select_konsumen').find(':selected').data('kode_konsumen');
                var nama = $('#select_konsumen').find(':selected').data('nama');

                $('#input_kode_konsumen').val(kode_konsumen);
                $('#input_nama_konsumen').val(nama);
            });

            var today = new Date();
            var yyyy = today.getFullYear();

            $('#input_kode_transaksi').val("TRX-" + yyyy + Math.floor(Math.random() * 1000) + 1);

            $('#select_paket').on('change', function() {
                var jenis_paket = $('#select_paket').find(':selected').data('jenis_paket');
                var jumlah_hari = $('#select_paket').find(':selected').data('jumlah_hari');
                var satuan = $('#select_paket').find(':selected').data('satuan');
                var harga = $('#select_paket').find(':selected').data('harga');

                $('#input_jenis_paket').val(jenis_paket);
                $('#input_jumlah_hari').val(jumlah_hari);
                $('#input_satuan').val(satuan);
                $('#input_harga').val(harga);

                // get day now
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                $('#input_tanggal_masuk').val(today);

                // get day out
                var day_out = new Date();
                day_out.setDate(day_out.getDate() + parseInt(jumlah_hari));
                var dd_out = String(day_out.getDate()).padStart(2, '0');
                var mm_out = String(day_out.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy_out = day_out.getFullYear();

                day_out = yyyy_out + '-' + mm_out + '-' + dd_out;

                $('#input_tanggal_keluar').val(day_out);
            });

            $('#input_berat').on('keyup', function() {
                var berat = $('#input_berat').val();
                var harga = $('#input_harga').val();

                var total_bayar = parseInt(harga) * parseInt(berat);
                $('#input_total_bayar').val(total_bayar);
            });

            $('#input_jumlah_bayar').on('keyup', function() {
                var jumlah_bayar = $('#input_jumlah_bayar').val();
                var harga = $('#input_harga').val();
                var berat = $('#input_berat').val();

                var total_bayar = parseInt(harga) * parseInt(berat);
                var diskon = 0;
                var hutang = 0;
                var kembalian = 0;

                if (jumlah_bayar > total_bayar) {
                    diskon = 0;
                    hutang = 0;
                    kembalian = jumlah_bayar - total_bayar;
                } else if (jumlah_bayar < total_bayar) {
                    diskon = 0;
                    hutang = total_bayar - jumlah_bayar;
                    kembalian = 0;
                } else {
                    diskon = 0;
                    hutang = 0;
                    kembalian = 0;
                }

                $('#input_diskon').val(diskon);
                $('#input_total_bayar').val(total_bayar);
                $('#input_hutang').val(hutang);
                $('#input_kembalian').val(kembalian);

            });

            $('#input_diskon').on('keyup', function() {
                var diskon = $('#input_diskon').val();
                var harga = $('#input_harga').val();
                var berat = $('#input_berat').val();
                var kembalian = $('#input_jumlah_bayar').val();

                var total_bayar = parseInt(harga) * parseInt(berat);
                var jumlah_bayar = total_bayar;

                if (diskon > 0) {
                    jumlah_bayar = total_bayar - diskon;
                }

                $('#input_total_bayar').val(
                    jumlah_bayar == 0 ? total_bayar : jumlah_bayar
                );

                $('#input_kembalian').val(
                    kembalian == 0 ? 0 : $('#input_jumlah_bayar').val() - jumlah_bayar
                );
            });
        });
    </script>
@endpush
