@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Lihat data Provinsi
                    </div>
                    <div class="card-body ">
                        <form action="{{route('provinsi.show',$prov->id)}}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Nama provinsi</label>
                                <input type="text" name="kode_prov" value="{{$prov->kode_prov}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">NIM</label>
                                <input type="text" name="nama_prov" value="{{$prov->nama_prov}}" class="form-control" readonly>
                            </div>
                           <div class="mb-3"></div>
                                <button type="submit" class="btn btn-light"><a href="{{ url()->previous() }}"> Kembali </a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection