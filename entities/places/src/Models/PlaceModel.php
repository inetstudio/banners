<?php

namespace InetStudio\BannersPackage\Places\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

class PlaceModel extends Model implements PlaceModelContract
{
    use Auditable;
    use SoftDeletes;
    use BuildQueryScopeTrait;

    const MATERIAL_TYPE = 'banners_place';

    protected $auditTimestamps = true;

    protected $table = 'banners_places';

    protected $fillable = [
        'name',
        'alias',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'name',
            'alias',
        ];
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = trim(strip_tags($value));
    }

    public function setAliasAttribute($value)
    {
        $this->attributes['alias'] = trim(strip_tags($value));
    }

    public function getTypeAttribute(): string
    {
        return self::MATERIAL_TYPE;
    }

    public function banners(): BelongsToMany
    {
        $bannerModel = resolve('InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract');

        return $this->belongsToMany(
            get_class($bannerModel),
            'banners_places_banners',
            'place_model_id',
            'banner_model_id'
        );
    }
}
