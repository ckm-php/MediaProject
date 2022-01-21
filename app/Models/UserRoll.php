<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserRoll extends Model
{
    protected $table = 'client_roll';
    protected $fillable = [
        'roll_id',
        'roll_name',
        'remark'
    ];
}
