<?php

namespace InetStudio\BannersPackage\Groups\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

class GroupModel extends Model implements GroupModelContract
{
    use Auditable;
    use SoftDeletes;
    use BuildQueryScopeTrait;

    const MATERIAL_TYPE = 'banners_group';

    protected bool $auditTimestamps = true;

    protected $table = 'banners_groups';

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
        $this->attributes['name'] = strip_tags($value);
    }

    public function setAliasAttribute($value)
    {
        $this->attributes['alias'] = strip_tags($value);
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
            'banners_groups_banners',
            'group_model_id',
            'banner_model_id'
        );
    }
}
