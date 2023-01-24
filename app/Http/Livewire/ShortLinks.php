<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\ShortLink;
use Illuminate\Support\Str;

class ShortLinks extends Component
{

    public $url;

    protected $listeners = ['shortLinkCreada' => 'findTitle'];

    public function procesarUrl(){

        $this->validate([
            'url' => ['required', 'regex:/^(http|https)?(:\/\/)?(www\.)?[a-zA-Z0-9]+([\-\.]{1}[a-zA-Z0-9]+)*\.[a-zA-Z]{2,5}(:[0-9]{1,5})?(\/.*)?$/']
        ]);

        if (!preg_match("~^(?:f|ht)tps?://~i", $this->url)) {
            $this->url = "http://" . $this->url;
        }

        $sLink = ShortLink::create([
            'url' => $this->url,
            'title' => $this->url,
            'slug' => Str::random(6),
            'user_id' => auth()->id()
        ]);

        $this->emit('shortLinkCreada',$sLink->id);

        $this->reset('url');

    }

    public function findTitle(ShortLink $sLink)
    {
        try {
            $contents = file_get_contents($sLink->url);
            if (preg_match('/<title>(.*)<\/title>/', $contents, $matches)) {
                $title = $matches[1];
            }
            $sLink->update([
                'title' => $title
            ]);
        } catch (Exception $e) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.short-link');
    }
}
