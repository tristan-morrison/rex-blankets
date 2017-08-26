<?php
  /*
   * Contains the closing of the #content div and all content after
   *
   *
   */

   $GLOBALS['directoryUri'] = get_template_directory_uri() . '/../storefront-child-rex-blankets';
?>

    </div><!-- .col-full -->
  </div><!-- #content -->

  <div id="footerWrapper">
    <div id="footerNavContainer">
      <div class="footer-nav-category">
        <h4 class="footer-header">Shop</h4>
        <div>
          <span>Blankets</span>
          <span>Banners</span>
          <span>Drapes</span>
          <span>More</span>
        </div>
      </div>
      <div class="footer-nav-category">
        <h4 class="footer-header">Help</h4>
        <div>
          <span>FAQs</span>
          <span>Shipping</span>
          <span>Returns</span>
          <span>Care</span>
        </div>
      </div>
      <div class="footer-nav-category">
        <h4 class="footer-header">About</h4>
        <div>
          <span>History</span>
          <span>Press</span>
        </div>
      </div>
    </div>
    <div id="footerDivider"></div>
    <div id="footerContactContainer">
      <h4 class="footer-header">Get in Touch</h4>
      <div class="contact-us-item">
        <img class="contact-us-item-icon" src="<?php echo $GLOBALS['directoryUri'] .  '/assets/images/icons/phone-icon-dk-blue.svg'?>" width="18px" />
        <span><a href="tel:734-646-4875">734-646-4875</a></span>
      </div>
      <div class="contact-us-item">
        <img class="contact-us-item-icon" src="<?php echo $GLOBALS['directoryUri'] . '/assets/images/icons/email-icon-dk-blue.svg' ?>" width="18px" />
        <span><a href="mailto:hello@rexblankets.com">Email</a></span>
      </div>
      <div class="contact-us-item">
        <img class="contact-us-item-icon" src="<?php echo $GLOBALS['directoryUri'] . '/assets/images/icons/facebook-messenger-icon-dk-blue.svg' ?>" width="18px" />
        <span><a href="https://www.facebook.com/messages/t/RexBlankets" target="_blank">Facebook Message</a></span>
      </div>
    </div>
    <div id="footerDivider"></div>
    <div id="footerSocialContainer">
      <div style="flex-direction: column; margin-top: 0; min-height: 128px">
        <div id="mc_embed_signup" style="flex-direction: column; margin-top: 0">
          <form action="//rexblankets.us15.list-manage.com/subscribe/post?u=50d822450ee854891eedb268c&amp;id=1c27eac34b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" style="padding: 0 !important" novalidate>
            <div id="mc_embed_signup_scroll" style="flex-direction: column;  margin-top: 0">
              <label for="mce-EMAIL" id="mailChimpLabel" class="footer-header">Follow</label>
              <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_50d822450ee854891eedb268c_1c27eac34b" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="min-height: 30px; margin-top: -10px"></div>
            </div>
          </form>
        </div>

        <!--End mc_embed_signup-->
      </div>
      <div style="flex-direction: row; justify-content: center">
        <img class="contact-us-item-icon" id="footerFbIcon" src="wp-content/themes/storefront-child-rex-blankets/assets/images/icons/facebook-icon-dk-blue.svg" width="30px" />
        <img class="contact-us-item-icon" id="footerInstagramIcon" src="wp-content/themes/storefront-child-rex-blankets/assets/images/icons/instagram-icon-dk-blue.svg" width="30px" />
      </div>
    </div>
  </div>
