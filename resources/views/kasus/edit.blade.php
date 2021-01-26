@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Ubah data Kasus Global
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kasus.update', $kasus->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Negara</label>
                                <select name="id_negara" class="form-control" required>
                                    @foreach ($country as $data)
                                        <option value="{{$data->id}}"
                                            {{$data->id == $kasus->id_rw ? "selected" : ""}}>
                                            {{$data->nama_negara}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Positif</label>
                                <input type="text" name="jumlah_positif" value="{{$kasus->jumlah_positif}}" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Sembuh</label>
                                <input type="text" name="jumlah_sembuh" value="{{$kasus->jumlah_sembuh}}" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Meninggal</label>
                                <input type="text" name="jumlah_meninggal" value="{{$kasus->jumlah_meninggal}}" class="form-control"required>
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" value="{{$kasus->tanggal}}" onchange= "invoicedue(event);"  
                                class="form-control"required>
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