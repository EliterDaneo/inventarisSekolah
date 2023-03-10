@extends('home.main')

@section('judul')
    Tambah Data Dari : {{ $user->name }}
@endsection

@section('isi')
    <br>
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a class="btn btn-primary" href="{{ url('tambahBarang') }}">Tambah Data</a>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rekab data bulan terbaru</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Detail</th>
                                    <th>Tanggal / Hari</th>
                                    <th>Penginput</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($barang as $key => $b)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td class="content-center">
                                            <img src="{{ Storage::url('public/data/fotoBarangDolphin/') . $b->image }}"
                                                class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->detail }}</td>
                                        <td>{{ $b->tanggal }} / {{ $b->hari }}</td>
                                        <td>{{ $b->pendata }}</td>
                                        <td>
                                            <a href="{{ url('show', $b->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-print"></i></a>
                                            <a href="{{ url('edit', $b->id) }}" class="btn btn-success"><i
                                                    class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <a href="" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal"><i class="fas fa-trash"></i></a>
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
@endsection

<!-- Delter Logout -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="{{ url('destroy', $barangs->id) }}" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
