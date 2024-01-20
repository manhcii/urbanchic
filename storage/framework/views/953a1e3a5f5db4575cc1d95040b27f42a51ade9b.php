<?php if($paginator->hasPages()): ?>
<nav class="pagination">
    <ul class="page-numbers">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                <a class="page-link prev page-numbers">
                    
                </a>
            </li>
        <?php else: ?>
            <li class="page-item ">
                <a class="page-link prev page-numbers" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
                    aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                    
                </a>
            </li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="page-item "><a class="page-link page-numbers"><?php echo e($element); ?></a></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="page-item"><span class="page-link current page-numbers"><?php echo e($page); ?></span>
                        </li>
                    <?php else: ?>
                        <li class="page-item "><a class="page-link page-numbers" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item ">
                <a class="page-link next page-numbers" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
                    aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                <a class="page-link next page-numbers">
                    
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/pagination/default.blade.php ENDPATH**/ ?>