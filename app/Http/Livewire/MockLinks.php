<?php

namespace App\Http\Livewire;

use App\Models\Mock;
use Livewire\Component;
use Illuminate\Support\Str;

class MockLinks extends Component
{
    public $url = "";
    public $title = "";
    public $slug = "";

    public $createForm = [
        'open' => false,
        'title' => null,
        'description' => null,
        'type' => 1
    ];

    public function render()
    {
        return view('livewire.mock-link');
    }

    public function updatedCreateFormTitle($value){
        $this->slug = Str::slug($value);
        $this->url = route('mock.show', $this->slug );
    }

    public function procesarUrl(){

        $this->url = route('mock.show', $this->slug );
        $rules = [
            'url' => ['required', 'regex:/^(http|https)?(:\/\/)?(www\.)?[a-zA-Z0-9]+([\-\.]{1}[a-zA-Z0-9]+)*\.[a-zA-Z]{2,5}(:[0-9]{1,5})?(\/.*)?$/'],
            'createForm.title' => ['required', 'max:40'],
            'createForm.description' => ['required'],
        ];

        $this->validate($rules);

        $sLink = Mock::create([
            'url' => $this->url,
            'title' => $this->createForm['title'],
            'project_name' => 'omnilife',
            'slug' => $this->slug,
            'user_id' => auth()->id()
        ]);

        // $this->reset('url');
        $this->createForm['open'] = false;
    }
}
