<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ManualLinkDetails extends Component
{
    public $manualLink;
    public $sizeLink = 200;

    public function downloadQR(){
       $qr_code = QrCode::size( $this->sizeLink )->generate($this->manualLink->url);
       Storage::put('qr_codes/'.$this->manualLink->slug.'png', $qr_code);
       return Storage::download('qr_codes/'.$this->manualLink->slug.'png');
    }

    public function render()
    {
        return view('livewire.manual-link-details');
    }
}
