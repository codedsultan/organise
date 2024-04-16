<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Get the event that owns the tickets.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
