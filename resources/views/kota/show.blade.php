@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Lihat data Kota
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kota.show',$kota->id)}}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Provinsi</label>
                                <input type="text" name="id_prov" value="{{$kota->provinsi->nama_prov}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Kode kota</label>
                                <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Kota</label>
                                <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-success"><a href="{{ url()->previous() }}"> Kembali </a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection