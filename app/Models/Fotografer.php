<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fotografer extends Model
{
    /** @use HasFactory<\Database\Factories\FotograferFactory> */
    use HasFactory;

    protected $guarded = [];

    public function eFotografer(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
