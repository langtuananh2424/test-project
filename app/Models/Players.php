<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clubs;

class Players extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'name',
        'position',
        'number',
        'birthday',
    ];

    public function club()
    {
        return $this->belongsTo(Clubs::class);
    }
}
