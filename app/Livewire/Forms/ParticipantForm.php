<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ParticipantForm extends Form
{
    #[Validate('required')]
    public ?string $name = null;

    #[Validate('nullable', 'email')]
    public ?string $email = null;

    public function store(Group $group)
    {
        $this->validate();

        $group->participants()->create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        
        $this->reset();
    }
}
