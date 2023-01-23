<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = ['country','short_link_id'];

    /** Relacion 1 a M inversa */
    public function shortLink(): BelongsTo
    {
        return $this->belongsTo(shortLink::class);
    }
}
