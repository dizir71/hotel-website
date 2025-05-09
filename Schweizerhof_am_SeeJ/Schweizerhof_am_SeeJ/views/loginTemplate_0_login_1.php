<section class="u-align-center u-clearfix u-section-1" id="sec-4431">
  <div class="u-clearfix u-sheet u-sheet-1"><!--login_form-->
    <div class="u-form u-login-control u-form-1"><!--login_form_inner-->
      <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;"><!--login_form_usernameGroup-->
        <div class="u-form-group u-form-name"><!--login_form_usernameLabel-->
          <label for="username-a30d" class="u-label" name="">Username *</label><!--/login_form_usernameLabel--><!--login_form_username-->
          <input type="text" placeholder="Enter your Username" id="username-a30d" name="username" class="u-border-grey-30 u-input u-input-rectangle u-input-1" required=""><!--/login_form_username-->
        </div><!--/login_form_usernameGroup--><!--login_form_passwordGroup-->
        <div class="u-form-group u-form-password"><!--login_form_passwordLabel-->
          <label for="password-a30d" class="u-label" name="">Password *</label><!--/login_form_passwordLabel--><!--login_form_password-->
          <input type="password" placeholder="Enter your Password" id="password-a30d" name="password" class="u-border-grey-30 u-input u-input-rectangle u-input-2" required=""><!--/login_form_password-->
        </div><!--/login_form_passwordGroup--><!--login_form_rememberGroup-->
        <div class="u-form-checkbox u-form-group"><!--login_form_remember-->
          <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?><input type="checkbox" id="checkbox-a30d" name="remember" value="On"><?php endif; ?><!--/login_form_remember--><!--login_form_rememberLabel-->
          <label for="checkbox-a30d" class="u-label" name="">Remember me</label><!--/login_form_rememberLabel-->
        </div><!--/login_form_rememberGroup--><!--login_form_submit-->
        <div class="u-align-left u-form-group u-form-submit">
          <a href="#" class="u-btn u-btn-submit u-button-style u-btn-1">Login</a>
          <input type="submit" value="submit" class="u-form-control-hidden">
        </div><!--/login_form_submit-->
        <input type="hidden" value="" name="recaptchaResponse">
      <?php echo $hiddenFields; ?></form><!--/login_form_inner-->
    </div><!--/login_form--><!--login_form_forgot_password-->
    <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-palette-1-base u-btn-2">Forgot password?</a><!--/login_form_forgot_password--><!--login_form_create_account-->
    
                            <?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
                            <?php if ($usersConfig->get('allowUserRegistration')) : ?>
                                <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-login-control u-login-create-account u-none u-text-palette-1-base u-btn-3">Don't have an account?</a>
                            <?php endif; ?>
                        <!--/login_form_create_account-->
  </div>
</section>
