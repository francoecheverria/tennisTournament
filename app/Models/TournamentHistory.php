<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'gender',
        'rounds',
        'winner',
        'players'
    ];

    protected $casts = [
        'rounds' => 'array',
        'players' => 'array',
    ];
}
