<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
    protected $fillable = [
        'team_name'
    ];
    // $fillable = [
    //     'team_name->enabled',
    // ];
}
