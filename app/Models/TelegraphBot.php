<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TelegraphBot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'token',
    ];

    /**
     * @return HasMany
     */
    public function telegraphChats(): HasMany
    {
        return $this->hasMany(TelegraphChat::class);
    }
}
