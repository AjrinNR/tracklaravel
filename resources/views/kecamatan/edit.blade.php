@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Ubah data Kecamatan
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kecamatan.update', $kec->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kota</label>
                                <select name="id_kota" class="form-control" required>
                                    @foreach ($kota as $data)
                                        <option value="{{$data->id}}"
                                            {{$data->id == $kec->id_kota ? "selected" : ""}}>
                                            {{$data->nama_kota}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Kode Kecamatan</label>
                                <input type="text" name="kode_kec" value="{{$kec->kode_kec}}" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label for="">Kecamatan</label>
                                <input type="text" name="nama_kec" value="{{$kec->nama_kec}}"class="form-control"required>
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