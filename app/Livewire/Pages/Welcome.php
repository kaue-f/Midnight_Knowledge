<?php

namespace App\Livewire\Pages;

use App\DTO\StatusDTO;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Welcome extends Component
{

    #[Layout('components.layouts.appLogin')]
    #[Title('Welcome')]
    public function render()
    {
        return view('livewire.pages.welcome');
    }
}
