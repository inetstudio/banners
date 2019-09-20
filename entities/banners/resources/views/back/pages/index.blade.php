@extends('admin::back.layouts.app')

@php
    $title = 'Баннеры';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.banners-package.banners::back.partials.breadcrumbs.index')
    @endpush

    <div class="wrapper wrapper-content banners-package">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{ route('back.banners-package.banners.create') }}" class="btn btn-primary btn-sm">Добавить</a>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{ $table->table(['class' => 'table table-striped table-bordered table-hover dataTable']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushonce('scripts:datatables_banners_index')
{!! $table->scripts() !!}
@endpushonce
