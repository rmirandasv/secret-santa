<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    protected $fillable = [
        'user_id',
        'organizer',
        'name',
        'slug',
        'description',
        'gift_exchange_date',
        'budget',
    ];

    protected $dates = [
        'gift_exchange_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
