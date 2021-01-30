<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Provinsi:</label>
        <select name="country" wire:model="selectedState" class="form-control">
            <option value=''>Provinsi</option>
            @foreach($provinsis as $provinsi)
                <option value={{ $provinsi->id }}>{{ $provinsi->nama_prov }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">City:</label>
          <select name="id_kota" wire:model="selectedCity" 
            class="p-2 px-4 py-2 form-control">
            <option value=''>Choose a city</option>
            @foreach($kotas as $kota)
                 <option value={{ $kota->id }}>{{ $kota->nama_kota }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Kecamatan:</label>
          <select name="id_kec" wire:model="selectedKecamatan" 
            class="p-2 px-4 py-2 form-control">
            <option value=''>Kecamatan</option>
            @foreach($kecamatans as $kec)
                 <option value={{ $kec->id }}>{{ $kec->nama_kec }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Kelurahan:</label>
          <select name="id_kel" wire:model="selectedKelurahan" 
            class="p-2 px-4 py-2 form-control">
            <option value=''>Kelurahan</option>
            @foreach($kelurahans as $kelurahan)
                 <option value={{ $kelurahan->id }}>{{ $kelurahan->nama_kelurahan }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">RW:</label>
          <select name="id_rw" wire:model="selectedRw" 
            class="p-2 px-4 py-2 form-control">
            <option value=''>Rw</option>
            @foreach($rws as $rw)
                 <option value={{ $rw->id }}>{{ $rw->nama }}</option>
            @endforeach
        </select>
    </div>

</div>