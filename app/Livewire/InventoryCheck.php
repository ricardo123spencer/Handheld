<?php

namespace App\Livewire;

use Livewire\Component;

class InventoryCheck extends Component
{

    public $coil;
    public $location;
    public $pallet;
    public $search_coil_pallet_form = false;
    public $search;
    public $coils_pallets = [];
    public $error;

    public function render()
    {
        return view('livewire.inventory-check');
    }

    public function searchLocation(){
        if($this->location)
        {
            $this->search_coil_pallet_form = true;
            $this->coils_pallets = [
                    'coil' => '123456',
                    'pallet' => '123456'
            ];
        }
    }

    public function searchCoilPallet(){
        if($this->search){
            $count = collect($this->coils_pallets)->filter(function($value, $key){
                return $value == $this->search;
            })->count();

            if($count)
            {
                $this->error = 'Coil found';
            }
            
            else
            {
                $this->error = 'Coil not found';
            }
        }

    }
}
