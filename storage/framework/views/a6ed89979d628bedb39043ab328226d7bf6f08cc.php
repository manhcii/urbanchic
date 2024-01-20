

<div id="fhm-login" class="fhm-login">
    <div class="login-modal">
        <div class="heading-block">
            <h2 class="title"><?php echo app('translator')->get('Login'); ?></h2>
        </div>
        <form id="login_form" method="post" class="login" action="<?php echo e(route('frontend.login.post')); ?>">
            <?php echo csrf_field(); ?>
            <?php
                $referer = request()->headers->get('referer');
                $current = url()->full();
            ?>
            <div class="login-input">
                <input type="text" name="email" required placeholder="Email" class="login-email" />
                <div class="input-wrapper">
                    <input type="password" name="password" required placeholder="Password" class="login-password" />
                    <div class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/eye.svg')); ?>" alt="Hidden/Show" />
                    </div>
                </div>
            </div>

            <a href="<?php echo e(route('frontend.password.forgot.get')); ?>" title="Forgot your password?"
                class="forgot-password"><?php echo app('translator')->get('Forgot your password?'); ?></a>
            <button type="submit" class="button-solid"><?php echo app('translator')->get('Login'); ?></button>
            <div class="col-12 form-group login_result d-none mt-3">
                <div class="alert alert-warning" role="alert">
                    <?php echo app('translator')->get('Processing...'); ?>
                </div>
            </div>
            <div class="login-separate-line">
                <div class="line"></div>
                <span class="text"><?php echo app('translator')->get('or'); ?></span>
                <div class="line"></div>
            </div>
            <ul class="login-social">
                <li class="login-social-item">
                    <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')"
                        title="<?php echo app('translator')->get('Sign in with Facebook'); ?>"><span class="icon">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/fb (2).svg')); ?>" alt="Facebook" />
                        </span><?php echo app('translator')->get('Sign in with Facebook'); ?></a>
                </li>
                <li class="login-social-item">
                    <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')"
                        title="<?php echo app('translator')->get('Sign in with Google'); ?>"><span class="icon">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/google.svg')); ?>" alt="Google" />
                        </span><?php echo app('translator')->get('Sign in with Google'); ?></a>
                </li>
                <li class="login-social-item">
                    <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')"
                        title="<?php echo app('translator')->get('Sign in with Apple'); ?>"><span class="icon">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/apple.svg')); ?>" alt="Apple" />
                        </span><?php echo app('translator')->get('Sign in with Apple'); ?></a>
                </li>
            </ul>
            <div class="login-signup">
                <p class="text"><?php echo app('translator')->get('Do not have an account?'); ?></p>
                <a href="javascript:void(0)" title="Register an account"
                    class="btn-register link"><?php echo app('translator')->get('Register an account'); ?></a>
            </div>
        </form>
        <button class="login-modal-close-button">
            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/xmark.svg')); ?>" alt="Close" />
        </button>
    </div>
</div>

<div id="fhm-login" class="fhm-register">
    <div class="login-modal">
        <div class="heading-block">
            <h2 class="title"><?php echo app('translator')->get('Register'); ?></h2>
        </div>
        <form id="signup_form" method="post" class="login" action="<?php echo e(route('frontend.register')); ?>">
            <?php echo csrf_field(); ?>
            <?php
                $referer = request()->headers->get('referer');
                $current = url()->full();
            ?>
            <div class="login-input">
                <input type="text" name="email" required placeholder="Email" class="login-email" />
                <input type="text" name="name" required placeholder="Name" class="login-email" />
                <div class="input-wrapper">
                    <input type="password" name="password" required placeholder="Password" class="login-password" />
                    <div class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/eye.svg')); ?>" alt="Hidden/Show" />
                    </div>
                </div>
            </div>

            <button type="submit" class="button-solid"><?php echo app('translator')->get('Register'); ?></button>
            <div class="col-12 form-group signup_result d-none mt-3">
                <div class="alert alert-warning" role="alert">
                    <?php echo app('translator')->get('Processing...'); ?>
                </div>
            </div>
            <div class="login-separate-line">
                <div class="line"></div>
                <span class="text"><?php echo app('translator')->get('or'); ?></span>
                <div class="line"></div>
            </div>
            <ul class="login-social">
                <li class="login-social-item">
                    <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')"
                        title="<?php echo app('translator')->get('Sign in with Facebook'); ?>"><span class="icon">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/fb (2).svg')); ?>" alt="Facebook" />
                        </span><?php echo app('translator')->get('Sign in with Facebook'); ?></a>
                </li>
                <li class="login-social-item">
                    <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')"
                        title="<?php echo app('translator')->get('Sign in with Google'); ?>"><span class="icon">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/google.svg')); ?>" alt="Google" />
                        </span><?php echo app('translator')->get('Sign in with Google'); ?></a>
                </li>
                <li class="login-social-item">
                    <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')"
                        title="<?php echo app('translator')->get('Sign in with Apple'); ?>"><span class="icon">
                            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/apple.svg')); ?>" alt="Apple" />
                        </span><?php echo app('translator')->get('Sign in with Apple'); ?></a>
                </li>
            </ul>
            <div class="login-signup">
                <p class="text"><?php echo app('translator')->get('you already have account ?'); ?></p>
                <a href="javascript:void(0)" title="Login now" class="btn-login link"><?php echo app('translator')->get('Login now'); ?></a>
            </div>
        </form>
        <button class="login-modal-close-button">
            <img src="<?php echo e(asset('themes/frontend/assets/images/icon/xmark.svg')); ?>" alt="Close" />
        </button>
    </div>
