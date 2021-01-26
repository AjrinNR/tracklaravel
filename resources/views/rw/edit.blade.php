@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Ubah data RW
                    </div>
                    <div class="card-body ">
                        <form action="{{route('rw.update', $rw->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Kelurahan</label>
                                <select name="id_kel" class="form-control" required>
                                    @foreach ($kel as $data)
                                        <option value="{{$data->id}}"
                                            {{$data->id == $rw->id_kel ? "selected" : ""}}>
                                            {{$data->nama_kelurahan}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">RW</label>
                                <input type="text" name="nama" value="{{$rw->nama}}"class="form-control"required>
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