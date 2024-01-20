<?php if($paginator->hasPages()): ?>
<div class="pagination-wrap">
  <div class="pagination">
    <?php if($paginator->onFirstPage()): ?>
    <button class="pagination-button" title="Previous page">
      <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.4375 5.12695L10.4219 1.14258C10.7148 0.849609 11.1543 0.849609 11.418 1.14258L12.0918 1.78711C12.3555 2.08008 12.3555 2.51953 12.0918 2.7832L9.25 5.5957L12.0918 8.4375C12.3555 8.70117 12.3555 9.14062 12.0918 9.43359L11.418 10.1074C11.1543 10.3711 10.7148 10.3711 10.4219 10.1074L6.4375 6.12305C6.17383 5.83008 6.17383 5.39062 6.4375 5.12695ZM0.8125 6.12305C0.548828 5.83008 0.548828 5.39063 0.8125 5.12695L4.79687 1.14258C5.06055 0.849609 5.5293 0.849609 5.79297 1.14258L6.4668 1.78711C6.73047 2.08008 6.73047 2.51953 6.4668 2.7832L3.625 5.625L6.4668 8.4375C6.73047 8.70117 6.73047 9.16992 6.4668 9.43359L5.79297 10.1074C5.5293 10.3711 5.08984 10.3711 4.79688 10.1074L0.8125 6.12305Z" fill="#000"></path>
        </svg>
        
    </button>
    <?php endif; ?>
    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <div class="pagination-button"><?php echo e($element); ?></div>
        <?php endif; ?>

        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <div class="pagination-button active">
                        <?php echo e($page); ?>

                    </div>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>">
                        <div class="pagination-button"><?php echo e($page); ?></div>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($paginator->hasMorePages()): ?>
        <button class="pagination-button" title="Next page">
          <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5625 5.87305L2.57812 9.85742C2.28516 10.1504 1.8457 10.1504 1.58203 9.85742L0.908203 9.21289C0.644531 8.91992 0.644531 8.48047 0.908203 8.2168L3.75 5.4043L0.908203 2.5625C0.644531 2.29883 0.644531 1.85938 0.908203 1.56641L1.58203 0.892578C1.8457 0.628906 2.28516 0.628906 2.57812 0.892578L6.5625 4.87695C6.82617 5.16992 6.82617 5.60938 6.5625 5.87305ZM12.1875 4.87695C12.4512 5.16992 12.4512 5.60938 12.1875 5.87305L8.20312 9.85742C7.93945 10.1504 7.4707 10.1504 7.20703 9.85742L6.5332 9.21289C6.26953 8.91992 6.26953 8.48047 6.5332 8.2168L9.375 5.375L6.5332 2.5625C6.26953 2.29883 6.26953 1.83008 6.5332 1.56641L7.20703 0.892578C7.4707 0.628906 7.91016 0.628906 8.20312 0.892578L12.1875 4.87695Z" fill="#000"></path>
            </svg>
            
        </button>
        <?php endif; ?>
  </div>
</div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/pagination/default.blade.php ENDPATH**/ ?>