<?php

namespace App\Livewire;

use App\Providers\ClientServiceProvider;
use Livewire\Component;

class ReceiveIncomingCoil extends Component
{
    public $location;
    public $inspection;
    public $search_location = [];
    public $inspections = [];
    public $coil = [];
    public $search_inspection_form = false;
    public $error = null;

    public function render()
    {
        return view('livewire.receive-incoming-coil');
    }

    public function searchLocation(ClientServiceProvider $clientServiceProvider)
    {
        if($this->location)
        {
            $this->search_inspection_form = true;
            $this->dispatch('change-focus-other-field');
        }

        
    }

    public function searchInspection(ClientServiceProvider $clientServiceProvider){
        $this->error = null;

        if($this->inspection)
        {
            try{
                $this->inspections = json_decode($clientServiceProvider->getClient()->get('Insp/'.$this->inspection)->getBody()->getContents());
                $this->inspections = $this->inspections->response->ttCoilDetails->CoilDetails[0];
            }catch(\Exception $e){
                $this->error = "Inspection not found. Please try again.";
            }

            if($this->inspections)
            {
                $this->location = null;
                $this->coil = json_decode($clientServiceProvider->getClient()->get('Coils/'.$this->inspections->CoilName)->getBody()->getContents());
                $this->coil = $this->coil->response->coilRecord->coilRecord[0];
                $this->dispatch('change-focus-location-field');
            }
            
            
        }
    }

    public function updatedLocation(){
        $this->error = null;
        $this->inspection = null;
        $this->coil = [];
        $this->inspections = [];
    }
}
