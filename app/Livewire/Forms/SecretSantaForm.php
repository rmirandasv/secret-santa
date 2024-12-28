<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;

class SecretSantaForm extends Form
{
    public ?Group $group = null;

    #[Validate('required', 'string', 'max:255')]
    public string $organizer;

    #[Validate('required', 'string', 'max:255')]
    public string $name;

    #[Validate('nullable', 'string', 'max:255')]
    public ?string $description = null;

    #[Validate('required', 'date')]
    public string $gift_exchange_date;

    #[Validate('required', 'numeric')]
    public string $budget;

    public function store()
    {
        $this->validate();

        $slug = Str::random();

        while (Group::where('slug', $slug)->exists()) {
            $slug = Str::random();
        }

        $this->group = Group::create([
            'user_id' => Auth::id(),
            'organizer' => $this->organizer,
            'name' => $this->name,
            'slug' => $slug,
            'description' => $this->description,
            'gift_exchange_date' => $this->gift_exchange_date,
            'budget' => $this->budget,
        ]);
    }
}
