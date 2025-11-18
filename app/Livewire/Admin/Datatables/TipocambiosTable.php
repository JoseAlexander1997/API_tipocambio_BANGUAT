<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TipoCambio;


class TipocambiosTable extends DataTableComponent
{
    protected $model = TipoCambio::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id','desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Fecha consulta", "fecha_consulta")
                ->sortable(),
            Column::make("Fecha tipo cambio", "fecha_tipo_cambio")
                ->sortable()
                ->format(fn($value) => \Carbon\Carbon::parse($value)->format('d/m/Y')),
            Column::make("Tipo cambio", "tipo_cambio")
                ->sortable()
                ->format(fn($value) => 'Q ' . number_format($value, 4)),
            Column::make("Origen api", "origen_api")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
