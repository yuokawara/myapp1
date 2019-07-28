<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppHistory extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'app_id' => 'required',
        'edited_at' => 'required',
    );
}
