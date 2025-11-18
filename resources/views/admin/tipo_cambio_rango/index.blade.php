<x-admin-layout
    title="Historial de Tipo de Cambio"
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Historial Tipo de Cambio']
    ]">

    {{-- BOTÓN EN EL SLOT SUPERIOR --}}
    <x-slot name="action">
        <form action="{{ route('admin.tipo-cambio-rango.consultar') }}" method="POST" class="flex space-x-2">
            @csrf
            <input type="date" name="inicio" class="form-input" required>
            <input type="date" name="fin" class="form-input" required>
            <x-wire-button type="submit" blue xs>Consultar Historial</x-wire-button>
        </form>
    </x-slot>

    {{-- MENSAJES --}}
    @if(session('error'))
        <div x-data="{ show: true }" 
             x-init="setTimeout(() => show = false, 5000)" 
             x-show="show"
             class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50">
            {{ session('error') }}
        </div>
    @endif

    @if(session('exito'))
        <div x-data="{ show: true }" 
             x-init="setTimeout(() => show = false, 5000)" 
             x-show="show"
             class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50">
            {{ session('exito') }}
        </div>
    @endif

    {{-- TABLA --}}
    @livewire('admin.datatables.tipo-cambio-rango-table')

</x-admin-layout>
