<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $fillable = ['type','name', 'parent_id', 'short_description', 'description','thumb_image','image','document','status', 'created_at', 'updated_at'];
    //category has childs
    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }


}