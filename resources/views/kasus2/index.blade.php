@extends('layouts.admin')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('message'))
                            <div class="alert alert-dark" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h4 class="card-title">Data Kasus Indonesia</h4 >
                        <a href="{{route('kasus2.create')}}" class = "btn btn-success float-right">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Jumlah Positif</th>
                                        <th scope="col">Jumlah Sembuh</th>
                                        <th scope="col">Jumlah Meninggal</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($kasus2 as $data)
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td style=>
                                                {{$data->rw->nama}} <br>
                                                {{$data->rw->kelurahan->nama_kelurahan}} <br>
                                                {{$data->rw->kelurahan->kecamatan->nama_kec}} <br>
                                                {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}  <br>
                                                {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_prov}}                                              </td>
                                            <td style="text-align: center">{{ number_format ($data->jumlah_positif)}}</td>
                                            <td style="text-align: center">{{number_format($data->jumlah_sembuh)}}</td>
                                            <td style="text-align: center">{{number_format($data->jumlah_meninggal)}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>
                                                <form action="{{route('kasus2.destroy',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('kasus2.show',$data -> id)}}" class="btn btn-primary">Lihat</a>
                                                    <a href="{{route('kasus2.edit',$data -> id)}}" class="btn btn-warning">Edit</a>
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
