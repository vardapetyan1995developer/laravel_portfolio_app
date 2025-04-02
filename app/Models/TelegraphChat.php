<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TelegraphChat extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function telegraphBot(): BelongsTo
    {
        return $this->belongsTo(TelegraphBot::class);
    }
}
