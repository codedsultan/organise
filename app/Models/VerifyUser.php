<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class VerifyUser extends Model
{
    use HasFactory;

    public $table = "verify_users";

    protected $fillable = [
        'user_id',
        'user_type',
        'token',
    ];

    public function user(): MorphTo
    {
        return $this->morphTo();
    }
}
