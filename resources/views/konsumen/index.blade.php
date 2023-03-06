@extends('layouts.dashboard')

@section('title', 'Data Konsumen')

@push('css')
    <link rel="stylesheet" href="/package/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="section-header">
        <h1>Konsumen</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User Management</a></div>
            <div class="breadcrumb-item">Konsumen</div>
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
                        <h4>Management Data Konsumen</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah
                                Konsumen</button>
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
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Alamat</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konsumen as $row)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->telephone }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->foto }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" data-toggle="modal" href="#edit{{$row->id}}"><i class="fa-solid fa-pen-to-square text-primary pr-2"></i> Update</a>
                                                        <form action="{{ route('konsumen.destroy', $row->id) }}"
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
    <div class="modal fade " tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Data Konsumen Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('konsumen.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Konsumen</label>
                            <input type="text" name="nama" class="form-control" required id="recipient-name"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Email</label>
                            <input type="email" name="email" class="form-control" required id="message-text"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Telephone</label>
                            <input type="number" name="telephone" class="form-control" required id="message-text"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required id="message-text"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Foto</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
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

    @foreach($konsumen as $data)
    <div class="modal fade " tabindex="-1" role="dialog" id="edit{{$data->id}}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Data Konsumen Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('konsumen.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Konsumen</label>
                            <input type="text" name="nama" value="{{$data->nama}}" class="form-control" required id="recipient-name"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Email</label>
                            <input type="email" name="email" value="{{$data->email}}" class="form-control" required id="message-text"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Telephone</label>
                            <input type="number" name="telephone" value="{{$data->telephone}}" class="form-control" required id="message-text"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Alamat</label>
                            <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" required id="message-text"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Foto</label>
                            {{-- @if($data->foto == '')
                            <img alt="image" src="/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            @else
                            <img src="{{asset('images/'. $data->foto)}}" class="rounded-circle mr-1" width="100">
                            @endif --}}
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
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
    @endforeach

    </div>
@endpush

@push('js')
    <script src="/package/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/package/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/page/modules-datatables.js"></script>
@endpush
