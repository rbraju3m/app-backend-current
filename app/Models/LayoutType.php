<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayoutType extends Model
{
    use SoftDeletes;

    protected $table = 'appfiy_layout_type';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at','created_at','updated_at'];
    protected $fillable = ['name', 'slug'];
}
