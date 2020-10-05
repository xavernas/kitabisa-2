<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';
    protected $fillable = [
        'name',
        'birth_date',
        'team'
    ];
    // $fillable = [
    //     'team_name->enabled',
    // ];
}
