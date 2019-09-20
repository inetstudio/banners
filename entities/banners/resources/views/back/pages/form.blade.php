@extends('admin::back.layouts.app')

@php
    $title = ($item->id) ? 'Редактирование баннера' : 'Создание баннера';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.banners-package.banners::back.partials.breadcrumbs.form')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title">
                <a class="btn btn-sm btn-white m-r-xs" href="{{ route('back.banners-package.banners.index') }}">
                    <i class="fa fa-arrow-left"></i> Вернуться назад
                </a>
            </div>
        </div>

        {!! Form::info() !!}

        {!! Form::open(['url' => (! $item->id) ? route('back.banners-package.banners.store') : route('back.banners-package.banners.update', [$item->id]), 'id' => 'mainForm', 'enctype' => 'multipart/form-data']) !!}

        @if ($item->id)
            {{ method_field('PUT') }}
        @endif

        {!! Form::hidden('banner_id', (! $item->id) ? '' : $item->id, ['id' => 'object-id']) !!}

        {!! Form::hidden('banner_type', get_class($item), ['id' => 'object-type']) !!}

        <div class="ibox">
            <div class="ibox-title">
                {!! Form::buttons('', '', ['back' => 'back.banners-package.banners.index']) !!}
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group float-e-margins" id="mainAccordion">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#mainAccordion" href="#collapseMain"
                                           aria-expanded="true">Основная информация</a>
                                    </h5>
                                </div>
                                <div id="collapseMain" class="collapse show" aria-expanded="true">
                                    <div class="panel-body">

                                        {!! Form::banners_places('', $item) !!}

                                        {!! Form::banners_groups('', $item) !!}

                                        {!! Form::string('title', $item->title, [
                                            'label' => [
                                                'title' => 'Заголовок',
                                            ],
                                        ]) !!}

                                        @php
                                            $bannerImageMedia = $item->getFirstMedia('banner');
                                        @endphp

                                        {!! Form::crop('banner', $bannerImageMedia, [
                                            'label' => [
                                                'title' => 'Баннер',
                                            ],
                                            'image' => [
                                                'filepath' => isset($bannerImageMedia) ? url($bannerImageMedia->getUrl()) : '',
                                                'filename' => isset($bannerImageMedia) ? $bannerImageMedia->file_name : '',
                                            ],
                                            'crops' => [],
                                            'additional' => [
                                                [
                                                    'title' => 'Описание',
                                                    'name' => 'description',
                                                    'value' => isset($bannerImageMedia) ? $bannerImageMedia->getCustomProperty('description') : '',
                                                ],
                                                [
                                                    'title' => 'Copyright',
                                                    'name' => 'copyright',
                                                    'value' => isset($bannerImageMedia) ? $bannerImageMedia->getCustomProperty('copyright') : '',
                                                ],
                                                [
                                                    'title' => 'Alt',
                                                    'name' => 'alt',
                                                    'value' => isset($bannerImageMedia) ? $bannerImageMedia->getCustomProperty('alt') : '',
                                                ],
                                            ],
                                        ]) !!}

                                        {!! Form::string('href', $item->href, [
                                            'label' => [
                                                'title' => 'Ссылка',
                                            ],
                                        ]) !!}

                                        {!! Form::datepicker('date_start', ($item->date_start) ? $item->date_start->format('d.m.Y H:i') : '', [
                                            'label' => [
                                                'title' => 'Дата начала',
                                            ],
                                            'field' => [
                                                'class' => 'datetimepicker form-control',
                                                'autocomplete' => 'off'
                                            ],
                                        ]) !!}

                                        {!! Form::datepicker('date_end', ($item->date_end) ? $item->date_end->format('d.m.Y H:i') : '', [
                                            'label' => [
                                                'title' => 'Дата окончания',
                                            ],
                                            'field' => [
                                                'class' => 'datetimepicker form-control',
                                                'autocomplete' => 'off'
                                            ],
                                        ]) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                {!! Form::buttons('', '', ['back' => 'back.banners-package.banners.index']) !!}
            </div>
        </div>

        {!! Form::close()!!}
    </div>
@endsection
