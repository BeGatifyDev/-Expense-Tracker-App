<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Expense Tracker')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <?php if(session('success')): ?>
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="mb-6 flex justify-between items-center">
                <h3 class="text-lg font-bold">Your Expenses</h3>
                <a href="<?php echo e(route('expenses.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Add Expense</a>
            </div>

            <div class="bg-white shadow rounded p-4">
                <?php if($expenses->count()): ?>
                    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-b py-2">
                            <div class="font-medium"><?php echo e($expense->title); ?> - ₦<?php echo e(number_format($expense->amount, 2)); ?></div>
                            <div class="text-sm text-gray-500"><?php echo e($expense->category); ?></div>
                            <div class="text-sm text-gray-600"><?php echo e($expense->description); ?></div>
                            <div class="mt-2 flex space-x-2">
                                <a href="<?php echo e(route('expenses.edit', $expense)); ?>" class="text-blue-500 hover:underline">Edit</a>
                                <form action="<?php echo e(route('expenses.destroy', $expense)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Delete this expense?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="mt-4">
                        <?php echo e($expenses->links()); ?>

                    </div>
                <?php else: ?>
                    <p class="text-center text-gray-500">No expenses recorded yet.</p>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('expenses.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Add Your First Expense</a>
                    </div>
                <?php endif; ?>
            </div>

            <footer class="text-center text-gray-500 text-sm mt-8">
                Developed by Oluwatobi Best Oluwafemi
            </footer>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\expense-tracker\resources\views/expenses/index.blade.php ENDPATH**/ ?>