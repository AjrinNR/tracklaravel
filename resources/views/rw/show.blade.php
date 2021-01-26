@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Lihat data RW
                    </div>
                    <div class="card-body ">
                        <form action="{{route('rw.show',$rw->id)}}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kelurahan</label>
                                <input type="text" name="id_kel" value="{{$rw->kelurahan->nama_kelurahan}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">RW</label>
                                <input type="text" name="nama" value="{{$rw->nama}}" class="form-control" readonly>
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