@extends('layouts.admin')
@section('content')
@livewireStyles
    <div class = "container">
        <div class ="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tambah data Kasus
                    </div>
                    <div class="card-body ">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('kasus2.store')}}" method="post">
                            @csrf
                            <div class="flex flex-col justify-around h-full">
                                @livewire('dropdowns')
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Positif</label>
                                <input type="text" name="jumlah_positif" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Sembuh</label>
                                <input type="text" name="jumlah_sembuh" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Meninggal</label>
                                <input type="text" name="jumlah_meninggal" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Sembuh</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-dark">Simpan</button>
                               <a href="{{ url()->previous() }}" class="btn btn-outline-dark"> Kembali </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@livewireScripts
@endsection