<?php

namespace App\Http\Livewire;

use App\Models\Mock as ModelMock; //usar un alias
use Livewire\Component;

class Mock extends Component
{
    public $url;

    public function procesarUrl(){

        $this->validate([
            'url' => ['required', 'regex:/^(http|https)?(:\/\/)?(www\.)?[a-zA-Z0-9]+([\-\.]{1}[a-zA-Z0-9]+)*\.[a-zA-Z]{2,5}(:[0-9]{1,5})?(\/.*)?$/']
        ]);

        ModelMock::create([
            'url' => $this->url,
            'slug' => Str::random(6),
            'user_id' => auth()->id()
        ]);
        $this->reset('url');
    }

    public function render()
    {
        return view('livewire.mock');
    }
}