</div>

<section class="modal fade quickview detail" id="fhm-quickview-popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="detail-container d-flex">
                <div class="detail-image">
                    <div class="detail-image-wishlist">
                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.44622 14.6431C6.09997 12.9717 3.90282 11.1512 2.10979 8.89124C1.33294 7.91037 0.669871 6.8628 0.344222 5.63083C-0.342388 3.0531 1.32117 0.459675 3.9656 0.08302C5.77825 -0.17593 7.23386 0.506757 8.30105 1.99768C8.35205 2.0683 8.39521 2.13893 8.45799 2.23701C8.50115 2.17424 8.53646 2.12323 8.56785 2.07615C9.56441 0.526374 11.3339 -0.195547 12.9818 0.0869437C14.8611 0.412593 16.2383 1.73088 16.6306 3.53176C16.8699 4.64211 16.6581 5.6936 16.1873 6.70586C15.6576 7.8476 14.9082 8.84024 14.0764 9.77403C12.4364 11.6063 10.561 13.1718 8.55215 14.5803C8.52076 14.596 8.4933 14.6117 8.44622 14.6431ZM7.88124 4.45378C7.86554 4.31254 7.85377 4.19483 7.83808 4.08105C7.58305 1.71519 4.87585 0.43221 2.86702 1.72696C1.53696 2.58228 1.03868 4.18699 1.61543 5.75638C1.98424 6.76079 2.58846 7.62788 3.26329 8.44397C4.45996 9.89565 5.84887 11.1512 7.31625 12.3204C7.69291 12.6186 8.07741 12.9089 8.45799 13.2032C10.3373 11.7985 12.1029 10.3037 13.5978 8.51067C14.2216 7.76128 14.7826 6.96874 15.175 6.07026C15.4732 5.38757 15.6262 4.68527 15.5085 3.93588C15.2692 2.40965 13.9783 1.28361 12.3815 1.20906C10.9259 1.14236 9.5291 2.18601 9.16422 3.62593C9.09752 3.89272 9.06613 4.17129 9.01905 4.45378C8.64239 4.45378 8.26574 4.45378 7.88124 4.45378Z"
                                fill="#616161" />
                        </svg>
                    </div>
                    <div class="gallery gallery-detail">
                        <ul class="gallery-thumbnail">

                        </ul>
                        <div class="gallery-view"></div>
                    </div>
                </div>
                <div class="detail-right item_product">
                    <div class="detail-info product">
                        <div class="detail-info-heading product-info">
                            <div class="product-type"></div>
                            <h2 class="product-name">

                            </h2>
                        </div>

                        <div class="detail-info-price product-info">
                            <div class="product-price">
                                <span class="current"></span>
                                <span class="old"></span>
                            </div>
                        </div>
                    </div>
                    <div class="detail-variant">
                        <ul class="detail-variant-list variant-size-list d-flex">

                        </ul>
                    </div>
                    <div class="detail-cart cart-product">
                        <h6><?php echo app('translator')->get('Quantity'); ?></h6>
                        <div class="cart-quantity detail-cart-quantity">
                            <div class="cart-quantity-form detail-cart-quantity-form">
                                <input type="button" value="-" class="qtyminus minus" field="quantity" />
                                <input type="text" name="quantity" value="1" class="qty" />
                                <input type="button" value="+" class="qtyplus plus" field="quantity" />
                            </div>
                        </div>
                    </div>
                    <button class="button-solid detail-submit add-to-cart" data-id="">
                        <?php echo app('translator')->get('Add to Cart'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/components/sticky/contact.blade.php ENDPATH**/ ?>