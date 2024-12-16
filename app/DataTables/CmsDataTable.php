<?php

namespace App\DataTables;

use App\Models\Cms;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\DataTables\BaseDataTable;
use Illuminate\Support\Str;

class CmsDataTable extends BaseDataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('slug', function ($cms) {
                return str_replace('-', ' ', Str::title($cms->slug));
            })
            ->editColumn('updated_at', function ($cms) {
                return $cms->updated_at->format('Y-m-d H:i:s');
            })
            ->addColumn('action', function ($cms) {
                return view('admin.cms.action', compact('cms'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Cms $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('cms-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->parameters)
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->sortable(false)->searchable(false)->visible(false),
            Column::make('slug')->title(__('app.cms.slug')),
            Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Cms_' . date('YmdHis');
    }
}
