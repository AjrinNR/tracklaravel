<div>
    <div class ="m-auto">
        <div class="mb-8">
        <label for="provinsi">Provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control">
                <option value="" selected>Pilih Provinsi</option>
                @foreach($provinsi as $provinsis)
                    <option value="{{ $provinsis->id }}">{{ $provinsis->nama_prov }}</option>
                @endforeach
            </select>
        </div>
        @if(!is_null($selectedProvinsi))
            <div class="mb-8 form-group">
            <label for="Kota">Kota</label>
                <select wire:model="selectedKota" class="form-control">
                    <option value="" selected>Pilih Kota</option>
                    @foreach($kota as $kotas)
                        <option value="{{ $kotas->id }}">{{ $kotas->nama_kota }}</option>
                    @endforeach
                </select>
            </div>
            @endif
        @if (!is_null($selectedKota))
            <div class="mb-8 form-group">
            <label for="kecamatan">Kecamatan</label>
                <select wire:model="selectedKecamatan" class="form-control">
                    <option value="" selected>Pilih Kecamatan</option>
                    @foreach($kecamatan as $kecamatans)
                        <option value="{{ $kecamatans->id }}">{{ $kecamatans->nama_kec }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if (!is_null($selectedKecamatan))
            <div class="mb-8 form-group">
            <label for="kelurahan" >Kelurahan</label>
                <select wire:model="selectedKelurahan" class="form-control">
                    <option value="" selected>Pilih Kelurahan</option>
                    @foreach ($kelurahan as $kel)
                        <option value="{{ $kel->id }}">{{$kel->nama_kelurahan}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            @if (!is_null($selectedKelurahan))
            <div class="mb-8 form-group">
            <label for="rw" >Rw</label>
                <select wire:model="selectedRw" class="form-control" name="id_rw">
                    <option value="" selected>Pilih Rw</option>
                    @foreach($rw as $rws)
                        <option value="{{ $rws->id }}">{{ $rws->nama }}</option>
                    @endforeach
                </select>
            </div>
            @endif
    </div>
</div>