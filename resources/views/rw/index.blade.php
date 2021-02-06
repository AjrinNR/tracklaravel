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
                        <h4 class="card-title">Data RW</h4 >
                        <a href="{{route('rw.create')}}" class = "btn btn-success float-right">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Kelurahan</th>
                                        <th scope="col">RW</th>
                                        <th></th>
                                        <th scope="col">Aksi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($rw as $data)
                                        <tr>
                                            <td scope="row">{{$no++}}</td>
                                            <td>{{$data->kelurahan->nama_kelurahan}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td></td>
                                            <td>
                                                <form action="{{route('rw.destroy',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('rw.show',$data -> id)}}" class="btn btn-primary">Lihat</a>
                                                    <a href="{{route('rw.edit',$data -> id)}}" class="btn btn-warning">Edit</a>
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
