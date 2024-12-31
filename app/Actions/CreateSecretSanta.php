<?php

namespace App\Actions;

use App\Models\Group;
use Illuminate\Support\Str;

class CreateSecretSanta
{
    public function handle(array $data): Group
    {
        $data['participants'] = array_filter($data['participants'], function ($participant) {
            return !empty($participant['name']);
        });

        $validatedData = validator($data, [
            'participants.*.name' => ['required', 'max:255'],
            'organizer' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'gift_exchange_date' => ['required', 'date'],
            'budget' => ['required', 'numeric'],
            'message' => ['nullable', 'max:255'],
        ])->validate();
        
        $validatedData['slug'] = Str::random();

        while (Group::where('slug', $validatedData['slug'])->exists()) {
            $validatedData['slug'] = Str::random();
        }

        $secretSanta = Group::create($validatedData);

        foreach ($validatedData['participants'] as $participant) {
            $secretSanta->participants()->create($participant);
        }

        return $secretSanta;
    }
}
