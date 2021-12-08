<?php

namespace InetStudio\BannersPackage\Banners\Models;

use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\UploadsPackage\Uploads\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;

class BannerModel extends Model implements BannerModelContract
{
    use Auditable;
    use HasMedia;
    use SoftDeletes;
    use BuildQueryScopeTrait;

    const ENTITY_TYPE = 'banner';

    protected bool $auditTimestamps = true;

    protected $table = 'banners';

    protected $fillable = [
        'title',
        'href',
        'date_start',
        'date_end',
    ];

    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'title',
            'href',
            'date_start',
            'date_end',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'places' => function ($query) {
                $query->select(['id', 'name', 'alias']);
            },

            'groups' => function ($query) {
                $query->select(['id', 'name', 'alias']);
            },

            'media' => function (MorphMany $mediaQuery) {
                $mediaQuery->select(
                    [
                        'id',
                        'model_id',
                        'model_type',
                        'collection_name',
                        'file_name',
                        'disk',
                        'conversions_disk',
                        'uuid',
                        'mime_type',
                        'custom_properties',
                        'responsive_images',
                    ]
                );
            },
        ];
    }

    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = trim(strip_tags($value));
    }

    public function setHrefAttribute($value): void
    {
        $this->attributes['href'] = trim(strip_tags($value));
    }

    public function setDateStartAttribute($value): void
    {
        $this->attributes['date_start'] = ($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : null;
    }

    public function setDateEndAttribute($value): void
    {
        $this->attributes['date_end'] = ($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : null;
    }

    public function getTypeAttribute(): string
    {
        return self::ENTITY_TYPE;
    }

    public function places(): BelongsToMany
    {
        $groupModel = resolve('InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract');

        return $this->belongsToMany(
            get_class($groupModel),
            'banners_places_banners',
            'banner_model_id',
            'place_model_id'
        );
    }

    public function groups(): BelongsToMany
    {
        $groupModel = resolve('InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract');

        return $this->belongsToMany(
            get_class($groupModel),
            'banners_groups_banners',
            'banner_model_id',
            'group_model_id'
        );
    }

    public function getMediaConfig(): array
    {
        return config('banners.media', []);
    }
}
