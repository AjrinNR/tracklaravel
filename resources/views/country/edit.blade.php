@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Ubah data Negara
                    </div>
                    <div class="card-body ">
                        <form action="{{route('country.update', $country->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kode Negara</label>
                                <input type="text" name="kode_negara" value="{{$country->kode_negara}}" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label for="">Negara</label>
                                <input type="text" name="nama_negara" value="{{$country->nama_negara}}"class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                                <button type="submit" class="btn btn-light"><a href="{{ url()->previous() }}"> Kembali </a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection