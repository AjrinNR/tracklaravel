@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tambah data Provinsi
                    </div>
                    <div class="card-body ">
                        <form action="{{route('provinsi.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kode Provinsi</label>
                                <input type="text" name="kode_prov" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label for="">Provinsi</label>
                                <input type="text" name="nama_prov" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="submit" class="btn btn-danger"><a href="{{ url()->previous() }}" style="color:red;"> Kembali </a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection