@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Lihat data Negara
                    </div>
                    <div class="card-body ">
                        <form action="{{route('country.show',$country->id)}}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kode negara</label>
                                <input type="text" name="kode_negara" value="{{$country->kode_negara}}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">negara</label>
                                <input type="text" name="nama_negara" value="{{$country->nama_negara}}" class="form-control" readonly>
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