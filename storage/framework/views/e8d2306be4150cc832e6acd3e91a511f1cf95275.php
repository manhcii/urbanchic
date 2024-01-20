<?php if($component): ?>
    <?php
        $title = $component->json_params->title->{$locale} ?? $component->title;
        $brief = $component->json_params->brief->{$locale} ?? $component->brief;
        $image = $component->image != '' ? $component->image : null;
        // Filter all blocks by parent_id
        $component_childs = $all_components->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->id;
        });
    ?>
    <div class="header-button-wrapper">
        <?php if(isset($user_auth)): ?>
        <a href="<?php echo e(route('frontend.logout')); ?>" title="Logout">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15.2582 12.8672H14.0225C13.9381 12.8672 13.859 12.9041 13.8063 12.9692C13.6832 13.1186 13.5514 13.2627 13.4125 13.3998C12.8445 13.9684 12.1718 14.4214 11.4314 14.734C10.6644 15.058 9.84004 15.2242 9.00742 15.2227C8.16543 15.2227 7.34981 15.0575 6.5834 14.734C5.84306 14.4214 5.17031 13.9684 4.60234 13.3998C4.03337 12.8332 3.57968 12.1616 3.26641 11.4223C2.94121 10.6559 2.77773 9.84202 2.77773 9.00003C2.77773 8.15804 2.94297 7.34417 3.26641 6.57776C3.5793 5.83772 4.0293 5.17151 4.60234 4.60022C5.17539 4.02893 5.8416 3.57893 6.5834 3.26604C7.34981 2.9426 8.16543 2.77737 9.00742 2.77737C9.84941 2.77737 10.665 2.94085 11.4314 3.26604C12.1732 3.57893 12.8395 4.02893 13.4125 4.60022C13.5514 4.73909 13.6814 4.88323 13.8063 5.03089C13.859 5.09593 13.9398 5.13284 14.0225 5.13284H15.2582C15.3689 5.13284 15.4375 5.00979 15.376 4.91663C14.0277 2.82132 11.6688 1.4344 8.98809 1.44143C4.77637 1.45198 1.39961 4.87093 1.4418 9.07737C1.48398 13.217 4.85547 16.5586 9.00742 16.5586C11.6811 16.5586 14.0295 15.1735 15.376 13.0834C15.4357 12.9903 15.3689 12.8672 15.2582 12.8672ZM16.8209 8.88929L14.3266 6.92054C14.2334 6.84671 14.098 6.9135 14.098 7.03128V8.36722H8.57852C8.50117 8.36722 8.43789 8.4305 8.43789 8.50784V9.49222C8.43789 9.56956 8.50117 9.63284 8.57852 9.63284H14.098V10.9688C14.098 11.0866 14.2352 11.1533 14.3266 11.0795L16.8209 9.11077C16.8377 9.09762 16.8513 9.08081 16.8606 9.06162C16.87 9.04243 16.8749 9.02137 16.8749 9.00003C16.8749 8.97868 16.87 8.95762 16.8606 8.93843C16.8513 8.91925 16.8377 8.90244 16.8209 8.88929Z"
                    fill="#000" />
            </svg>
        </a>
        <?php else: ?>
            <a href="javascript:void(0)" class="user-button" title="User">
                <img src="<?php echo e(asset('themes/frontend/assets/images/icon/user-black.svg')); ?>" alt="User" />
            </a>
        <?php endif; ?>
        <button type="button" class="wishlist-button">
            <a href="<?php echo e(route('frontend.wishlist')); ?>">
                <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-black.svg')); ?>" alt="Wishlist" />
            </a>
        </button>
        <button type="button" class="cart-button">
            <a href="<?php echo e(route('frontend.order.cart')); ?>">
                <img src="<?php echo e(asset('themes/frontend/assets/images/icon/cart-black.svg')); ?>" alt="Cart" />
                <span class="quantity"><?php echo e(count((array) session('cart') ?? 0)); ?></span>
            </a>
        </button>
        <div class="show-menu-mobile d-block d-xl-none d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#menumobile" aria-controls="menumobile">
            <svg height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                <g id="_31" data-name="31">
                    <path d="m15.5 4h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
                    <path d="m15.5 9h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
                    <path d="m15.5 14h-15a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1z" />
                </g>
            </svg>
        </div>

        <?php if(isset($component_childs)): ?>
            <?php $__currentLoopData = $component_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($val_menu1->json_params->url_link); ?>" class="contact-button"
                    title="<?php echo e($val_menu1->json_params->title->$locale ?? $val_menu1->title); ?>">
                    <?php echo e($val_menu1->json_params->title->$locale ?? $val_menu1->title); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/header_default/header/layout/cart.blade.php ENDPATH**/ ?>