<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Players;

class Clubs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'stadium',
        'city'
    ];

    public function players()
    {
        return $this->hasMany(Players::class);
    }
}
