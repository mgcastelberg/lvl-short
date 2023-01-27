<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShortLinkDetail extends Component
{
    public $shortLink;

    public function downloadQR(){
       $qr_code = QrCode::size(150)->generate(route('shortlink.show', $this->shortLink->slug));
       Storage::put('qr_codes/'.$this->shortLink->slug.'png', $qr_code);
       return Storage::download('qr_codes/'.$this->shortLink->slug.'png');
    }

    public function render()
    {
        return view('livewire.short-link-detail');
    }
}
