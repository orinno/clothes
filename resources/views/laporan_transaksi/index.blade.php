@extends('layouts.dashboard')

@section('title', 'Data Transaksi')

@push('css')
    <link rel="stylesheet" href="/package/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/package/select2/dist/css/select2.min.css">
@endpush

@section('content')
    <div class="section-header">
        <h1>Laporan Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Laporan</a></div>
            <div class="breadcrumb-item">Laporan Transaksi</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Management Laporan Transaksi</h4>
                    </div>

                    <form action="/dashboard/laporan_transaksi" method="get">
                    <div class="row g-3 mx-2">
                            <div class="col-md-4">
                                <input type="date" name="dari_tgl" class="form-control" placeholder="Dari Tanggal" aria-label="Dari Tanggal">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="sampai_tgl" class="form-control" placeholder="Sampai Tanggal" aria-label="Sampai Tanggal">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Cari
                            </button>
                            {{-- <button class="btn btn-success mb-2 hiden" id="btPrint" onclick="createPDF()" type="submit" data-bs-toggle="tooltip" data-placement="top" title="Cetak Laporan Aktifitas"><i data-feather="printer"></i> Cetak</button>  --}}
                            <button type="submit" id="btPrint" onclick="createPDF()" class="btn btn-light mx-2">
                                Cetak
                            </button>
                    </div>
                     </form>

                    <div class="card-body">
                        <div id="box">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>No Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Konsumen</th>
                                            <th>Nama Paket</th>
                                            <th>Diskon</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->invoice }}</td>
                                                <td>{{ $item->tanggal_masuk }}</td>
                                                <td>{{ $item->konsumen->nama }}</td>
                                                <td>{{ $item->paket->nama }}</td>
                                                <td>{{ $item->diskon }}</td>
                                                <td>{{ $item->total_bayar }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @include('laporan_transaksi.export')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('js')
<script src="/package/select2/dist/js/select2.full.min.js"></script>
    <script src="/package/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/package/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/page/modules-datatables.js"></script>
@endpush
