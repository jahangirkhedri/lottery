<?php

namespace Module\Lottery\Models;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    protected $fillable = ['code','campaign_id','user_id'];
}
