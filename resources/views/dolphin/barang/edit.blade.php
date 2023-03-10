@extends('home.main')

@section('judul')
    Edit Data Dari : {{ $user->name }}
@endsection

@section('isi')
    <br>
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Inputan Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update', $barangs->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName">Nama Barang</label>
                                <input type="text" name="name"
                                    class="form-control
                                @error('name')
                                    is-invalid
                                @enderror"
                                    id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name"
                                    value="{{ old('name', $barangs->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Detail Barang</label>
                                <input type="text" name="detail"
                                    class="form-control
                                @error('detail')
                                    is-invalid
                                @enderror"
                                    id="exampleInputdetail" aria-describedby="emailHelp" placeholder="Enter detail"
                                    value="{{ old('detail', $barangs->detail) }}">
                                @error('detail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Penginput Barang</label>
                                <input type="text" name="pendata"
                                    class="form-control
                                @error('pendata')
                                    is-invalid
                                @enderror"
                                    id="exampleInputpendata" aria-describedby="emailHelp" placeholder="Enter pendata"
                                    value="{{ old('pendata', $barangs->pendata) }}" readonly>
                                @error('pendata')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Tanggal</label>
                                <div class="form-group" id="simple-date1">
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="text" name="tanggal" class="form-control" value="01/06/2020"
                                            id="simpleDataInput" value="{{ old('tanggal', $barangs->tanggal) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Hari Input Barang</label>
                                <select class="select2-single form-control" name="hari" id="select2Single">
                                    <option value="">{{ old('hari', $barangs->hari) }}</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Gambar Barang</label><br>
                                <img src="{{ Storage::url('public/data/fotoBarangDolphin/') . $barangs->image }}"
                                    class="rounded" style="width: 150px">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <br>
                            <hr>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
