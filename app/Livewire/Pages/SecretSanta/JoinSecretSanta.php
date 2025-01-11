<?php

namespace App\Livewire\Pages\SecretSanta;

use App\Actions\MatchSecretSanta;
use App\Models\Group;
use App\Models\Participant;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Spatie\Browsershot\Browsershot;

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

        $this->dispatch('secret-santa-revealed');
    }

    public function download()
    {
        $image = storage_path(sprintf('app/public/secret-santa-%s.jpg', $this->participantId));

        Browsershot::html(Blade::render('components.download-secret-santa', [
            'group' => $this->group,
            'participant' => Participant::find($this->participantId),
        ]))
        ->setChromePath('/snap/bin/chromium')
        ->setCustomTempPath(storage_path())
        ->newHeadless()
        ->showBackground()
        ->save($image);

        return response()->download($image)->deleteFileAfterSend(true);
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
