<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section id="fhm-contact" class="contact">
        <div class="container">
            <div class="heading-block-m">
                <h2 class="title"><?php echo e($title); ?></h2>
            </div>
            <div class="contact-wrapper">
                <form action="<?php echo e(route('frontend.contact.store')); ?>" method="post"
                class="main-form form_ajax">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="is_type" value="contact">
                    <div class="row">
                        <div class="col main-form-left">
                            <div class="main-form-wrapper">
                                <input type="text" name="name" required class="form-control main-form-control" id="first-name"
                                    placeholder="First Name*" />
                                <div class="clear-input position-absolute d-none">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col main-form-right">
                            <div class="main-form-wrapper">
                                <input type="text" name="json_params[last_name]" required class="form-control main-form-control" id="last-name"
                                    placeholder="Last Name*" />
                                <div class="clear-input position-absolute d-none">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-form-wrapper">
                        <input type="email" class="form-control main-form-control" id="email" name="email" required
                            placeholder="Email*" />
                        <div class="clear-input position-absolute d-none">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                    fill="#C8C8C8"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="main-form-wrapper">
                        <input type="text" class="form-control main-form-control" id="address" name="json_params[address]"
                            placeholder="Address" />
                        <div class="clear-input position-absolute d-none">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                    fill="#C8C8C8"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col main-form-left">
                            <div class="main-form-wrapper">
                                <input type="text" class="form-control main-form-control" id="first-name-checkout" name="phone" required
                                    placeholder="Phone*" />
                                <div class="clear-input position-absolute d-none">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col main-form-right">
                            <div class="main-form-wrapper">
                                <input type="text" class="form-control main-form-control" id="last-name-checkout" name="json_params[postal_code]" required
                                    placeholder="Postal Code*" />
                                <div class="clear-input position-absolute d-none">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control main-form-control" name="content" rows="4" placeholder="Message"></textarea>
                    <button type="submit" class="main-form-btn contact-form-submit">
                        <?php echo app('translator')->get('Submit Now'); ?>
                    </button>
                </form>
                <div class="contact-image">
                    <img src="<?php echo e($image); ?>" alt="Pizza" title="Pizza" />
                    <?php if(count($gallery_image) > 0): ?>
                        <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="decor-element">
                                <img src="<?php echo e($val_img); ?>" alt="Pizza" title="Pizza" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/contact/styles/form.blade.php ENDPATH**/ ?>