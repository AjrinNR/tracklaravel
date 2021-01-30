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
    public $provinsis;
    public $kotas;
    public $kecamatans;
    public $kelurahans;
    public $rws;


    public $selectedState = NULL;
    public $selectedCity = NULL;
    public $selectedKecamatan = NULL;
    public $selectedKelurahan = NULL;
    public $selectedRw = NULL;

    public function mount($selectedRw = null)
    {
        $this->provinsis = Provinsi::all();
        $this->kotas = collect();
        $this->kecamatans = collect();
        $this->kelurahans = collect();
        $this->rws= collect();
        $this->selectedRw = $selectedRw;


    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedSelectedState($provinsi)
    {
         
            $this->kotas = Kota::where('id_prov', $provinsi)->get();
        
    }
    public function updatedSelectedCity($kota){
      
            $this->kecamatans = Kecamatan::where('id_kota', $kota)->get();
        
    }
    public function updatedSelectedKecamatan($kecamatan){

            $this->kelurahans = Kelurahan::where('id_kec', $kecamatan)->get();
        
    }
    public function updatedSelectedKelurahan($kelurahan){

            $this->rws = Rw::where('id_kel', $kelurahan)->get();

    }
    
    
}
