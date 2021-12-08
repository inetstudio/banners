<?php

namespace InetStudio\BannersPackage\Groups\Services\Back;

use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use InetStudio\BannersPackage\Groups\Contracts\Models\GroupModelContract;
use InetStudio\BannersPackage\Groups\Contracts\Services\Back\DataTableServiceContract;

class DataTableService extends DataTable implements DataTableServiceContract
{
    public GroupModelContract $model;

    public function __construct(GroupModelContract $model)
    {
        $this->model = $model;
    }

    public function ajax(): JsonResponse
    {
        $transformer = resolve(
            'InetStudio\BannersPackage\Groups\Contracts\Transformers\Back\Resource\IndexTransformerContract'
        );

        return DataTables::of($this->query())
            ->setTransformer($transformer)
            ->rawColumns(['actions'])
            ->make();
    }

    public function query()
    {
        return $this->model->buildQuery(
            [
                'columns' => ['created_at', 'updated_at'],
            ]
        );
    }

    public function html(): Builder
    {
        /** @var Builder $table */
        $table = app('datatables.html');

        return $table
            ->columns($this->getColumns())
            ->ajax($this->getAjaxOptions())
            ->parameters($this->getParameters());
    }

    protected function getColumns(): array
    {
        return [
            ['data' => 'name', 'name' => 'name', 'title' => 'Название'],
            ['data' => 'alias', 'name' => 'alias', 'title' => 'Алиас'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Дата создания'],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Дата обновления'],
            [
                'data' => 'actions',
                'name' => 'actions',
                'title' => 'Действия',
                'orderable' => false,
                'searchable' => false,
            ],
        ];
    }

    protected function getAjaxOptions(): array
    {
        return [
            'url' => route('back.banners-package.groups.data.index'),
            'type' => 'POST',
        ];
    }

    protected function getParameters(): array
    {
        $translation = trans('admin::datatables');

        return [
            'paging' => true,
            'pagingType' => 'full_numbers',
            'searching' => true,
            'info' => false,
            'searchDelay' => 350,
            'language' => $translation,
        ];
    }
}
