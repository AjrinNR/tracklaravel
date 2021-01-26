@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Ubah data Kelurahan
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kelurahan.update', $kel->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kecamatan</label>
                                <select name="id_kec" class="form-control" required>
                                    @foreach ($kec as $data)
                                        <option value="{{$data->id}}"
                                            {{$data->id == $kel->id_kec ? "selected" : ""}}>
                                            {{$data->nama_kec}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Kelurahan</label>
                                <input type="text" name="nama_kelurahan" value="{{$kel->nama_kelurahan}}"class="form-control"required>
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