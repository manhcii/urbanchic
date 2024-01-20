<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $icon = $block->icon ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>
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
                                <li class="gallery-thumbnail-item active" data-color="white">
                                    <div class="gallery-thumbnail-img">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/gifts/7.png')); ?>" alt="Wine" title="Wine" />
                                    </div>
                                </li>
                                <li class="gallery-thumbnail-item">
                                    <div class="gallery-thumbnail-img">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/gifts/8.png')); ?>" alt="Wine" title="Wine" />
                                    </div>
                                </li>
                                <li class="gallery-thumbnail-item" data-color="black">
                                    <div class="gallery-thumbnail-img">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/gifts/9.png')); ?>" alt="Wine" title="Wine" />
                                    </div>
                                </li>
                                <li class="gallery-thumbnail-item">
                                    <div class="gallery-thumbnail-img">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/gifts/7.png')); ?>" alt="Wine" title="Wine" />
                                    </div>
                                </li>
                                <li class="gallery-thumbnail-item" data-color="gray">
                                    <div class="gallery-thumbnail-img">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/gifts/8.png')); ?>" alt="Wine" title="Wine" />
                                    </div>
                                </li>

                            </ul>
                            <div class="gallery-view"></div>
                        </div>
                    </div>
                    <div class="detail-right">
                        <div class="detail-info product">
                            <div class="detail-info-heading product-info">
                                <div class="product-type">Pesasol</div>
                                <h2 class="product-name">Acacia Vineyards</h2>
                            </div>
                            <div class="detail-info-rating d-flex justify-content-between">
                                <div class="detail-info-rating-item d-flex align-items-center">
                                    <div class="icon">
                                        <svg width="105" height="17" viewBox="0 0 105 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.13757 1.84166L10.7667 5.38333C10.8376 5.59583 11.0501 5.73749 11.2626 5.80833L14.9459 6.37499C15.5834 6.37499 15.7959 7.08333 15.3709 7.50833L12.6792 10.2708C12.5376 10.4125 12.4667 10.6958 12.4667 10.9083L13.1042 14.7333C13.1751 15.3 12.6084 15.7958 12.1126 15.5125L8.7834 13.6708C8.5709 13.5292 8.3584 13.5292 8.1459 13.6708L4.81674 15.5125C4.3209 15.7958 3.6834 15.3708 3.82507 14.7333L4.46257 10.9083C4.5334 10.6958 4.39174 10.4125 4.25007 10.2708L1.5584 7.50833C1.20424 7.08333 1.41674 6.37499 1.9834 6.30416L5.66674 5.73749C5.87924 5.73749 6.09174 5.52499 6.16257 5.31249L7.79174 1.77083C8.1459 1.27499 8.85423 1.27499 9.13757 1.84166Z"
                                                fill="#5E090A" />
                                            <path
                                                d="M31.1376 1.84166L32.7667 5.38333C32.8376 5.59583 33.0501 5.73749 33.2626 5.80833L36.9459 6.37499C37.5834 6.37499 37.7959 7.08333 37.3709 7.50833L34.6792 10.2708C34.5376 10.4125 34.4667 10.6958 34.4667 10.9083L35.1042 14.7333C35.1751 15.3 34.6084 15.7958 34.1126 15.5125L30.7834 13.6708C30.5709 13.5292 30.3584 13.5292 30.1459 13.6708L26.8167 15.5125C26.3209 15.7958 25.6834 15.3708 25.8251 14.7333L26.4626 10.9083C26.5334 10.6958 26.3917 10.4125 26.2501 10.2708L23.5584 7.50833C23.2042 7.08333 23.4167 6.37499 23.9834 6.30416L27.6667 5.73749C27.8792 5.73749 28.0917 5.52499 28.1626 5.31249L29.7917 1.77083C30.1459 1.27499 30.8542 1.27499 31.1376 1.84166Z"
                                                fill="#5E090A" />
                                            <path
                                                d="M53.1376 1.84166L54.7667 5.38333C54.8376 5.59583 55.0501 5.73749 55.2626 5.80833L58.9459 6.37499C59.5834 6.37499 59.7959 7.08333 59.3709 7.50833L56.6792 10.2708C56.5376 10.4125 56.4667 10.6958 56.4667 10.9083L57.1042 14.7333C57.1751 15.3 56.6084 15.7958 56.1126 15.5125L52.7834 13.6708C52.5709 13.5292 52.3584 13.5292 52.1459 13.6708L48.8167 15.5125C48.3209 15.7958 47.6834 15.3708 47.8251 14.7333L48.4626 10.9083C48.5334 10.6958 48.3917 10.4125 48.2501 10.2708L45.5584 7.50833C45.2042 7.08333 45.4167 6.37499 45.9834 6.30416L49.6667 5.73749C49.8792 5.73749 50.0917 5.52499 50.1626 5.31249L51.7917 1.77083C52.1459 1.27499 52.8542 1.27499 53.1376 1.84166Z"
                                                fill="#5E090A" />
                                            <path
                                                d="M75.1376 1.84166L76.7667 5.38333C76.8376 5.59583 77.0501 5.73749 77.2626 5.80833L80.9459 6.37499C81.5834 6.37499 81.7959 7.08333 81.3709 7.50833L78.6792 10.2708C78.5376 10.4125 78.4667 10.6958 78.4667 10.9083L79.1042 14.7333C79.1751 15.3 78.6084 15.7958 78.1126 15.5125L74.7834 13.6708C74.5709 13.5292 74.3584 13.5292 74.1459 13.6708L70.8167 15.5125C70.3209 15.7958 69.6834 15.3708 69.8251 14.7333L70.4626 10.9083C70.5334 10.6958 70.3917 10.4125 70.2501 10.2708L67.5584 7.50833C67.2042 7.08333 67.4167 6.37499 67.9834 6.30416L71.6667 5.73749C71.8792 5.73749 72.0917 5.52499 72.1626 5.31249L73.7917 1.77083C74.1459 1.27499 74.8542 1.27499 75.1376 1.84166Z"
                                                fill="#5E090A" />
                                            <path
                                                d="M97.1376 1.84166L98.7667 5.38333C98.8376 5.59583 99.0501 5.73749 99.2626 5.80833L102.946 6.37499C103.583 6.37499 103.796 7.08333 103.371 7.50833L100.679 10.2708C100.538 10.4125 100.467 10.6958 100.467 10.9083L101.104 14.7333C101.175 15.3 100.608 15.7958 100.113 15.5125L96.7834 13.6708C96.5709 13.5292 96.3584 13.5292 96.1459 13.6708L92.8167 15.5125C92.3209 15.7958 91.6834 15.3708 91.8251 14.7333L92.4626 10.9083C92.5334 10.6958 92.3917 10.4125 92.2501 10.2708L89.5584 7.50833C89.2042 7.08333 89.4167 6.37499 89.9834 6.30416L93.6667 5.73749C93.8792 5.73749 94.0917 5.52499 94.1626 5.31249L95.7917 1.77083C96.1459 1.27499 96.8542 1.27499 97.1376 1.84166Z"
                                                fill="#5E090A" />
                                        </svg>
                                    </div>
                                    <p class="text">219 Reviews</p>
                                    <p class="detail-info-rating-id">Item # 2287512496</p>
                                </div>
                                <a href="#" title="share" class="detail-info-share">
                                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.0002 3.31987C13.9593 3.50669 13.9303 3.69727 13.8756 3.88002C13.3137 5.75543 10.9412 6.37129 9.53274 5.00564C9.43175 4.90769 9.36914 4.91239 9.25966 4.98029C7.90779 5.81833 6.5531 6.65167 5.19903 7.48627C5.16379 7.50786 5.13013 7.53164 5.08797 7.5595C5.32361 8.18943 5.3233 8.81968 5.08671 9.45275C5.65772 9.8048 6.22087 10.1522 6.78433 10.4992C7.61898 11.0137 8.45489 11.5262 9.28734 12.0442C9.37764 12.1002 9.42734 12.102 9.5104 12.0241C10.2739 11.3066 11.1722 11.0731 12.1704 11.3973C13.1677 11.7212 13.7532 12.4378 13.9593 13.4608C13.9747 13.5365 13.9869 13.6129 14.0005 13.6892V14.0641C13.9901 14.1086 13.9766 14.1527 13.9699 14.1978C13.8233 15.2007 13.2781 15.9045 12.3478 16.3057C12.1361 16.3971 11.9017 16.4368 11.6777 16.5H11.0498C10.7959 16.4252 10.5304 16.3773 10.2906 16.2716C9.0517 15.7252 8.44388 14.3646 8.85633 13.0809C8.89377 12.9648 8.87395 12.911 8.7695 12.8471C7.41732 12.0191 6.06829 11.1861 4.71799 10.3543C4.67426 10.3274 4.62896 10.303 4.57799 10.2736C4.30555 10.5511 4.00038 10.7733 3.64361 10.9217C2.06051 11.5791 0.275748 10.5734 0.0284668 8.88289C-0.212207 7.23686 1.13274 5.77765 2.79701 5.88812C3.44604 5.93099 4.0095 6.18321 4.4748 6.63853C4.54811 6.71019 4.59372 6.7346 4.69503 6.6717C6.05539 5.82709 7.41889 4.9878 8.7846 4.15133C8.88087 4.09219 8.89157 4.04337 8.85885 3.94042C8.34541 2.33506 9.39997 0.718448 11.0882 0.516919C12.4727 0.351377 13.8249 1.42192 13.9687 2.79633C13.974 2.8464 13.9895 2.89553 14.0002 2.94497V3.31987ZM0.966939 8.50237C0.965995 9.42051 1.70564 10.1609 2.62523 10.1622C3.54325 10.1634 4.29516 9.42396 4.30083 8.51394C4.3068 7.5983 3.55238 6.84601 2.62869 6.84663C1.70721 6.84726 0.967568 7.58422 0.966624 8.50237H0.966939ZM9.69413 3.12084C9.69161 4.03555 10.4341 4.78377 11.3486 4.78815C12.267 4.79285 13.0283 4.03836 13.0277 3.1246C13.0268 2.21208 12.2805 1.47231 11.36 1.47105C10.435 1.47012 9.69665 2.20113 9.69413 3.12053V3.12084ZM11.3464 15.5377C12.2686 15.5421 13.0202 14.8086 13.0277 13.8973C13.0353 12.982 12.2815 12.2235 11.3622 12.2206C10.447 12.2178 9.69728 12.9614 9.69413 13.8745C9.6913 14.7955 10.424 15.5334 11.3464 15.5377Z"
                                            fill="black" />
                                    </svg>
                                    Share
                                </a>
                            </div>
                            <div class="detail-info-price product-info">
                                <div class="product-price">
                                    <span class="current">$219.09</span>
                                    <span class="old">$242.86</span>
                                </div>
                            </div>
                        </div>
                        <div class="detail-variant">
                            <h6 class="detail-variant-current-selected">
                                Color: <span>White</span>
                            </h6>
                            <ul class="detail-variant-list variant-size-list d-flex">
                                <li class="detail-variant-item">
                                    <label>
                                        <input type="radio" name="color" value="black" />
                                        Black
                                    </label>
                                </li>
                                <li class="detail-variant-item">
                                    <label>
                                        <input type="radio" name="color" value="white" checked />
                                        White
                                    </label>
                                </li>
                                <li class="detail-variant-item">
                                    <label>
                                        <input type="radio" name="color" value="gray" />
                                        Gray
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="detail-cart cart-product">
                            <h6>Quantity</h6>
                            <div class="cart-quantity detail-cart-quantity">
                                <div class="cart-quantity-form detail-cart-quantity-form">
                                    <input type="button" value="-" class="qtyminus minus" field="quantity" />
                                    <input type="text" name="quantity" value="0" class="qty" />
                                    <input type="button" value="+" class="qtyplus plus" field="quantity" />
                                </div>
                            </div>
                        </div>
                        <button class="button-solid detail-submit" data-bs-toggle="offcanvas"
                            data-bs-target="#cart-popup" aria-controls="cart-popup">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/popup/styles/quickview.blade.php ENDPATH**/ ?>