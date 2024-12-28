<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'email',
        'name',
        'secret_santa_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function secretSanta(): BelongsTo
    {
        return $this->belongsTo(self::class, 'secret_santa_id');
    }
}
