<?php

namespace App\Livewire\Pages\SecretSanta;

use App\Livewire\Forms\ParticipantForm;
use App\Livewire\Forms\SecretSantaForm;
use App\Models\Group;
use Livewire\Component;

class ShowSecretSanta extends Component
{
    public SecretSantaForm $form;

    public ParticipantForm $participantForm;

    public function mount(Group $group)
    {
        $this->form->fill($group);
        $this->form->group = $group;
    }

    public function addParticipant()
    {
        $this->participantForm->store($this->form->group);
    }

    public function removeParticipant($participantId)
    {
        $this->form->group->participants()->find($participantId)->delete();
    }

    public function render()
    {
        $participants = $this->form->group->participants;
        return view('livewire.pages.secret-santa.show-secret-santa', compact('participants'));
    }
}
