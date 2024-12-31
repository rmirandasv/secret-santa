<?php

namespace App\Livewire\Pages\SecretSanta;

use App\Livewire\Forms\ParticipantForm;
use App\Livewire\Forms\SecretSantaForm;
use App\Models\Group;
use Livewire\Component;

class ShowSecretSanta extends Component
{
    public Group $group;

    public function mount(Group $group)
    {
        $this->group = $group;
    }

    public function render()
    {
        $participants = $this->group->participants;

        return view('livewire.pages.secret-santa.show-secret-santa', compact('participants'));
    }
}
