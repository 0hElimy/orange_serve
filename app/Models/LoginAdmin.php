<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAdmin extends Model
{
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
