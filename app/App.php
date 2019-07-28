<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'app';
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );

    // 以下を追記
    // Appモデルに関連付けを行う
    public function app_histories()
    {
      return $this->hasMany('App\AppHistory');

    }
}
