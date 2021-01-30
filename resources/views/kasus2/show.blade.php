@extends('layouts.admin')
@section('content')
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Ubah data Kasus Indonesia
                    </div>
                    <div class="card-body ">
                        <form action="{{route('kasus2.show', $kasus2->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="mb-3">
                                <label for="">Provinsi</label>
                                <input type="text" name="nama_prov" value="{{$kasus2->rw->kelurahan->
                                kecamatan->kota->provinsi->nama_prov}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Kota</label>
                                <input type="text" name="nama_kota" value="{{$kasus2->rw->kelurahan->
                                kecamatan->kota->nama_kota}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Kecamatan</label>
                                <input type="text" name="nama_kec" value="{{$kasus2->rw->kelurahan->
                                kecamatan->nama_kec}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Kelurhan</label>
                                <input type="text" name="nama_kelurahan" value="{{$kasus2->rw->kelurahan->
                                nama_kelurahan}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Rw</label>
                                <input type="text" name="nama" value="{{$kasus2->rw->nama}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Positif</label>
                                <input type="text" name="jumlah_positif" value="{{$kasus2->jumlah_positif}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Sembuh</label>
                                <input type="text" name="jumlah_sembuh" value="{{$kasus2->jumlah_sembuh}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Meninggal</label>
                                <input type="text" name="jumlah_meninggal" value="{{$kasus2->jumlah_meninggal}}" class="form-control"readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" value="{{$kasus2->tanggal}}" onchange= "invoicedue(event);"  
                                class="form-control"readonly>
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