<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tipo de Cambio','breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Tipo de Cambio',
        ]
    ])]); ?>

    
     <?php $__env->slot('action', null, []); ?> 
        <form action="<?php echo e(route('admin.tipo-cambio.consultar')); ?>" method="POST" class="inline">
            <?php echo csrf_field(); ?>
            <?php if (isset($component)) { $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1 = $attributes; } ?>
<?php $component = WireUi\Components\Button\Base::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('wire-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\WireUi\Components\Button\Base::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','blue' => true,'xs' => true]); ?>
                Consultar Tipo de Cambio
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $attributes = $__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__attributesOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1)): ?>
<?php $component = $__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1; ?>
<?php unset($__componentOriginalf04362c37f55b087f96f1c4fb07d5ce1); ?>
<?php endif; ?>
        </form>
     <?php $__env->endSlot(); ?>

    
    <?php if(session('error')): ?>
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 5000)" 
            x-show="show"
            x-transition
            class="flex items-center p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50"
            role="alert"
        >
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('exito')): ?>
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 5000)" 
            x-show="show"
            x-transition
            class="flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50"
            role="alert"
        >
            <?php echo e(session('exito')); ?>

        </div>
    <?php endif; ?>


    
<?php if($ultimo): ?>
    <?php
        $anterior = \App\Models\TipoCambio::latest()->skip(1)->first();
        $subio = $anterior ? $ultimo->tipo_cambio > $anterior->tipo_cambio : null;
        $bajo  = $anterior ? $ultimo->tipo_cambio < $anterior->tipo_cambio : null;
    ?>

    <div class="mb-4 p-4 rounded shadow flex items-center justify-between bg-info-100
        <?php echo e($subio ? 'bg-green-100 text-green-800' : ($bajo ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')); ?>">
        <div>
            <strong>Último Tipo de Cambio:</strong>
            <span class="ml-2"><?php echo e($ultimo->tipo_cambio); ?></span>
            <small class="ml-2">(Fecha: <?php echo e(\Carbon\Carbon::parse($ultimo->fecha_tipo_cambio)->format('d/m/Y h:m:s')); ?>)</small>
        </div>
        <?php if($subio): ?>
            <span class="font-bold text-green-700">▲ Subió</span>
        <?php elseif($bajo): ?>
            <span class="font-bold text-red-700">▼ Bajó</span>
        <?php else: ?>
            <span class="font-bold text-gray-700">— Sin cambio</span>
        <?php endif; ?>
    </div>
<?php endif; ?>


<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.datatables.tipocambios-table');

$__html = app('livewire')->mount($__name, $__params, 'lw-2107617456-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>   
   
    <?php $__env->startPush('css'); ?>
        <style>
            table th span, table td {
                font-size: 0.75rem !important;
            }
        </style>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\API_tipocambioV3\resources\views/admin/tipo_cambio/index.blade.php ENDPATH**/ ?>