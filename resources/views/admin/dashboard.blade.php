<x-admin-layout
title="Dashboard | Codersfree"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Pruebas',
    ],
    
]">

<x-slot name="action">
    Hola mundo
</x-slot>

<x-wire-button>
    Prueba
</x-wire-button>

Hola desde el admin2

    

</x-admin-layout>