@extends('layouts.dashboard')

@section('title', 'Data Paket')

@push('css')
    <link rel="stylesheet" href="/package/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="section-header">
        <h1>Paket</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Data Reference</a></div>
            <div class="breadcrumb-item">Paket</div>
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
                        <h4>Management Data Paket</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah
                                Paket</button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Lama Hari</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paket as $row)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->jenis }}</td>
                                            <td>{{ $row->jumlah_hari }} Hari</td>
                                            <td>Rp. {{ number_format($row->harga) }}</td>
                                            <td>{{ $row->satuan }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square text-primary pr-2"></i> Update</a>
                                                        <form action="{{ route('paket.destroy', $row->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item" href="#"
                                                                onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-trash text-danger pr-2"></i> Delete</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Data Paket Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('paket.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Paket</label>
                            <input type="text" name="nama" class="form-control" required id="recipient-name"
                                placeholder="Paket Kilat Baju Kiloan">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jenis Paket</label>
                            <input type="text" name="jenis" class="form-control" required id="message-text"
                                placeholder="Paket Kilat">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Lama Hari</label>
                            <input type="number" name="jumlah_hari" class="form-control" required id="message-text"
                                placeholder="5">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" required id="message-text"
                                placeholder="60.000">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Satuan</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="satuan" required value="KG"
                                        class="selectgroup-input">
                                    <span class="selectgroup-button">KG</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="satuan" required value="METER"
                                        class="selectgroup-input">
                                    <span class="selectgroup-button">METER</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="satuan" required value="BUAH"
                                        class="selectgroup-input">
                                    <span class="selectgroup-button">BUAH</span>
                                </label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endpush

@push('js')
    <script src="/package/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/package/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/page/modules-datatables.js"></script>
@endpush
