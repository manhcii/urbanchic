<!-- Dependency Scripts -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="<?php echo e(asset('themes/frontend/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="https://kit.fontawesome.com/f3d36c20ea.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('themes/frontend/assets/swiper/swiper.js')); ?>"></script>

<!-- JS -->
<script src="<?php echo e(asset('themes/frontend/assets/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/index.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/assets/js/sweetalert2.all.min.js')); ?>"></script>

<script>
    (function($) {
        $('.products-filter-toggle-button').click(function(){
            $('.products-filter-list').addClass('active');
        })
        $('.products-filter-toggle-button-close').click(function(){
            $('.products-filter-list').removeClass('active');
        })


        $('.share-facebook').click(function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + (
                    $(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 -
                    225) +
                ', toolbar=0, location=0, menubar=0,         directories=0, scrollbars=0');
            return false;
        });

        $('#languages').on('change', function() {
            var lang = $(this).val();
            window.location.href = "/language/" + lang;
        })

        $('.quickview-button').on('click', function(e) {
            e.preventDefault();
            var btn_quickview = $(this);
            var id = btn_quickview.attr('data-id');
            var url = "<?php echo e(route('frontend.quickview')); ?>";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": id
                },
                dataType: 'JSON',
                success: function(response) {
                    var detail = response.data.detail;
                    var _html_gallery = '';
                    var _html_color = '';
                    if (typeof(detail) != "undefined" && detail !== null) {
                        $('.quickview .add-to-cart')
                            .attr('data-id', detail.id);
                        $('.quickview .product-name').html(detail
                            .name);
                        $('.quickview .product-type').html(detail
                            .txt_tag);
                        $('.quickview .qty').val(1);
                        $('.quickview .gallery-view').html('<img src="' + detail.image +
                            '" alt="Image">');
                        $('.quickview .detail-info-rating-id').html('Item # ' +
                            detail
                            .id);
                        if (detail.price_old != null) {
                            $('.quickview .product-price .old').html(detail
                                .currency_unit + ' ' + detail.price_old);
                        }
                        $('.quickview .product-price .current').html(detail
                            .currency_unit + ' ' + detail.price);
                    }
                    if (typeof(detail.color) != "undefined" && detail.color !== null) {
                        $.each(detail.color, function() {
                            _html_color += `
                            <li class="detail-variant-item">
                                <label>
                                    <input type="radio" name="color" value="` + this.propety_value + `" />
                                    ` + this.name + `
                                </label>
                            </li>`;
                        });
                        $('.item_product .variant-size-list').html(_html_color);
                        $('.detail-variant-item').each(function() {
                            $(this).click(function() {
                                var data_color = $(this).find('input').val();
                                $('.gallery-thumbnail-item').each(function() {
                                    if ($(this).attr('data-color') ==
                                        data_color) {
                                        var link = $(this).find(
                                            'img').attr(
                                            'src');
                                        $('.gallery-detail .gallery-view')
                                            .find('img')
                                            .attr('src', link);
                                        $('.gallery-thumbnail-item')
                                            .removeClass(
                                                'active');
                                        $(this).addClass(
                                            'active');
                                    }
                                })
                            })
                        })
                    }

                    if (typeof(detail.gallery_image) != "undefined" && detail.gallery_image !==
                        null) {
                        $.each(detail.gallery_image, function() {
                            _html_gallery += `
                            <li class="gallery-thumbnail-item" data-color="` + (this.color ?? null) + `">
                                <div class="gallery-thumbnail-img">
                                    <img src="` + this.img + `"
                                        alt="Image" title="Image" />
                                </div>
                            </li>`;
                        });
                        $('.quickview .gallery-detail .gallery-thumbnail').html(_html_gallery);
                        $('.gallery-thumbnail-item').each(function() {
                            $(this).click(function() {
                                var link = $(this).find('img').attr('src');
                                $('.gallery-detail .gallery-view').find('img')
                                    .attr('src', link);
                                $('.gallery-thumbnail-item').removeClass(
                                    'active');
                                $(this).addClass('active');
                            })
                        })

                    }
                    setTimeout(function() {
                        btn_quickview.removeClass('loading');
                        $('#fhm-quickview-popup').modal('show');
                    }, 1000);
                },
                error: function(response) {
                    // Get errors
                    var errors = response.responseJSON.message;
                    alert(errors);
                }
            });
        });

        // Wishlist button
        $('.add_wishlist').on('click', function(e) {
            e.preventDefault();
            var btn_wishlist = $(this);
            var id = btn_wishlist.attr('data-id');

            $.ajax({
                url: '<?php echo e(route('frontend.wishlist.check')); ?>',
                method: "POST",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: id,
                    lang: '<?php echo e($locale ?? 'vi'); ?>',
                },
                dataType: 'JSON',
                success: function(response) {
                    location.reload();
                },
                error: function(response) {
                    // Get errors
                    var errors = response.responseJSON.message;
                    alert(errors);
                    location.reload();
                }
            });
        })

        $(document).on('click', '.delete_wishlist', function(e) {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '<?php echo e(route('frontend.wishlist.delete')); ?>',
                method: "POST",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: id,
                },
                dataType: 'JSON',
                success: function(response) {
                    if (response.data != "") {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: response.message,
                            animation: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                        $('.wishlist-' + response.data).remove();
                    }
                },
            });


        })

        $('.load_more').click(function() {
            if ($('.show_content').hasClass('show') == true) {
                $('.show_content').removeClass('show');
                $(this).find('span').html("<?php echo app('translator')->get('Show More'); ?>");
            } else {
                $('.show_content').addClass('show');
                $(this).find('span').html("<?php echo app('translator')->get('Hide'); ?>")
            }
        });

        $('.qty_change').click(function() {
            $(this).parents('tr').find('.qty').trigger('change');
        })

        $("#login_form").submit(function(e) {
            $(".login_result .alert").text("<?php echo app('translator')->get('Processing...'); ?>");
            $(".login_result").removeClass('d-none');
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    form[0].reset();
                    if (response.message === 'success') {
                        if (response.data.url != '') {
                            window.location.href = response.data.url;
                        } else {
                            location.reload();
                        }
                    } else {
                        $("login_result .alert").html(response.message);
                    }

                },
                error: function(response) {
                    // Get errors
                    console.log(response);
                    var errors = response.responseJSON.message;
                    console.log(errors);
                    if (errors === 'CSRF token mismatch.') {
                        $(".login_result .alert").html("<?php echo app('translator')->get('CSRF token mismatch.'); ?>");
                    } else if (errors === 'The given data was invalid.') {
                        $(".login_result .alert").html("<?php echo app('translator')->get('The given data was invalid.'); ?>");
                    } else {
                        $(".login_result .alert").html(errors);
                    }
                }
            });
        });
        //Signup
        $("#signup_form").submit(function(e) {
            $(".signup_result .alert").text("<?php echo app('translator')->get('Processing...'); ?>");
            $(".signup_result").removeClass('d-none');

            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    form[0].reset();
                    location.reload();
                },
                error: function(response) {
                    console.log(response);
                    // Get errors
                    if (typeof response.responseJSON.errors !== 'undefined') {
                        var errors = response.responseJSON.errors;
                        // Foreach and show errors to html
                        var elementErrors = '';
                        $.each(errors, function(index, item) {
                            if (item === 'CSRF token mismatch.') {
                                item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
                            }
                            elementErrors += '<p>' + item + '</p>';
                        });
                        $(".signup_result .alert").html(elementErrors);
                    } else {
                        var errors = response.responseJSON.message;
                        if (errors === 'CSRF token mismatch.') {
                            $(".signup_result .alert").html("<?php echo app('translator')->get('CSRF token mismatch.'); ?>");
                        } else if (errors === 'The given data was invalid.') {
                            $(".signup_result .alert").html("<?php echo app('translator')->get('The given data was invalid.'); ?>");
                        } else {
                            $(".signup_result .alert").html(errors);
                        }
                    }
                }
            });
        });
        // Form ajax default
        $(".form_ajax").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    form[0].reset();
                    alert(response.message);
                    location.reload();
                },
                error: function(response) {
                    // Get errors

                    var errors = response.responseJSON.errors;
                    // Foreach and show errors to html
                    var elementErrors = '';
                    $.each(errors, function(index, item) {
                        if (item === 'CSRF token mismatch.') {
                            item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
                        }
                        elementErrors += '<p>' + item + '</p>';
                    });
                }
            });
        });

        $(document).on('click', '.add-to-cart', function() {
            let _root2 = $(this).find('.button');
            let _root = $(this);
            let _html = _root.html();
            let _id = _root.attr("data-id");
            let _quantity = _root.parents('.item_product').find(".qty").val() ?? $("#quantity").val();
            // _root2.addClass('loading');

            if (_id > 0) {
                var url = "<?php echo e(route('frontend.order.add_to_cart')); ?>";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "id": _id,
                        "quantity": _quantity,

                    },
                    success: function(data) {
                        _root.html(_html);
                        location.reload();
                    },
                    error: function(data) {
                        // Get errors
                        var errors = data.responseJSON.message;
                        alert(errors);
                        location.reload();
                    }
                });
            }
        });

        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '<?php echo e(route('frontend.order.cart.update')); ?>',
                method: "PATCH",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: ele.parents("tr").attr("data-id"),
                    key: ele.parents("tr").attr("data-arr"),
                    quantity: ele.parents("tr").find(".qty").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $('.remove-card').on('click', function(e) {
            e.preventDefault();
            if (confirm("<?php echo e(__('Are you sure want to remove?')); ?>")) {
                var id = $(this).attr('data-id');
                var key = $(this).attr('data-arr');
                // var mini_cart = $(this).closest('.mini-cart');
                // var _this=$(this);
                $.ajax({
                    url: '<?php echo e(route('frontend.order.cart.remove')); ?>',
                    method: "DELETE",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        id: id,
                        key: key,
                    },
                    success: function(response) {
                        location.reload();
                        // _this.closest('li').remove();
                        // mini_cart.find('.cart-count').text(mini_cart.find('.cart-list-wrap .cart-list li').length);
                        // if (!mini_cart.find('.cart-list-wrap .cart-list li').length) {
                        //     mini_cart.find('.cart-empty-wrap').show();
                        //     mini_cart.find('.cart-list-wrap').hide();
                        // }
                        // var total=0;
                        // $('.each_cart').each(function(){
                        //   var each_quantity=Number($(this).find('.quantity_num').text());
                        //   var each_price=Number($(this).find('.price_num').text());
                        //   var each_total=each_quantity*each_price;
                        //   total+=Number(each_total);
                        // })
                        // $('.total-price-number').text('$'+total);
                        // $('body').append('<div class="cart-product-added"><div class="added-message">Product was added to cart successfully!</div>');
                        //   setTimeout(function() {
                        //       $(".cart-product-added").fadeOut(1000, function() {});
                        //   }, 1500);
                    }
                });
            }
        })

        $('.country-select').change(function(e) {
            var _id = $(this).val();
            var city_id = <?php echo e($user_auth->city_id ?? '0'); ?>;
            var i = 0;

            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('frontend.order.getship')); ?>',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": _id
                },
                success: function(response) {
                    var data = response.data;
                    var html = "";
                    if (data != '') {
                        data.forEach(elm => {
                            if (i == 0) {
                                html +=
                                    `<div class="w-100"><input type="radio" checked name="ship_fee" onchange="check_totla(this)" data-index="0" value="` +
                                    elm.shipping_fee +
                                    `" class="shipping_method"><label>` +
                                    elm.name + ` (` + elm.shipping_fee.toFixed(2) +
                                    `$)</label></div>`;
                                $('.val_ship').val(elm.shipping_fee);
                                var subtotal = Number($('.subtotle').attr('data'));
                                subtotal += elm.shipping_fee;
                                $('.subtotle').html(formatMoney(
                                    subtotal));
                                $('.val_total').val(subtotal);
                            } else {
                                html +=
                                    `<div class="w-100"><input type="radio" onchange="check_totla(this)" name="ship_fee" data-index="0" value="` +
                                    elm.shipping_fee +
                                    `" class="shipping_method"><label>` +
                                    elm.name + ` (` + elm.shipping_fee.toFixed(2) +
                                    `$)</label></div>`;
                            }
                            i++;
                        })
                        $('.shipping-methods').html(html);
                    } else {
                        html =
                            `<div class="w-100"><input type="radio" checked name="ship_fee" data-index="0" value="0" class="shipping_method"><label>Free Ship </label></div>`;
                        $('.shipping-methods').html(html);
                    }
                },
                error: function(response) {
                    // Get errors
                    var errors = response.responseJSON.message;
                    alert(errors);
                    location.reload();
                }
            });

        })



        const filterArray = (array, fields, value) => {
            fields = Array.isArray(fields) ? fields : [fields];
            return array.filter((item) => fields.some((field) => item[field] === value));
        };
    })(jQuery);

    function loadMore(cl = '', view = '', type = '') {
        const productGroup = $(cl + ".active");
        var perpage = productGroup.data('perpage');
        var currentpage = productGroup.data('currentpage');
        var lastpage = productGroup.data('lastpage');
        var taxonomy = productGroup.data('taxonomy');
        var lang = '<?php echo e($locale ?? 'vi'); ?>';
        var url = "<?php echo e(route('frontend.view_more')); ?>";
        var items = '';
        if (currentpage + 1 >= lastpage) {
            productGroup.find('.main-button-m').hide();
        }
        $.ajax({
            type: "POST",
            url: url,
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "taxonomy": taxonomy,
                "lastpage": lastpage,
                "currentpage": currentpage,
                "perpage": perpage,
                "lang": lang,
                "type": type,
            },
            success: function(response) {
                productGroup.attr('data-currentpage', (currentpage + 1));
                $.each(response.data, function(key, val) {
                    if (type == 'product') {
                        items += `
                    <li class="products-item">
                        <div class="image">
                            <img src="` + val.image + `"
                                alt="` + val.name + `"
                                title="` + val.name + `" />
                        </div>
                        <a href="` + val.link + `"
                            title="` + val.name + `"
                            class="name">` + val.name + `</a>
                        <span class="price"> $` + val.price + ` </span>
                    </li>`;
                    } else {
                        items += `
                        <li class="news-item">
                            <div class="news-item-image">
                                <img src="` + val.image + `"
                                    alt="` + val.name + `"
                                    title="` + val.name + `" />
                            </div>
                            <p class="news-item-date">` + val.time + `</p>
                            <a href="` + val.link + `"
                                title="` + val.name + `"
                                class="news-item-title">` + val.name + `</a>
                            <p class="news-item-desc">
                                ` + val.brief + `
                            </p>
                        </li>
                        `;
                    }

                });
                productGroup.find(view).append(items);
            },
            error: function(data) {
                // Get errors
                var errors = data.responseJSON.message;
                alert(errors);
                location.reload();
            }
        });
    }

    function check_totla(t) {
        var subtotal = Number($('.subtotle').attr('data'));
        subtotal += new Number($(t).val());
        $('.val_ship').val($(t).val());
        $('.val_total').val(subtotal);
        $('.subtotle').html(formatMoney(
            subtotal));
    }

    function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
        try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign +
                (j ? i.substr(0, j) + thousands : '') +
                i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) +
                (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
            console.log(e)
        }
    };
</script>
<?php /**PATH E:\xampp\htdocs\urbanchic\resources\views/frontend/panels/scripts.blade.php ENDPATH**/ ?>