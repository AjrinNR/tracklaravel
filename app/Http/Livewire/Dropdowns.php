<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;



class Dropdowns extends Component
{
        public $provinsis;
        public $kotas;
        public $kecamatans;
        public $kelurahans;
        public $rws;

        public $selectedProvinsi = null;
        public $selectedKota = null;
        public $selectedKecamatan = null;
        public $selectedKelurahan = null;
        public $selectedRw = null;

        public function mount($selectedRw = null){
            $this->provinsis = Provinsi::all();
            $this->kotas = collect();
            $this->kecamatans = collect();
            $this->kelurahans = collect();
            $this->rws = collect();
            $this->selectedRw = $selectedRw;

            if (!is_null($selectedRw)) {
                $rw = Rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedRw);
                if ($rw) {
                    $this->rws = Rw::where('id_kel', $rw->id_kel)->get();
                    $this->kelurahans = Kelurahan::where('id_kec', $rw->kelurahan->id_kec)->get();
                    $this->kecamatans = Kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                    $this->kotas = Kota::where('id_prov',$rw->kelurahan->kecamatan->kota->id_prov)->get();
                    $this->SelectedProvinsi = $rw->kelurahan->kecamatan->kota->id_prov;
                    $this->SelectedKota = $rw->kelurahan->kecamatan->id_kota;
                    $this->SelectedKecamatan = $rw->kelurahan->id_kec;
                    $this->SelectedKelurahan = $rw->id_kel;
                }
            }
        }

    public function render(){
        return view('livewire.dropdowns');
    }
     public function updatedSelectedProvinsi($provinsi)
    {
        $this->kotas = Kota::where('id_prov', $provinsi)->get();
    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatans = Kecamatan::where('id_kota', $kota)->get();
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->kelurahans = Kelurahan::where('id_kec', $kecamatan)->get();
    }

    public function updatedSelectedKelurahan($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rws = Rw::where('id_kel', $kelurahan)->get();
        } else {
            $this->selectedRw = null;
        }
    }
}
