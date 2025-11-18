<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\TipoCambioRango;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TipoCambioRangoTable extends DataTableComponent
{
    protected $model = TipoCambioRango::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->sortable(),
            Column::make("Fecha consulta", "fecha_consulta")->sortable(),
            Column::make("Fecha tipo cambio", "fecha_tipo_cambio")
                ->sortable()
                ->format(fn($v) => \Carbon\Carbon::parse($v)->format('d/m/Y')),
            Column::make("Compra", "compra")
                ->sortable()
                ->format(fn($v) => 'Q ' . number_format($v, 4)),
            Column::make("Venta", "venta")
                ->sortable()
                ->format(fn($v) => 'Q ' . number_format($v, 4)),
            Column::make("Origen API", "origen_api")->sortable(),
            Column::make("Creado", "created_at")->sortable(),
        ];
    }
}
