<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRollInfo extends Model
{
    protected $table = 'client_roll_info';
    protected $fillable = [
        'user_id',
        'uuid',
        'roll_id',       
        'remark'
    ];
}
