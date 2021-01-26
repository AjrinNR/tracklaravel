@extends('layouts.admin')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        @if (session('message'))
                            <div class="alert alert-dark" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h4 class="card-title">Data Kota</h4 >
                        <a href="{{route('kota.create')}}" class = "btn btn-success float-right">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Kode Kota</th>
                                        <th scope="col">Kota</th>
                                        <th></th>
                                        <th scope="col">Aksi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($kota as $data)
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td>{{$data->provinsi->nama_prov}}</td>
                                            <td>{{$data->kode_kota}}</td>
                                            <td>{{$data->nama_kota}}</td>
                                            <td></td>
                                            <td>
                                                <form action="{{route('kota.destroy',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('kota.show',$data -> id)}}" class="btn btn-primary">Lihat</a>
                                                    <a href="{{route('kota.edit',$data -> id)}}" class="btn btn-warning">Edit</a>
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
