<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scope extends Model
{
    use SoftDeletes;

    protected $table = 'appfiy_scope';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at','created_at','updated_at'];
    protected $fillable = ['name', 'slug','is_global','plugin_slug','page_id'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}
