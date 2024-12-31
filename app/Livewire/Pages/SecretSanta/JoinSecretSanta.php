<?php

namespace App\Livewire\Pages\SecretSanta;

use App\Actions\MatchSecretSanta;
use App\Models\Group;
use App\Models\Participant;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class JoinSecretSanta extends Component
{
    public Group $group;

    public $participantId = null;

    public $secretSantaRevealed = false;

    public Participant $secretSanta;

    public function mount(Group $group)
    {
        $this->group = $group;
    }

    public function setParticipant($participantId)
    {
        $this->participantId = $participantId;
    }

    public function revealSecretSanta()
    {
        $matchSecretSanta = App::make(MatchSecretSanta::class);

        $this->secretSanta = $matchSecretSanta->handle($this->group, $this->participantId);

        $this->secretSantaRevealed = true;
    }

    public function render()
    {
        $participant = null;

        if ($this->participantId) {
            $participant = $this->group->participants->find($this->participantId);
        }

        return view('livewire.pages.secret-santa.join-secret-santa', [
            'participant' => $participant,
        ]);
    }
}
