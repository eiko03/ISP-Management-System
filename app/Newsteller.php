<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Newsteller extends Model
{
    use Notifiable;
    protected $guarded=[];
}
