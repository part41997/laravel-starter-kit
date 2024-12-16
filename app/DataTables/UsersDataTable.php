<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\DataTables\BaseDataTable;
use App\Enums\UserStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UsersDataTable extends BaseDataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('full_name', function ($user) {
                return $user->full_name;
            })
            ->editColumn('status', function ($user) {
                return $user->status->getHtmlBadge();
            })
            ->editColumn('role_name', function ($user) {
                return optional($user->roles->first())->name;
            })
            ->orderColumn('full_name', 'first_name $1, last_name $1')
            ->addColumn('action', function ($user) {
                return view('admin.users.action', compact('user'));
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d H:i:s');
            })
            ->setRowId('id')
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        $request = $this->request();
        $seachStr = $request->get('search')['value'] ?? '';
        $roleId = $request->get('role') ?? '';
        $status = $request->get('status') ?? '';
        $startDate = $request->get('start_date') ?? '';
        $endDate = $request->get('end_date') ?? '';

        $model = $model->with('roles')->where('id', '!=', Auth::id());

        if ($roleId != '') {
            $model = $model->whereHas('roles', function ($query) use ($roleId) {
                $query->where('id', $roleId);
            });
        }

        if ($status != '') {
            $status = UserStatus::fromValue($status);
            $model = $model->where('status', $status);
        }

        if ($startDate != '' && $endDate != '') {
            $startDate = Carbon::parse($startDate)->startOfDay();
            $endDate = Carbon::parse($endDate)->endOfDay();
            $model = $model->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($seachStr != '') {
            $model = $model->where(function ($query) use ($seachStr) {
                $query->whereRaw('CONCAT(first_name, " ", last_name) like ?', ['%' . $seachStr . '%'])
                    ->orWhere('email', 'like', '%' . $seachStr . '%')
                    ->orWhereHas('roles', function ($query) use ($seachStr) {
                        $query->where('name', 'like', '%' . $seachStr . '%');
                    });
            });
        }

        return $model;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->language(__('app.datatables'))
            ->parameters($this->parameters)
            ->buttons([
                Button::make('excel')
                    ->addClass('btn btn-success btn-sm me-2 rounded')
                    ->text('<i class="fa fs-16 align-item-center text-center fa-file-excel"></i> ' . __('app.excel')),
                Button::make('csv')
                    ->addClass('btn btn-info btn-sm me-2 rounded')
                    ->text('<i class="fa fs-16 align-item-center text-center fa-file-csv"></i> ' . __('app.csv')),
                Button::make('pdf')
                    ->addClass('btn btn-danger btn-sm me-2 rounded')
                    ->text('<i class="fa fs-16 align-item-center text-center fa-file-pdf"></i> ' . __('app.pdf')),
                Button::make('print')
                    ->addClass('btn btn-primary btn-sm me-2 rounded')
                    ->text('<i class="fa fs-16 align-item-center text-center fa-print"></i> ' . __('app.print')),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->title(__('app.user.id'))
                ->searchable(false)
                ->visible(false)
                ->printable(false)
                ->exportable(false),
            Column::make('full_name')
                ->title(__('app.user.full_name'))
                ->searchable(false),
            Column::make('email')
                ->title(__('app.user.email'))
                ->searchable(false),
            Column::make('role_name')
                ->title(__('app.user.role'))
                ->searchable(false)
                ->orderable(false),
            Column::make('created_at')
                ->title(__('app.user.created_at'))
                ->searchable(false),
            Column::computed('status')
                ->title(__('app.user.status'))
                ->addClass('text-center')
                ->searchable(false),
            Column::computed('action')
                ->title(__('app.action'))
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->searchable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
