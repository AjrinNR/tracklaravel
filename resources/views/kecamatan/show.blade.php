@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Lihat data Kecamatan
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kecamatan.show',$kec->id)}}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kota</label>
                                <input type="text" name="id_kota" value="{{$kec->kota->nama_kota}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Kecamatan</label>
                                <input type="text" name="nama_kec" value="{{$kec->nama_kec}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-light"><a href="{{ url()->previous() }}"> Kembali </a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection