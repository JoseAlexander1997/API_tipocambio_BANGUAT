<x-admin-layout
    title="Tipo de Cambio"
    :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Tipo de Cambio',
        ]
    ]">

    {{-- BOTÓN EN EL SLOT SUPERIOR --}}
    <x-slot name="action">
        <form action="{{ route('admin.tipo-cambio.consultar') }}" method="POST" class="inline">
            @csrf
            <x-wire-button type="submit" blue xs>
                Consultar Tipo de Cambio
            </x-wire-button>
        </form>
    </x-slot>

    {{-- MENSAJES --}}
    @if(session('error'))
        <div class="alert alert-danger mb-3">
            {{ session('error') }}
        </div>
    @endif

    @if(session('exito'))
        <div class="alert alert-success mb-3 bg-ingo-50">
            {{ session('exito') }}
        </div>
    @endif


    {{-- Último Tipo de Cambio --}}
@if($ultimo)
    @php
        $anterior = \App\Models\TipoCambio::latest()->skip(1)->first();
        $subio = $anterior ? $ultimo->tipo_cambio > $anterior->tipo_cambio : null;
        $bajo  = $anterior ? $ultimo->tipo_cambio < $anterior->tipo_cambio : null;
    @endphp

    <div class="mb-4 p-4 rounded shadow flex items-center justify-between bg-info-100
        {{ $subio ? 'bg-green-100 text-green-800' : ($bajo ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
        <div>
            <strong>Último Tipo de Cambio:</strong>
            <span class="ml-2">{{ $ultimo->tipo_cambio }}</span>
            <small class="ml-2">(Fecha: {{ \Carbon\Carbon::parse($ultimo->fecha_tipo_cambio)->format('d/m/Y h:m:s') }})</small>
        </div>
        @if($subio)
            <span class="font-bold text-green-700">▲ Subió</span>
        @elseif($bajo)
            <span class="font-bold text-red-700">▼ Bajó</span>
        @else
            <span class="font-bold text-gray-700">— Sin cambio</span>
        @endif
    </div>
@endif

{{-- TABLA DE ÚLTIMAS CONSULTAS --}}
@livewire('admin.datatables.tipocambios-table')




   
   
    @push('css')
        <style>
            table th span, table td {
                font-size: 0.75rem !important;
            }
        </style>
    @endpush

</x-admin-layout>
