<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Home extends Component
{
    use WithFileUploads;

    public $file;
    public $public_path = '';

    public function render()
    {
        return view('livewire.home');
    }

    public function uploadFile()
    {
        $this->public_path = $this->file->store('public');

        $this->public_path = str_replace('public', 'storage', $this->public_path);

        $this->public_path = asset($this->public_path);

        $this->dispatch('notify', 'File uploaded successfully!');

        $this->reset('file');
    }
}
