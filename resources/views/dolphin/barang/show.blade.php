@extends('home.main')

@section('judul')
    Show Data Dari : {{ $user->name }}
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
                        <h6 class="m-0 font-weight-bold text-primary">Form Show Data</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            @if ($barang)
                                <div class="form-group">
                                    <label for="exampleInputName">Nama Barang</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName"
                                        aria-describedby="emailHelp" placeholder="Enter name" value="{{ $barang->name }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Detail Barang</label>
                                    <input type="text" name="detail" class="form-control" id="exampleInputdetail"
                                        aria-describedby="emailHelp" placeholder="Enter detail"
                                        value="{{ $barang->detail }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Penginput Barang</label>
                                    <input type="text" name="pendata"
                                        class="form-control
                                @error('pendata')
                                    is-invalid
                                @enderror"
                                        id="exampleInputpendata" aria-describedby="emailHelp" placeholder="Enter pendata"
                                        value="{{ $barang->pendata }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Tanggal</label>
                                    <div class="form-group" id="simple-date1">
                                        <div class="form-group">
                                            <input type="text" name="tanggal" class="form-control" value="01/06/2020"
                                                id="simpleDataInput" value="{{ $barang->tanggal }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Hari Input Barang</label>
                                    <input class="select2-single form-control" name="hari" id="select2Single"
                                        value="{{ $barang->hari }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Gambar Barang</label><br>
                                    <img src="{{ Storage::url('public/data/fotoBarangDolphin/') . $barang->image }}"
                                        class="rounded" style="width: 150px">
                                </div>
                            @else
                                <h1>Data Tidak Ditemukan!!</h1>
                            @endif
                            <br>
                            <hr>
                            <a href="{{ url('dataBarang') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
