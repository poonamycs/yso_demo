<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormWizards extends Component
{
    public $age;
    public function render()
    {
        return view('livewire.form-wizards');
    }
}
