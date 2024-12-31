<?php

namespace App\Livewire\Components;

use App\Actions\CreateSecretSanta;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewSecretSanta extends Component
{
    public $isLoading = false;

    #[Validate('required', 'array', 'min:3')]
    public $participants = [
        ['name' => ''],
        ['name' => ''],
        ['name' => ''],
    ];

    #[Validate('required', 'max:255')]
    public $organizer = '';

    #[Validate('required', 'max:255')]
    public $name = '';

    #[Validate('required', 'date')]
    public $gift_exchange_date = '';

    #[Validate('required', 'numeric')]
    public $budget = '';

    #[Validate('nullable', 'max:255')]
    public $message = '';

    public function save()
    {
        $this->validate();

        $this->isLoading = true;

        $createSecretSanta = App::make(CreateSecretSanta::class);

        $group = $createSecretSanta->handle([
            'participants' => $this->participants,
            'organizer' => $this->organizer,
            'name' => $this->name,
            'gift_exchange_date' => $this->gift_exchange_date,
            'budget' => $this->budget,
            'message' => $this->message,
        ]);

        $this->isLoading = false;

        return $this->redirectRoute(
            'secret-santa.show', 
            ['group' => $group->slug], 
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.components.new-secret-santa');
    }
}
