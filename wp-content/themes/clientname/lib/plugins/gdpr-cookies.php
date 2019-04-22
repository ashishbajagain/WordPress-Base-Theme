<?php

/**
 * Cookies Bar
 */

/**
 * Check if ACF Pro is active
 * Apply filters and methods
 */
if (in_array(
  'advanced-custom-fields-pro/acf.php',
  apply_filters('active_plugins', get_option('active_plugins'))
)) {
  if (function_exists('acf_add_options_page')) {

    /**
     * Add Menu under site settings
     */
    acf_add_options_sub_page([
      'page_title' => 'GDPR and Cookies',
      'menu_title' => 'GDPR and Cookies',
      'menu_slug' => 'acf-gdpr-and-cookies',
      'parent_slug' => 'options-general.php',
      'autoload' => true,
    ]);

    /**
     * Add fields required for "Cookies Bar"
     */
    if (function_exists('acf_add_local_field_group')) {
      acf_add_local_field_group(array(
        'key' => 'cookies_bar',
        'title' => 'Cookies Bar',
        'fields' => array(
          array(
            'key' => 'enable_cookies_option',
            'label' => '',
            'name' => 'enable_cookies_option',
            'type' => 'true_false',
            'message' => 'Enable Cookies Bar'
          ),
          array(
            'key' => 'cookies_content_tab',
            'label' => 'Content',
            'name' => 'cookies_content_tab',
            'type' => 'tab',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_content',
            'label' => 'Cookies Content',
            'name' => 'cookies_content',
            'type' => 'wysiwyg',
            'default_value' => 'Vi använder tredjepartscookies för vår hemsida i syfte att analysera och förbättra upplevelsen på hemsidan och lära oss mer om våra användare. Genom att använda vår webbplats godkänner du användningen av cookies på det sätt som beskrivits.',
            'media_upload' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_button_title',
            'label' => 'Accept Button Title',
            'name' => 'cookies_button_title',
            'type' => 'text',
            'default_value' => 'Ok',
            'placeholder' => 'Accept Cookies Button Title',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_settings_tab',
            'label' => 'Settings',
            'name' => 'cookies_settings_tab',
            'type' => 'tab',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_layout_background',
            'label' => 'Background Color',
            'name' => 'cookies_layout_background',
            'type' => 'text',
            'default_value' => '#333',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_layout_color',
            'label' => 'Text Color',
            'name' => 'cookies_layout_color',
            'type' => 'text',
            'default_value' => '#fff',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_button_background',
            'label' => 'Button Background',
            'name' => 'cookies_button_background',
            'type' => 'text',
            'default_value' => '#c7c7c7',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_button_color',
            'label' => 'Button Color',
            'name' => 'cookies_button_color',
            'type' => 'text',
            'default_value' => '#333',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'cookies_custom_css',
            'label' => 'Cookies Custom CSS',
            'name' => 'cookies_custom_css',
            'type' => 'textarea',
            'placeholder' => 'Add your custom css',
            'new_lines' => '',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_cookies_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'options_page',
              'operator' => '==',
              'value' => 'acf-gdpr-and-cookies',
            ),
          ),
        ),
      ));

      /**
       * Register ACF Field Group for GDPR
       */
      acf_add_local_field_group(array(
        'key' => 'gdpr_popup',
        'title' => 'GDPR Popup',
        'fields' => array(
          array(
            'key' => 'enable_gdpr_option',
            'label' => '',
            'name' => 'enable_gdpr_option',
            'type' => 'true_false',
            'message' => 'Enable GDPR Popup'
          ),
          array(
            'key' => 'gdpr_content_tab',
            'label' => 'Content',
            'name' => 'gdpr_content_tab',
            'type' => 'tab',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_title',
            'label' => 'Title',
            'name' => 'gdpr_title',
            'type' => 'text',
            'default_value' => 'Hantering av personuppgifter (GDPR)',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_content',
            'label' => 'GDPR Content',
            'name' => 'gdpr_content',
            'type' => 'wysiwyg',
            'default_value' => '<p>Example Company, samlar in och bearbetar dina personuppgifter för att tillhandahålla produkter och tjänster åt dig, för att informera dig om nyheter och uppdateringar av våra produkter och tjänster, för att anpassa din upplevelse av vår webbplats samt för att förbättra våra produkter och tjänster.</p>
            <p>När som helst har du rätt att få tillgång till, korrigera och radera dina personuppgifter och att invända mot bearbetning av dina personuppgifter. Du kan utöva dessa rättigheter genom att skicka ett e-postmeddelande till följande adress example@company.name.</p>
            <p>Example Company förbinder sig att respektera och skydda dina personuppgifter och din personliga integritet i enlighet med gällande lagstiftning, branschregler och andra relevanta normer. Vi lämnar aldrig ut dina personuppgifter till tredje part utan ditt godkännande.</p>',
            'media_upload' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_button_title',
            'label' => 'Accept Button Title',
            'name' => 'gdpr_button_title',
            'type' => 'text',
            'default_value' => 'JAG FÖRSTÅR',
            'placeholder' => 'Accept GDPR Button Title',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_settings_tab',
            'label' => 'Settings',
            'name' => 'gdpr_settings_tab',
            'type' => 'tab',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_layout_background',
            'label' => 'Background Color',
            'name' => 'gdpr_layout_background',
            'type' => 'text',
            'default_value' => '#333',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_layout_opacity',
            'label' => 'Background Opacity',
            'name' => 'gdpr_layout_opacity',
            'type' => 'text',
            'default_value' => '50',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_button_background',
            'label' => 'Button Background',
            'name' => 'gdpr_button_background',
            'type' => 'text',
            'default_value' => '#44b93c',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_button_color',
            'label' => 'Button Color',
            'name' => 'gdpr_button_color',
            'type' => 'text',
            'default_value' => '#fff',
            'wrapper' => array(
              'width' => '50'
            ),
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
          array(
            'key' => 'gdpr_custom_css',
            'label' => 'GDPR Custom CSS',
            'name' => 'gdpr_custom_css',
            'type' => 'textarea',
            'placeholder' => 'Add your custom css',
            'new_lines' => '',
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'enable_gdpr_option',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'options_page',
              'operator' => '==',
              'value' => 'acf-gdpr-and-cookies',
            ),
          ),
        ),
      ));
    }
  }

  /**
   * Check if Cookies Bar is enabled
   *
   * @return bool
   */
  function enable_cookies_bar()
  {
    return (bool)get_field('enable_cookies_option', 'option');
  }

  /**
   * Get cookies field from option
   *
   * @return void
   */
  function get_cookies_field($key)
  {
    return get_field($key, 'option');
  }

  /**
   * Display Cookies Bar
   *
   * @return void
   */
  function get_cookies_bar()
  {
    if (function_exists('pll__')) {
      $content = pll__(get_cookies_field('cookies_content'));
      $cookies_button_title = pll__(get_cookies_field('cookies_button_title'));
    } else {
      $content = get_cookies_field('cookies_content');
      $cookies_button_title = get_cookies_field('cookies_button_title');
    }

    $button = sprintf('<span class="new-cookies-button">%s</span>', $cookies_button_title);
    $html = PHP_EOL . "<!-- Cookies Bar -->
        <div class='new-cookies-content'>
            <div class='container new-cookies-wrap'>
              {$content}
              {$button}
            </div>
          </div>
      </div>
      <!-- # End Cookies Bar -->" . PHP_EOL;

    return $html;
  }

  /**
   * Get Cookies Bar Styles
   *
   * @return void
   */
  function get_cookies_styles()
  {
    $cookies_background = get_cookies_field('cookies_layout_background') ? : '#333';
    $cookies_color = get_cookies_field('cookies_layout_color') ? : '#fff';
    $cookies_button_background = get_cookies_field('cookies_button_background') ? : '#c7c7c7';
    $cookies_button_color = get_cookies_field('cookies_button_color') ? : '#333';
    $cookies_custom_css = get_cookies_field('cookies_custom_css');
    $css = PHP_EOL . "<!-- Cookies Bar Styles -->
        <style>
          .new-cookies-content {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 30px 0;
            text-align: center;
            background: {$cookies_background};
            color: {$cookies_color};
            z-index: 99999;
            -webkit-transition: all .3s linear;
            transition: all .3s linear;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
          }
          .new-cookies-content.cookies-active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
          }
          .new-cookies-content .new-cookies-wrap {
            max-width: 600px;
            margin: 0 auto;
            overflow: hidden;
            padding-left: 15px;
            padding-right: 15px;
          }
          .new-cookies-content p {
            margin: 0 0 20px;
            color: inherit;
          }
          .new-cookies-content .new-cookies-button {
            background: {$cookies_button_background};
            color: {$cookies_button_color};
            padding: 10px 20px;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.2;
            display: inline-block;
            vertical-align: top;
            border-radius: 2px;
            cursor: pointer;
          }
          {$cookies_custom_css}
        </style>
        <!-- # End Cookies Bar Styles -->" . PHP_EOL;

    return $css;
  }

  /**
   * Get Cookies Bar Scripts
   *
   * @return void
   */
  function get_cookies_scripts()
  {
    $scripts = PHP_EOL . '<!-- Cookies Bar Scripts -->
        <script>!function(e){var n=!1;if("function"==typeof define&&define.amd&&(define(e),n=!0),"object"==typeof exports&&(module.exports=e(),n=!0),!n){var o=window.Cookies,t=window.Cookies=e();t.noConflict=function(){return window.Cookies=o,t}}}(function(){function g(){for(var e=0,n={};e<arguments.length;e++){var o=arguments[e];for(var t in o)n[t]=o[t]}return n}return function e(l){function C(e,n,o){var t;if("undefined"!=typeof document){if(1<arguments.length){if("number"==typeof(o=g({path:"/"},C.defaults,o)).expires){var r=new Date;r.setMilliseconds(r.getMilliseconds()+864e5*o.expires),o.expires=r}o.expires=o.expires?o.expires.toUTCString():"";try{t=JSON.stringify(n),/^[\{\[]/.test(t)&&(n=t)}catch(e){}n=l.write?l.write(n,e):encodeURIComponent(String(n)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),e=(e=(e=encodeURIComponent(String(e))).replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent)).replace(/[\(\)]/g,escape);var i="";for(var c in o)o[c]&&(i+="; "+c,!0!==o[c]&&(i+="="+o[c]));return document.cookie=e+"="+n+i}e||(t={});for(var a=document.cookie?document.cookie.split("; "):[],s=/(%[0-9A-Z]{2})+/g,f=0;f<a.length;f++){var p=a[f].split("="),d=p.slice(1).join("=");this.json||\'"\'!==d.charAt(0)||(d=d.slice(1,-1));try{var u=p[0].replace(s,decodeURIComponent);if(d=l.read?l.read(d,u):l(d,u)||d.replace(s,decodeURIComponent),this.json)try{d=JSON.parse(d)}catch(e){}if(e===u){t=d;break}e||(t[u]=d)}catch(e){}}return t}}return(C.set=C).get=function(e){return C.call(C,e)},C.getJSON=function(){return C.apply({json:!0},[].slice.call(arguments))},C.defaults={},C.remove=function(e,n){C(e,"",g(n,{expires:-1}))},C.withConverter=e,C}(function(){})});
        jQuery(function($) {
          // Delay cookie popup
          setTimeout(function () {
            var cookies = Cookies("cookies-agreement");

            // If cookie doesn\'t exist .new-cookies-content.cookies-active
            if (typeof (cookies) == "undefined") {
                $(".new-cookies-content").addClass("cookies-active");
            }

            // Set cookie on click OK
            $(".new-cookies-button").click(function () {
                $(".new-cookies-content").toggleClass("cookies-active");
                Cookies("cookies-agreement", "true", {
                    expires: null,
                    path: "/"
                });
            });
          }, 800);

        });
        </script>
        <!-- # End Cookies Bar Scripts -->' . PHP_EOL;

    return $scripts;
  }

  /**
   * If cookies bar is enable
   * Display cookies bar in footer
   * Add styles on header
   */
  if (enable_cookies_bar()) {
    function hook_cookies_style()
    {
      echo get_cookies_styles();
    }
    add_action('wp_head', 'hook_cookies_style');

    function hook_cookies_scripts()
    {
      echo get_cookies_bar();
      echo get_cookies_scripts();
    }
    add_action('wp_footer', 'hook_cookies_scripts', 100000);
  }

  /**
   * Check if  GDPR is enabled
   *
   * @return bool
   */
  function enable_gdpr()
  {
    return (bool)get_field('enable_gdpr_option', 'option');
  }

  /**
   * Check if polylang plugin is active
   * Apply polylang related filters and methods
   */
  if (in_array(
    'polylang/polylang.php',
    apply_filters('active_plugins', get_option('active_plugins'))
  )) {
    /**
     * Ploylang String Translations
     *
     * @return void
     */
    function gdrp_cookies_strings()
    {
      pll_register_string('cookies_content', get_field('cookies_content', 'option'), 'polylang', true);
      pll_register_string('cookies_button_title', get_field('cookies_button_title', 'option'));
      if (enable_gdpr()) {
        pll_register_string('gdpr_title', get_field('gdpr_title', 'option'));
        pll_register_string('gdpr_content', get_field('gdpr_content', 'option'), 'polylang', true);
        pll_register_string('gdpr_button_title', get_field('gdpr_button_title', 'option'));
      }
    }
    add_action('init', 'gdrp_cookies_strings');
  }

  /**
   * Display Cookies Bar
   *
   * @return void
   */
  function get_gdpr_popup()
  {
    if (function_exists('pll__')) {
      $gdpr_title = pll__(get_cookies_field('gdpr_title'));
      $gdpr_content = pll__(get_cookies_field('gdpr_content'));
      $gdpr_button_title = pll__(get_cookies_field('gdpr_button_title'));
    } else {
      $gdpr_title = get_cookies_field('gdpr_title');
      $gdpr_content = get_cookies_field('gdpr_content');
      $gdpr_button_title = get_cookies_field('gdpr_button_title');
    }

    $gdpr_button = sprintf('<span class="new-gdpr-button">%s</span>', $gdpr_button_title);
    $popup_id = uniqid();
    $html = PHP_EOL . "<!-- GDPR Popup -->
        <div class='new-gdpr-popup' data-popup-id='{$popup_id}'>
          <span class='gdpr-popup-overlay'></span>
          <div class='new-gdpr-wrap'>
            <span class='gdpr-close' data-target='{$popup_id}'></span>
            <h2>{$gdpr_title}</h2>
            {$gdpr_content}
            <div class='gdpr-btn-holder'>{$gdpr_button}</div>
          </div>
        </div>
        <!-- # End GDPR Popup -->" . PHP_EOL;

    return $html;
  }

  /**
   * Get GDPR Popup Styles
   *
   * @return void
   */
  function get_gdpr_styles()
  {
    $gdpr_layout_background = get_field('gdpr_layout_background', 'option') ? : '#333';
    $gdpr_layout_opacity = get_field('gdpr_layout_opacity', 'option') ? (int) get_field('gdpr_layout_opacity', 'option') : 50;
    $gdpr_button_background = get_field('gdpr_button_background', 'option') ? : '#44b93c';
    $gdpr_button_color = get_field('gdpr_button_color', 'option') ? : '#fff';
    $gdpr_custom_css = get_field('gdpr_custom_css', 'option');
    $opacity = (int) $gdpr_layout_opacity * 0.01;
    $css = PHP_EOL . "<!-- GDPR Popup Styles -->
        <style>
          .new-gdpr-popup {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            text-align: center;
            color: #fff;
            z-index: 99999;
            -webkit-transition: all .3s linear;
            transition: all .3s linear;
            -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
            font-size: 16px;
            line-height: 1.4;
            padding: 0 15px;
            opacity: 0;
            visibility: hidden;
          }
          .new-gdpr-popup:after {
            content: '';
            display: inline-block;
            vertical-align: middle;
            height: 100%;
          }
          .gdpr-popup-overlay {
            background: {$gdpr_layout_background};
            opacity: {$opacity};
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
          }
          .popup-active .new-gdpr-popup {
            opacity: 1;
            visibility: visible;
          }
          .new-gdpr-popup .new-gdpr-wrap {
            display: inline-block;
            vertical-align: middle;
            width: 90%;
            max-width: 500px;
            background: #fff;
            border-radius: 2px;
            margin: 0 auto;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 40px 30px 30px;
            max-height: 80%;
            position: relative;
            z-index: 2;
            text-align: left;
          }
          .new-gdpr-popup h2 {
            margin: 0 0 15px;
            color: #333;
          }
          .new-gdpr-popup p {
            margin: 0 0 20px;
            font-size: inherit;
            line-height: inherit;
            color: #333;
          }
          .new-gdpr-popup .gdpr-close {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 16px;
            height: 16px;
            cursor: pointer;
          }
          .new-gdpr-popup .gdpr-close:after,
          .new-gdpr-popup .gdpr-close:before {
            content: '';
            position: absolute;
            border-radius: 2px;
            background: #333;
            height: 16px;
            width: 2px;
          }
          .new-gdpr-popup .gdpr-close:before {
            transform: translateX(-50%) rotate(45deg);
          }
          .new-gdpr-popup .gdpr-close:after {
            transform: translateX(-50%) rotate(-45deg);
          }
          .new-gdpr-popup .gdpr-close:hover {
            opacity: .8;
          }
          .new-gdpr-popup .gdpr-btn-holder {
            text-align: center;
            padding-top: 10px;
          }
          .new-gdpr-popup .new-gdpr-button {
            background: {$gdpr_button_background};
            color: {$gdpr_button_color};
            padding: 12px 20px;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.2;
            display: inline-block;
            vertical-align: top;
            border-radius: 2px;
            cursor: pointer;
            margin-bottom: 10px;
          }
          .new-gdpr-popup .new-gdpr-button:hover {
            opacity: 0.9;
          }
          .gdpr-checkbox > label,
          .gdpr-checkbox .ginput_container_checkbox > label {
            display: none !important;
          }
          .gdpr-checkbox label a {
            text-decoration: underline;
          }
          {$gdpr_custom_css}
        </style>
        <!-- # End GDPR Popup Styles -->" . PHP_EOL;

    return $css;
  }

  /**
   * Get GDPR Popup Scripts
   *
   * @return void
   */
  function get_gdpr_scripts()
  {
    $scripts = PHP_EOL . '<!-- GDPR Popup Scripts -->
        <script>
        jQuery(function($) {

          $(document).on("click", "a[href=\'#gdpr-popup\']", function(e) {
            e.preventDefault();
            $("body").addClass("popup-active");
          });

          $(".new-gdpr-popup .gdpr-close, .new-gdpr-popup .new-gdpr-button").on("click", function(e) {
            e.preventDefault();
            $("body").removeClass("popup-active");
          });

        });
        </script>
        <!-- # End GDPR Popup Scripts -->' . PHP_EOL;

    return $scripts;
  }

  /**
   * If GDPR Pupup is enable
   * Display Popup in footer
   * Add styles on header
   */
  if (enable_gdpr()) {
    function hook_gdpr_style()
    {
      echo get_gdpr_styles();
    }
    add_action('wp_head', 'hook_gdpr_style');

    function hook_gdpr_scripts()
    {
      echo get_gdpr_popup();
      echo get_gdpr_scripts();
    }
    add_action('wp_footer', 'hook_gdpr_scripts', 100000);
  }
}
