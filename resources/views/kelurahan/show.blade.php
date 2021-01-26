@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Lihat data kelurahan
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kelurahan.show',$kel->id)}}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kecamatan</label>
                                <input type="text" name="id_kec" value="{{$kel->kecamatan->nama_kec}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Kelurahan</label>
                                <input type="text" name="nama_kelurahan" value="{{$kel->nama_kelurahan}}" class="form-control" readonly>
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