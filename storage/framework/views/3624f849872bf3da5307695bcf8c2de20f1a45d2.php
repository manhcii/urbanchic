
 <section class="modal fade login" id="fhm-login-popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content login-modal">

        <div class="login-container">

          <div class="login-right">

            <button type="button" class="btn-close login-close" data-bs-dismiss="modal" aria-label="Close">
              <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M5.69422 17.0078C5.3011 16.6199 5.29689 15.9867 5.68481 15.5936L15.5182 5.62851C15.9062 5.23539 16.5393 5.23118 16.9324 5.6191C17.3255 6.00702 17.3297 6.64017 16.9418 7.03328L7.1084 16.9984C6.72048 17.3915 6.08733 17.3957 5.69422 17.0078Z"
                  fill="#292929" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M17.0076 16.9326C17.3955 16.5394 17.3913 15.9063 16.9982 15.5184L7.03305 5.68494C6.63993 5.29702 6.00678 5.30124 5.61887 5.69435C5.23095 6.08746 5.23516 6.72061 5.62827 7.10853L15.5934 16.942C15.9865 17.3299 16.6197 17.3257 17.0076 16.9326Z"
                  fill="#292929" />
              </svg>
            </button>


            <img class="logo" src="<?php echo e(asset('themes/frontend/assets/image/logo-color.svg')); ?>" alt="Savory Spree" title="Savory Spree" />
            <h2>Welcome Back</h2>
            <p class="login-right-subtitle">
              Please enter your details to sign in
            </p>

            <div class="login-other">
              <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')" class="login-other-btn" title="Sign in with Google">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.67969 6.67896V9.84041H13.073C12.8801 10.8571 12.3012 11.718 11.4329 12.2969L14.0823 14.3526C15.6259 12.9277 16.5165 10.8349 16.5165 8.34881C16.5165 7.76997 16.4645 7.21332 16.368 6.67904L8.67969 6.67896Z"
                    fill="#4285F4" />
                  <path
                    d="M4.1052 9.71704L3.50767 10.1744L1.39258 11.8219C2.73582 14.4861 5.48889 16.3266 8.68 16.3266C10.8841 16.3266 12.7319 15.5993 14.0826 14.3526L11.4332 12.2969C10.706 12.7867 9.7783 13.0836 8.68 13.0836C6.55754 13.0836 4.75423 11.6513 4.10854 9.72175L4.1052 9.71704Z"
                    fill="#34A853" />
                  <path
                    d="M1.39224 4.50464C0.835681 5.60294 0.516602 6.8423 0.516602 8.16326C0.516602 9.48422 0.835681 10.7236 1.39224 11.8219C1.39224 11.8293 4.10846 9.71425 4.10846 9.71425C3.9452 9.22445 3.84869 8.705 3.84869 8.16317C3.84869 7.62135 3.9452 7.1019 4.10846 6.6121L1.39224 4.50464Z"
                    fill="#FBBC05" />
                  <path
                    d="M8.68017 3.2505C9.88243 3.2505 10.9511 3.66608 11.8045 4.46758L14.1422 2.12992C12.7247 0.808966 10.8843 0 8.68017 0C5.48906 0 2.73582 1.83304 1.39258 4.5047L4.10871 6.61233C4.75432 4.68279 6.55771 3.2505 8.68017 3.2505Z"
                    fill="#EA4335" />
                </svg>
              </a>

              <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')" class="login-other-btn" title="Sign in with Icloud">
                <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.5328 0C11.5755 0 11.6182 0 11.6634 0C11.7682 1.29471 11.274 2.26212 10.6734 2.96269C10.0841 3.65841 9.27709 4.33318 7.97189 4.2308C7.88482 2.95462 8.37981 2.05897 8.97961 1.36001C9.53587 0.708626 10.5557 0.128988 11.5328 0Z"
                    fill="#292929" />
                  <path
                    d="M15.484 13.29C15.484 13.3029 15.484 13.3142 15.484 13.3263C15.1172 14.4372 14.594 15.3893 13.9555 16.2728C13.3726 17.075 12.6584 18.1544 11.383 18.1544C10.281 18.1544 9.54896 17.4458 8.41951 17.4265C7.22477 17.4071 6.56774 18.019 5.47537 18.173C5.35041 18.173 5.22546 18.173 5.10292 18.173C4.30078 18.0569 3.65342 17.4216 3.18181 16.8492C1.79116 15.1579 0.716532 12.9732 0.516602 10.1773C0.516602 9.90325 0.516602 9.62995 0.516602 9.35586C0.60125 7.35493 1.57349 5.72808 2.86579 4.93964C3.54781 4.52043 4.48539 4.1633 5.52938 4.32292C5.97681 4.39225 6.43391 4.54542 6.83458 4.69698C7.21429 4.8429 7.68912 5.10168 8.13897 5.08798C8.4437 5.07911 8.74682 4.92029 9.05397 4.80823C9.95366 4.48335 10.8356 4.11089 11.9981 4.28583C13.3952 4.49705 14.3868 5.1178 14.9995 6.07554C13.8176 6.8277 12.8833 7.96118 13.0429 9.8968C13.1848 11.6551 14.207 12.6837 15.484 13.29Z"
                    fill="#292929" />
                </svg>
              </a>

              <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')" class="login-other-btn" title="Sign in with Facebook">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M16 8.04868C16 12.073 13.0645 15.4158 9.22581 16V10.3854H11.0968L11.4516 8.04868H9.22581V6.55578C9.22581 5.90669 9.54839 5.29006 10.5484 5.29006H11.5484V3.31034C11.5484 3.31034 10.6452 3.14807 9.74194 3.14807C7.93548 3.14807 6.74194 4.28398 6.74194 6.29615V8.04868H4.70968V10.3854H6.74194V16C2.90323 15.4158 0 12.073 0 8.04868C0 3.60243 3.58065 0 8 0C12.4194 0 16 3.60243 16 8.04868Z"
                    fill="#1877F2" />
                </svg>
              </a>
            </div>

            <div class="login-or"><span>Or</span></div>

            <form class="login-form" id="login_form" method="post" action="<?php echo e(route('frontend.login.post')); ?>">
                <?php echo csrf_field(); ?>
                <?php
                    $referer = request()->headers->get('referer');
                    $current = url()->full();
                ?>
              <div class="contact-form-row">
                <div class="contact-form-line contact-form-line-full">
                  <label for="email-or-phone">Email</label>
                  <input type="text" id="email-or-phone" placeholder="Enter your email" name="email" required />
                  <div class="clear-input d-none">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                        fill="#C8C8C8"></path>
                    </svg>
                  </div>
                </div>

                <div class="contact-form-line contact-form-line-full">
                  <label for="passwordPopupLogin">Password</label>
                  <input type="password" id="passwordPopupLogin" name="password" placeholder="Enter your password" />

                  <div class="password-input position-absolute">
                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M15.0288 10.8689C16.944 9.15024 18 7.2 18 7.2C18 7.2 14.625 0.967267 9 0.967267C7.8577 0.967267 6.80818 1.2243 5.86088 1.63398L6.72811 2.50755C7.43606 2.25141 8.19496 2.10049 9 2.10049C11.3843 2.10049 13.3638 3.4243 14.8139 4.88494C15.5292 5.60544 16.0851 6.3296 16.4618 6.8741C16.5436 6.99236 16.6167 7.10165 16.6807 7.2C16.6167 7.29835 16.5436 7.40764 16.4618 7.52589C16.0851 8.07039 15.5292 8.79455 14.8139 9.51505C14.6285 9.70183 14.4344 9.88638 14.2319 10.0662L15.0288 10.8689Z"
                        fill="#454545" />
                      <path
                        d="M12.7097 8.53283C12.8572 8.11628 12.9375 7.66759 12.9375 7.2C12.9375 5.00948 11.1746 3.23372 9 3.23372C8.5358 3.23372 8.09037 3.31463 7.67684 3.46322L8.60195 4.39509C8.73199 4.37654 8.86488 4.36694 9 4.36694C10.5533 4.36694 11.8125 5.63534 11.8125 7.2C11.8125 7.33611 11.803 7.46997 11.7846 7.60096L12.7097 8.53283Z"
                        fill="#454545" />
                      <path
                        d="M9.39808 10.0049L10.3232 10.9368C9.90965 11.0854 9.46421 11.1663 9 11.1663C6.82538 11.1663 5.0625 9.39052 5.0625 7.2C5.0625 6.7324 5.14283 6.2837 5.29035 5.86714L6.21545 6.79901C6.19703 6.93 6.1875 7.06388 6.1875 7.2C6.1875 8.76466 7.4467 10.0331 9 10.0331C9.13513 10.0331 9.26803 10.0235 9.39808 10.0049Z"
                        fill="#454545" />
                      <path
                        d="M3.76812 4.33379C3.56564 4.51361 3.37155 4.69816 3.18612 4.88494C2.47085 5.60544 1.91493 6.3296 1.53818 6.8741C1.45636 6.99236 1.38333 7.10165 1.31929 7.2C1.38333 7.29835 1.45636 7.40764 1.53818 7.52589C1.91493 8.07039 2.47085 8.79455 3.18612 9.51505C4.63616 10.9757 6.6157 12.2995 9 12.2995C9.80505 12.2995 10.564 12.1486 11.2719 11.8924L12.1391 12.766C11.1918 13.1757 10.1423 13.4327 9 13.4327C3.375 13.4327 0 7.2 0 7.2C0 7.2 1.05606 5.24974 2.97126 3.5311L3.76812 4.33379Z"
                        fill="#454545" />
                      <path d="M15.3523 14.4L1.85225 0.80131L2.64775 0L16.1477 13.5987L15.3523 14.4Z" fill="#454545" />
                    </svg>
                  </div>
                </div>
              </div>
              <div class="login-form-bottom">
                <div class="login-form-remember">
                  <input type="checkbox" title="Remember me" name="rememberMe" id="rememberMe" checked />
                  <label for="rememberMe">Remember me</label>
                </div>
                <a href="<?php echo e(route('frontend.password.forgot.get')); ?>" class="login-form-forgot d-block" title="Forgot your password?">Forgot your password?</a>
              </div>
              <button type="submit" class="button login-form-submit" title="Sign in">
                Sign In
              </button>
              <div class="col-12 form-group login_result d-none mt-3">
                <div class="alert alert-warning" role="alert">
                    <?php echo app('translator')->get('Processing...'); ?>
                </div>
            </div>
            </form>

            <p class="login-not" data-bs-toggle="modal" data-bs-target="#fhm-signin-popup"
              aria-controls="fhm-signin-popup">
              Have an not account?
              <span>Register</span>
            </p>
          </div>

          <div class="login-image">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="login-image-item">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-banner.png')); ?>" alt="Loggin"
                      title="Loggin" />
                    <p>
                      Start for free and improve your speaker carrer just in one
                      click.
                    </p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="login-image-item">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/popup-register.png')); ?>" alt="Loggin"
                      title="Loggin" />
                    <p>
                      Start for free and improve your speaker carrer just in one
                      click.
                    </p>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>

              
            <div class="button-custom-prev swiper-circle">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3205 3.36716C10.5196 3.5663 10.5252 3.88358 10.333 4.07583L4.91586 9.49294L9.37547 9.57132C9.65222 9.57619 9.88052 9.80449 9.88538 10.0812C9.89025 10.358 9.66983 10.5784 9.39308 10.5735L3.72369 10.4739C3.44694 10.469 3.21864 10.2407 3.21378 9.96398L3.11413 4.29459C3.10927 4.01784 3.32968 3.79743 3.60643 3.80229C3.88319 3.80715 4.11149 4.03545 4.11635 4.31221L4.19473 8.77181L9.61184 3.35471C9.80409 3.16245 10.1214 3.16803 10.3205 3.36716Z" fill="black"/>
              </svg>                  
            </div>
            <div class="button-custom-next swiper-circle">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.65996 10.3206C3.46082 10.1214 3.45525 9.80416 3.6475 9.61191L9.06461 4.1948L4.605 4.11642C4.32825 4.11156 4.09995 3.88326 4.09509 3.6065C4.09022 3.32975 4.31063 3.10934 4.58739 3.1142L10.2568 3.21385C10.5335 3.21871 10.7618 3.44701 10.7667 3.72376L10.8663 9.39315C10.8712 9.66991 10.6508 9.89032 10.374 9.88545C10.0973 9.88059 9.86898 9.65229 9.86412 9.37554L9.78574 4.91593L4.36863 10.333C4.17637 10.5253 3.85909 10.5197 3.65996 10.3206Z" fill="black"/>
              </svg>                  
            </div>
          </div>
        </div>

        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>
  
        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf-2.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>

        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf-3.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>

        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf-4.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>
      </div>
    </div>
  </section>

  <!--Popup Register-->
  <section class="modal fade login" id="fhm-signin-popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content login-modal">
        <div class="login-container">
          <div class="login-right">
            <button type="button" class="btn-close login-close" data-bs-dismiss="modal" aria-label="Close">
              <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M5.69422 17.0078C5.3011 16.6199 5.29689 15.9867 5.68481 15.5936L15.5182 5.62851C15.9062 5.23539 16.5393 5.23118 16.9324 5.6191C17.3255 6.00702 17.3297 6.64017 16.9418 7.03328L7.1084 16.9984C6.72048 17.3915 6.08733 17.3957 5.69422 17.0078Z"
                  fill="#292929" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M17.0076 16.9326C17.3955 16.5394 17.3913 15.9063 16.9982 15.5184L7.03305 5.68494C6.63993 5.29702 6.00678 5.30124 5.61887 5.69435C5.23095 6.08746 5.23516 6.72061 5.62827 7.10853L15.5934 16.942C15.9865 17.3299 16.6197 17.3257 17.0076 16.9326Z"
                  fill="#292929" />
              </svg>
            </button>
            <h2>Create Your Account</h2>
            <p class="login-right-subtitle">
              Please enter your details to sign up
            </p>

            <div class="login-other">
              <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')" class="login-other-btn" title="Sign in with Google">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.67969 6.67896V9.84041H13.073C12.8801 10.8571 12.3012 11.718 11.4329 12.2969L14.0823 14.3526C15.6259 12.9277 16.5165 10.8349 16.5165 8.34881C16.5165 7.76997 16.4645 7.21332 16.368 6.67904L8.67969 6.67896Z"
                    fill="#4285F4" />
                  <path
                    d="M4.1052 9.71704L3.50767 10.1744L1.39258 11.8219C2.73582 14.4861 5.48889 16.3266 8.68 16.3266C10.8841 16.3266 12.7319 15.5993 14.0826 14.3526L11.4332 12.2969C10.706 12.7867 9.7783 13.0836 8.68 13.0836C6.55754 13.0836 4.75423 11.6513 4.10854 9.72175L4.1052 9.71704Z"
                    fill="#34A853" />
                  <path
                    d="M1.39224 4.50464C0.835681 5.60294 0.516602 6.8423 0.516602 8.16326C0.516602 9.48422 0.835681 10.7236 1.39224 11.8219C1.39224 11.8293 4.10846 9.71425 4.10846 9.71425C3.9452 9.22445 3.84869 8.705 3.84869 8.16317C3.84869 7.62135 3.9452 7.1019 4.10846 6.6121L1.39224 4.50464Z"
                    fill="#FBBC05" />
                  <path
                    d="M8.68017 3.2505C9.88243 3.2505 10.9511 3.66608 11.8045 4.46758L14.1422 2.12992C12.7247 0.808966 10.8843 0 8.68017 0C5.48906 0 2.73582 1.83304 1.39258 4.5047L4.10871 6.61233C4.75432 4.68279 6.55771 3.2505 8.68017 3.2505Z"
                    fill="#EA4335" />
                </svg>
              </a>

              <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')" class="login-other-btn" title="Sign in with Icloud">
                <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.5328 0C11.5755 0 11.6182 0 11.6634 0C11.7682 1.29471 11.274 2.26212 10.6734 2.96269C10.0841 3.65841 9.27709 4.33318 7.97189 4.2308C7.88482 2.95462 8.37981 2.05897 8.97961 1.36001C9.53587 0.708626 10.5557 0.128988 11.5328 0Z"
                    fill="#292929" />
                  <path
                    d="M15.484 13.29C15.484 13.3029 15.484 13.3142 15.484 13.3263C15.1172 14.4372 14.594 15.3893 13.9555 16.2728C13.3726 17.075 12.6584 18.1544 11.383 18.1544C10.281 18.1544 9.54896 17.4458 8.41951 17.4265C7.22477 17.4071 6.56774 18.019 5.47537 18.173C5.35041 18.173 5.22546 18.173 5.10292 18.173C4.30078 18.0569 3.65342 17.4216 3.18181 16.8492C1.79116 15.1579 0.716532 12.9732 0.516602 10.1773C0.516602 9.90325 0.516602 9.62995 0.516602 9.35586C0.60125 7.35493 1.57349 5.72808 2.86579 4.93964C3.54781 4.52043 4.48539 4.1633 5.52938 4.32292C5.97681 4.39225 6.43391 4.54542 6.83458 4.69698C7.21429 4.8429 7.68912 5.10168 8.13897 5.08798C8.4437 5.07911 8.74682 4.92029 9.05397 4.80823C9.95366 4.48335 10.8356 4.11089 11.9981 4.28583C13.3952 4.49705 14.3868 5.1178 14.9995 6.07554C13.8176 6.8277 12.8833 7.96118 13.0429 9.8968C13.1848 11.6551 14.207 12.6837 15.484 13.29Z"
                    fill="#292929" />
                </svg>
              </a>

              <a href="javascript:void(0)" onclick="alert('<?php echo app('translator')->get('Function is being completed'); ?>')" class="login-other-btn" title="Sign in with Facebook">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M16 8.04868C16 12.073 13.0645 15.4158 9.22581 16V10.3854H11.0968L11.4516 8.04868H9.22581V6.55578C9.22581 5.90669 9.54839 5.29006 10.5484 5.29006H11.5484V3.31034C11.5484 3.31034 10.6452 3.14807 9.74194 3.14807C7.93548 3.14807 6.74194 4.28398 6.74194 6.29615V8.04868H4.70968V10.3854H6.74194V16C2.90323 15.4158 0 12.073 0 8.04868C0 3.60243 3.58065 0 8 0C12.4194 0 16 3.60243 16 8.04868Z"
                    fill="#1877F2" />
                </svg>
              </a>
            </div>

            <div class="login-or"><span>Or</span></div>

            <form class="login-form signin-form" id="signup_form"method="post" action="<?php echo e(route('frontend.register')); ?>">
                <?php echo csrf_field(); ?>
                <?php
                    $referer = request()->headers->get('referer');
                    $current = url()->full();
                ?>
              <div class="contact-form-row">
                <div class="contact-form-line contact-form-line-full">
                  <label for="email-or-phone-signin">Email</label>
                  <input type="text" id="email-or-phone-signin" placeholder="Enter your email" name="email"required />
                  <div class="clear-input d-none">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                        fill="#C8C8C8"></path>
                    </svg>
                  </div>
                </div>

                <div class="contact-form-line contact-form-line-full">
                  <label for="namePopupSignin">Name</label>
                  <input type="text" name="name" id="namePopupSignin" placeholder="Your name" />

                  <div class="clear-input d-none">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                        fill="#C8C8C8"></path>
                    </svg>
                  </div>
                </div>

                <div class="contact-form-line contact-form-line-full">
                  <label for="passwordPopupSignin">Password</label>
                  <input type="password" name="password" id="passwordPopupSignin" placeholder="Enter your password" />

                  <div class="password-input position-absolute">
                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M15.0288 10.8689C16.944 9.15024 18 7.2 18 7.2C18 7.2 14.625 0.967267 9 0.967267C7.8577 0.967267 6.80818 1.2243 5.86088 1.63398L6.72811 2.50755C7.43606 2.25141 8.19496 2.10049 9 2.10049C11.3843 2.10049 13.3638 3.4243 14.8139 4.88494C15.5292 5.60544 16.0851 6.3296 16.4618 6.8741C16.5436 6.99236 16.6167 7.10165 16.6807 7.2C16.6167 7.29835 16.5436 7.40764 16.4618 7.52589C16.0851 8.07039 15.5292 8.79455 14.8139 9.51505C14.6285 9.70183 14.4344 9.88638 14.2319 10.0662L15.0288 10.8689Z"
                        fill="#454545" />
                      <path
                        d="M12.7097 8.53283C12.8572 8.11628 12.9375 7.66759 12.9375 7.2C12.9375 5.00948 11.1746 3.23372 9 3.23372C8.5358 3.23372 8.09037 3.31463 7.67684 3.46322L8.60195 4.39509C8.73199 4.37654 8.86488 4.36694 9 4.36694C10.5533 4.36694 11.8125 5.63534 11.8125 7.2C11.8125 7.33611 11.803 7.46997 11.7846 7.60096L12.7097 8.53283Z"
                        fill="#454545" />
                      <path
                        d="M9.39808 10.0049L10.3232 10.9368C9.90965 11.0854 9.46421 11.1663 9 11.1663C6.82538 11.1663 5.0625 9.39052 5.0625 7.2C5.0625 6.7324 5.14283 6.2837 5.29035 5.86714L6.21545 6.79901C6.19703 6.93 6.1875 7.06388 6.1875 7.2C6.1875 8.76466 7.4467 10.0331 9 10.0331C9.13513 10.0331 9.26803 10.0235 9.39808 10.0049Z"
                        fill="#454545" />
                      <path
                        d="M3.76812 4.33379C3.56564 4.51361 3.37155 4.69816 3.18612 4.88494C2.47085 5.60544 1.91493 6.3296 1.53818 6.8741C1.45636 6.99236 1.38333 7.10165 1.31929 7.2C1.38333 7.29835 1.45636 7.40764 1.53818 7.52589C1.91493 8.07039 2.47085 8.79455 3.18612 9.51505C4.63616 10.9757 6.6157 12.2995 9 12.2995C9.80505 12.2995 10.564 12.1486 11.2719 11.8924L12.1391 12.766C11.1918 13.1757 10.1423 13.4327 9 13.4327C3.375 13.4327 0 7.2 0 7.2C0 7.2 1.05606 5.24974 2.97126 3.5311L3.76812 4.33379Z"
                        fill="#454545" />
                      <path d="M15.3523 14.4L1.85225 0.80131L2.64775 0L16.1477 13.5987L15.3523 14.4Z" fill="#454545" />
                    </svg>
                  </div>
                </div>
              </div>
              <div class="login-form-bottom">
                <div class="login-form-remember">
                  <input type="checkbox" title="I agree to the Terms & Priavcy" name="igreeTerm" id="igreeTerm"
                    checked />
                  <label for="igreeTerm">I agree to the
                    <a href="about-us.html" title="Terms & Priavcy">Terms & Priavcy</a></label>
                </div>
              </div>
              <button type="submit" class="button login-form-submit"  title="Sign in">
                Sign Up
              </button>
              <div class="col-12 form-group signup_result d-none mt-3">
                <div class="alert alert-warning" role="alert">
                    <?php echo app('translator')->get('Processing...'); ?>
                </div>
            </div>
            </form>

            <p class="login-not">
              Have an account?
              <span data-bs-toggle="modal" data-bs-target="#fhm-login-popup" aria-controls="fhm-login-popup">Sign
                in</span>
            </p>
          </div>

          <div class="login-image">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="login-image-item">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-banner.png')); ?>" alt="Loggin"
                      title="Loggin" />
                    <p>
                      Start for free and improve your speaker carrer just in one
                      click.
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="login-image-item">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/popup-register.png')); ?>" alt="Loggin"
                      title="Loggin" />
                    <p>
                      Start for free and improve your speaker carrer just in one click.
                    </p>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>

            <div class="button-custom-prev swiper-circle">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3205 3.36716C10.5196 3.5663 10.5252 3.88358 10.333 4.07583L4.91586 9.49294L9.37547 9.57132C9.65222 9.57619 9.88052 9.80449 9.88538 10.0812C9.89025 10.358 9.66983 10.5784 9.39308 10.5735L3.72369 10.4739C3.44694 10.469 3.21864 10.2407 3.21378 9.96398L3.11413 4.29459C3.10927 4.01784 3.32968 3.79743 3.60643 3.80229C3.88319 3.80715 4.11149 4.03545 4.11635 4.31221L4.19473 8.77181L9.61184 3.35471C9.80409 3.16245 10.1214 3.16803 10.3205 3.36716Z" fill="black"/>
              </svg>                
            </div>
            <div class="button-custom-next swiper-circle">
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.65996 10.3208C3.46082 10.1217 3.45525 9.80441 3.6475 9.61215L9.06461 4.19505L4.605 4.11666C4.32825 4.1118 4.09995 3.8835 4.09509 3.60675C4.09022 3.32999 4.31063 3.10958 4.58739 3.11445L10.2568 3.21409C10.5335 3.21895 10.7618 3.44725 10.7667 3.72401L10.8663 9.3934C10.8712 9.67015 10.6508 9.89056 10.374 9.8857C10.0973 9.88083 9.86898 9.65254 9.86412 9.37578L9.78574 4.91617L4.36863 10.3333C4.17637 10.5255 3.85909 10.52 3.65996 10.3208Z" fill="black"/>
              </svg>
            </div>
          </div>
        </div>

        
        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>
  
        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf-2.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>

        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf-3.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>

        <div class="icon-leaf">
          <img src="<?php echo e(asset('themes/frontend/assets/image/popup-login-leaf-4.png')); ?>" alt="Savory Spree" title="Savory Spree">
        </div>
      </div>
    </div>
  </section><?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/sticky/contact.blade.php ENDPATH**/ ?>