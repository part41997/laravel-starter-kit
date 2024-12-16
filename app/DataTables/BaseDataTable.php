<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Services\DataTable;

class BaseDataTable extends DataTable
{
    /**
     * @var array
     */
    protected array $parameters = [
        'dom' => '<"row"<"col-12"B>><"row mt-3"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
        'initComplete' => 'function(settings, json) {$(this).removeClass("table-striped");}',
        'select' => [
            'style' => 'multi',
            'selector' => 'td:first-child',
        ],
        // drawCallback
        'drawCallback' => 'function() {
            initializeTooltips();
        }',
    ];
}
