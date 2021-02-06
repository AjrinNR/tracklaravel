@extends('layouts.admin')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if (session('message'))
                            <div class="alert alert-dark" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h4 class="card-title">Data Kecamatan</h4 >
                        <a href="{{route('kecamatan.create')}}" class = "btn btn-success float-right">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col" style="width:20%">Kota</th>
                                        <th scope="col">Kode Kecamatan</th>
                                        <th scope="col">Kecamatan</th>
                                        <th></th>
                                        <th scope="col">Aksi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($kec as $data)
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td>{{$data->kota->nama_kota}}</td>
                                            <td>{{$data->kode_kec}}</td>
                                            <td>{{$data->nama_kec}}</td>
                                            <td></td>
                                            <td>
                                                <form action="{{route('kecamatan.destroy',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('kecamatan.show',$data -> id)}}" class="btn btn-primary">Lihat</a>
                                                    <a href="{{route('kecamatan.edit',$data -> id)}}" class="btn btn-warning">Edit</a>
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
