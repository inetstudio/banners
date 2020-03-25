<?php

namespace InetStudio\BannersPackage\Banners\Models;

use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\Uploads\Models\Traits\HasImages;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;
use InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract;

/**
 * Class BannersModel.
 */
class BannerModel extends Model implements BannerModelContract
{
    use Auditable;
    use HasImages;
    use SoftDeletes;
    use BuildQueryScopeTrait;

    /**
     * Тип сущности.
     */
    const ENTITY_TYPE = 'banner';

    /**
     * Should the timestamps be audited?
     *
     * @var bool
     */
    protected $auditTimestamps = true;

    /**
     * Настройки для генерации изображений.
     *
     * @var array
     */
    protected $images = [
        'config' => 'banners',
        'model' => 'banner',
    ];

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'banners';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'href',
        'date_start',
        'date_end',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Загрузка модели.
     */
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

    /**
     * Сеттер атрибута title.
     *
     * @param $value
     */
    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута href.
     *
     * @param $value
     */
    public function setHrefAttribute($value): void
    {
        $this->attributes['href'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута date_start.
     *
     * @param $value
     */
    public function setDateStartAttribute($value): void
    {
        $this->attributes['date_start'] = ($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : null;
    }

    /**
     * Сеттер атрибута date_end.
     *
     * @param $value
     */
    public function setDateEndAttribute($value): void
    {
        $this->attributes['date_end'] = ($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : null;
    }

    /**
     * Геттер атрибута type.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return self::ENTITY_TYPE;
    }

    /**
     * Расположения.
     *
     * @return BelongsToMany
     *
     * @throws BindingResolutionException
     */
    public function places(): BelongsToMany
    {
        $groupModel = app()->make('InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract');

        return $this->belongsToMany(
            get_class($groupModel),
            'banners_places_banners',
            'banner_model_id',
            'place_model_id'
        );
    }

    /**
     * Группы.
     *
     * @return BelongsToMany
     *
     * @throws BindingResolutionException
     */
    public function groups(): BelongsToMany
    {
        $groupModel = app()->make('InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract');

        return $this->belongsToMany(
            get_class($groupModel),
            'banners_groups_banners',
            'banner_model_id',
            'group_model_id'
        );
    }
}
