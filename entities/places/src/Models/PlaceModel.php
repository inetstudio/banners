<?php

namespace InetStudio\BannersPackage\Places\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\BannersPackage\Places\Contracts\Models\PlaceModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class PlaceModel.
 */
class PlaceModel extends Model implements PlaceModelContract
{
    use Auditable;
    use SoftDeletes;
    use BuildQueryScopeTrait;

    const MATERIAL_TYPE = 'banners_place';

    /**
     * Should the timestamps be audited?
     *
     * @var bool
     */
    protected $auditTimestamps = true;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'banners_places';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
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
            'name',
            'alias',
        ];
    }

    /**
     * Сеттер атрибута name.
     *
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута alias.
     *
     * @param $value
     */
    public function setAliasAttribute($value)
    {
        $this->attributes['alias'] = trim(strip_tags($value));
    }

    /**
     * Тип материала.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return self::MATERIAL_TYPE;
    }

    /**
     * Баннеры.
     *
     * @return BelongsToMany
     *
     * @throws BindingResolutionException
     */
    public function banners(): BelongsToMany
    {
        $entryModel = app()->make('InetStudio\BannersPackage\Banners\Contracts\Models\BannerModelContract');

        return $this->belongsToMany(
            get_class($entryModel),
            'banners_places_banners',
            'place_model_id',
            'banner_model_id'
        );
    }
}
