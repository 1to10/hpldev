<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigations';

    public function parent()
    {
        return $this->belongsTo('App\Navigation', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Navigation', 'parent_id');
    }

}