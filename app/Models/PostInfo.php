<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Notifications\Notifiable;

class PostInfo extends Model
{
    use HasFactory;
    // Use Uuid, Notifiable;
   
    // public $incrementing = false;

    // protected $keyType = 'uuid';

    protected $table = 'post_info';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'post_manage_id',
        'post_title',
        'post_description',
        'post_imge',
        'post_status',
        'post_date',
        'remark'
    ];

}
