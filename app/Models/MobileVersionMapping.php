<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MobileVersionMapping extends Model
{
    protected $table = 'appza_mobile_version_mapping';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'mobile_app_id','mobile_version','mobile_version_code','minimum_plugin_version','latest_plugin_version','force_update','is_active','optional_message'
    ];

    public function mobile_app(): BelongsTo
    {
        return $this->belongsTo(MobileSupportApp::class, 'mobile_app_id');
    }

    public static function boot() {
        parent::boot();
        self::creating(function ($model) {
            $date =  new \DateTime("now");
            $model->created_at = $date;
        });

        self::updating(function ($model) {
            $date =  new \DateTime("now");
            $model->updated_at = $date;
        });

        static::saving(function ($model) {
            if ($model->mobile_version) {
                [$maj, $min, $pat] = array_map('intval', explode('.', $model->mobile_version));
                $model->mobile_version_code = ($maj * 10000) + ($min * 100) + $pat;
            }
        });
    }

}
