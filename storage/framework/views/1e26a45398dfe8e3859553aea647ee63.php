<?php if(count($breadcrumbs)): ?>

    <nav class="mb-4">

        <ol class="flex flex-wrap">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <li class="text-sm leading-normal text-slate-700 <?php echo e(!$loop->first ? "pl-2 before:float-left before:pr-2 before:content-['/']" : ''); ?>">
                    
                    <?php if(isset($item['href'])): ?>
                        <a href="<?php echo e($item['href']); ?>" class="opacity-50">
                            <?php echo e($item['name']); ?>

                        </a>
                    <?php else: ?>
                        <?php echo e($item['name']); ?>

                    <?php endif; ?>

                </li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ol>

        <?php if(count($breadcrumbs) > 1): ?>
            
            <h6 class="font-bold">
                <?php echo e(end($breadcrumbs)['name']); ?>

            </h6>

        <?php endif; ?>
    </nav>

<?php endif; ?><?php /**PATH C:\xampp\htdocs\API_tipocambioV3\resources\views/layouts/includes/admin/breadcrumb.blade.php ENDPATH**/ ?>