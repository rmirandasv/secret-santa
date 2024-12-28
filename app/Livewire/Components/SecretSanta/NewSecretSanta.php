<?php

namespace App\Livewire\Components\SecretSanta;

use App\Livewire\Forms\SecretSantaForm;
use Livewire\Component;

class NewSecretSanta extends Component
{
    public SecretSantaForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('secret-santa.show', ['group' => $this->form->group], navigate: true);
    }

    public function render()
    {
        return view('livewire.components.secret-santa.new-secret-santa');
    }
}
