<?php

namespace App\Livewire\Pages\SecretSanta;

use App\Livewire\Forms\SecretSantaForm;
use App\Models\Group;
use Livewire\Component;

class ShowSecretSanta extends Component
{
    public SecretSantaForm $form;

    public function mount(Group $group)
    {
        $this->form->fill($group);
    }

    public function render()
    {
        return view('livewire.pages.secret-santa.show-secret-santa');
    }
}
