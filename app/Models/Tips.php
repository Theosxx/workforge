<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{
    protected $table = 'tb_tips';
    protected $fillable = ['nama', 'tips_loker', 'done_work', 'foto'];
}
