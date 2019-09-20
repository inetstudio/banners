@inject('placesService', 'InetStudio\BannersPackage\Places\Contracts\Services\Back\ItemsServiceContract')

@php
    $item = $value;
@endphp

{!! Form::dropdown('places[]', $item->places()->pluck('id')->toArray(), [
    'label' => [
        'title' => 'Расположения',
    ],
    'field' => [
        'class' => 'select2-drop form-control',
        'data-placeholder' => 'Выберите расположения',
        'style' => 'width: 100%',
        'multiple' => 'multiple',
        'data-source' => route('back.banners-package.places.getSuggestions'),
        'data-exclude' => isset($attributes['exclude']) ? implode('|', $attributes['exclude']) : '',
    ],
    'options' => [
        'values' => (old('places')) ? $placesService->getItemById(old('places'))->pluck('name', 'id')->toArray() : $item->places()->pluck('name', 'id')->toArray(),
    ],
]) !!}
