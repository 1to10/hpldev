<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'name',
        'cat_id',
        'sub_cat_id',
        'range_id',
        'name',
        'short_description',
        'description',
        'thumb_image',
        'image',
        'document',
        'status',
        'created_at',
        'updated_at'
    ];



}