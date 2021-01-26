@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tambah data Kelurahan
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kelurahan.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kecamatan</label>
                                <select name="id_kec" class="form-control" required>
                                    @foreach ($kec as $data)
                                        <option value="{{$data->id}}">{{$data->nama_kec}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Kelurahan</label>
                                <input type="text" name="nama_kelurahan" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-dark">Simpan</button>
                                <button type="submit" class="btn btn-outline-success"><a href="{{ url()->previous() }}"> Kembali </a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection