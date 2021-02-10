<?php

namespace App\Http\Livewire;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Kasus2;
use Livewire\Component;


class Dropdowns extends Component
{
        public $provinsi;
        public $kota;
        public $kecamatan;
        public $kelurahan;
        public $rw;
        public $kasus1;
        public $idt;
    
        public $selectedProvinsi =null;
        public $selectedKota =null;
        public $selectedKecamatan =null;
        public $selectedKelurahan =null;
        public $selectedRw =null;
    
        public function mount($selectedRw = null, $idt = null)
        {
            $this->provinsi = Provinsi::all();
            $this->kota = Kota::with('provinsi')->get();
            $this->kecamatan = Kecamatan::whereHas('kota', function ($query) {
                $query->whereId(request()->input('id_kota', 0));
            })->pluck('nama_kec', 'id');
            $this->kelurahan = Kelurahan::whereHas('kecamatan', function ($query) {
                $query->whereId(request()->input('id_kec', 0));
            })->pluck('nama_kelurahan', 'id');
            $this->rw = Rw::whereHas('kelurahan', function ($query) {
                $query->whereId(request()->input('id_kel', 0));
            })->pluck('nama', 'id');
            $this->selectedRw = $selectedRw;
            $this->idt = $idt;
            if (!is_null($idt)) {
                $this->kasus1 = Kasus2::findOrFail($idt);
            }
    
            if (!is_null($selectedRw)){
                $rw = Rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedRw);
                if ($rw) {
                    $this->rw = Rw::where('id_kel', $rw->id_kel)->get();
                    $this->kelurahan = Kelurahan::where('id_kec', $rw->kelurahan->id_kec)->get();
                    $this->kecamatan = Kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                    $this->kota = Kota::where('id_prov', $rw->kelurahan->kecamatan->kota->id_prov)->get();
                    $this->selectedProvinsi =$rw->kelurahan->kecamatan->kota->id_prov;
                    $this->selectedKota = $rw->kelurahan->kecamatan->id_kota;
                    $this->selectedKecamatan = $rw->kelurahan->id_kec;
                    $this->selectedKelurahan = $rw->id_kel;
                }
            }
        }
    
        public function render()
        {
            return view('livewire.dropdowns');
        }
        public function updatedSelectedProvinsi($provinsi)
        {
            $this->kota = Kota::where('id_prov', $provinsi)->get();
            $this->selectedKecamatan = NULL;
            $this->selectedKelurahan = NULL;
            $this->selectedRw = NULL;
        }
        public function updatedSelectedKota($kota)
        {
            $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
            $this->selectedKelurahan = NULL;
            $this->selectedRw = NULL;
        }
    
        public function updatedSelectedKecamatan($kecamatan)
        {
            $this->kelurahan = Kelurahan::where('id_kec', $kecamatan)->get();
            $this->selectedRw = NULL;
        }
        public function updatedSelectedKelurahan($kelurahan)
        {
            if (!is_null($kelurahan)) {
                $this->rw = Rw::where('id_kel', $kelurahan)->get();
            }
            else {
                $this->selectedRw = NULL;
            }
        }
}
