<?php

namespace App\Actions;

use App\Models\Group;
use App\Models\Participant;

class MatchSecretSanta
{
    public function handle(Group $group, $participantId): Participant
    {
        $hasSecretSanta = Participant::where('group_id', $group->id)
            ->whereNotNull('secret_santa_id')
            ->pluck('secret_santa_id')
            ->toArray();

        $matches = Participant::where('group_id', $group->id)
            ->whereNotIn('id', $hasSecretSanta)
            ->where('id', '!=', $participantId)
            ->get();

        if ($matches->count() === 2) {
            $matches = $matches->filter(function ($match) use ($participantId) {
                return $match->secret_santa_id !== $participantId;
            });
        }

        $match = $matches->random();

        $participant = Participant::find($participantId);
        $participant->secret_santa_id = $match->id;
        $participant->save();

        return $match;
    }
}
