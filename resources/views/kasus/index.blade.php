@extends('layouts.admin')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        @if (session('message'))
                            <div class="alert alert-dark" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h4 class="card-title">Data Kasus Global</h4 >
                        <a href="{{route('kasus.create')}}" class = "btn btn-success float-right">
                            Tambah Data 
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Negara</th>
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

                                    @foreach ($kasus as $data)
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td style="text-align: center">{{$data->country->nama_negara}}</td>
                                            <td style="text-align: center">{{$data->jumlah_positif}}</td>
                                            <td style="text-align: center">{{$data->jumlah_sembuh}}</td>
                                            <td style="text-align: center">{{$data->jumlah_meninggal}}</td>
                                            <td style="text-align: center">{{$data->tanggal}}</td>
                                            <td>
                                                <form action="{{route('kasus.destroy',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('kasus.show',$data -> id)}}" class="btn btn-primary">Lihat</a>
                                                    <a href="{{route('kasus.edit',$data -> id)}}" class="btn btn-warning">Edit</a>
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                            <td></td>
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
