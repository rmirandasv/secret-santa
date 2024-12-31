<?php

namespace App\Actions;

use App\Models\Group;
use App\Models\Participant;

class MatchSecretSanta
{
    public function handle(Group $group, $participantId): Participant
    {
        $pared = Participant::where('group_id', $group->id)
            ->whereNotNull('secret_santa_id')
            ->pluck('secret_santa_id')
            ->toArray();

        $match = Participant::where('group_id', $group->id)
            ->whereNotIn('id', $pared)
            ->where('id', '!=', $participantId)
            ->get()
            ->random();

        Participant::find($participantId)->update([
            'secret_santa_id' => $match->id,
        ]);

        return $match;

    }
}
