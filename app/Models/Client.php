<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'image',
        'phone',
        'legal_regime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
