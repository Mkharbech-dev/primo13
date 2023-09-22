<?php

/**
 * @file
 * Functions to support Ceps theme settings.
 */

use Drupal\Core\Form\FormStateInterface;
/**
 * @file
 * Custom setting for CCAS - ceps theme.
 */
function ceps_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {
  $img_path = $GLOBALS['base_url'] . '/' . \Drupal::service('extension.list.theme')->getPath('ceps') . '/assets/images/ceps.png';
  $img = '<img src="'.$img_path.'" alt="ccas - ceps" />';
  $form['ceps'] = [
    '#type'       => 'vertical_tabs',
    '#title'      => '<h3>' . t('CEPS Theme Settings') . '</h3>',
    '#default_tab' => 'general',
  ];

  // General settings tab.
  $form['general'] = [
    '#type'  => 'details',
    '#title' => t('General'),
    '#description' => t('<h3>You are using CCAS-CEPS Theme</h3>This theme is Drupal 9, 10 compatible'),
    '#group' => 'ceps',
  ];

  //big menu
  $form['big_menu'] = [
    '#type'  => 'details',
    '#title' => t('Big menu'),
    '#group' => 'ceps',
  ];

  // Social tab.
  $form['social'] = [
    '#type'  => 'details',
    '#title' => t('Social'),
    '#description' => t('Social icons settings. These icons appear in header and footer region.'),
    '#group' => 'ceps',
  ];

  // Slider tab.
  $form['slider'] = [
    '#type'  => 'details',
    '#title' => t('Homepage Slider'),
    '#description' => t('<h3>Manage Homepage Slider</h3>'),
    '#group' => 'ceps',
  ];

  // Header tab.
  $form['header'] = [
    '#type'  => 'details',
    '#title' => t('Header'),
    '#group' => 'ceps',
  ];

  // Footer tab.
  $form['footer'] = [
    '#type'  => 'details',
    '#title' => t('Footer'),
    '#group' => 'ceps',
  ];

  // Insert codes
  $form['insert_codes'] = [
    '#type'  => 'details',
    '#title' => t('Insert Codes'),
    '#group' => 'ceps',
  ];

  // Settings under social tab.
  // Show or hide all icons.
  $form['big_menu']['allow_big_menu'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Activate the Big menu'),
  ];
  $form['big_menu']['allow_big_menu']['big_menu_show'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show Big menu in header section'),
    '#default_value' => theme_get_setting('big_menu_show', 'ceps'),
    '#description'   => t("Check this option to show Big menu in top header section. Uncheck to hide."),
  ];

  $form['social']['all_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Social Icons'),
  ];

  $form['social']['all_icons']['all_icons_show'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show social icons in header and footer'),
    '#default_value' => theme_get_setting('all_icons_show', 'ceps'),
    '#description'   => t("Check this option to show social icons in header and footer. Uncheck to hide."),
  ];

  $form['social']['only_header_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Social Icons only in header'),
    '#description'   => t('This feature show Social Icons only in header'),
  ];
  $form['social']['only_header_icons']['only_header_icons_show'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show social icons only in header'),
    '#default_value' => theme_get_setting('only_header_icons_show', 'ceps'),
    '#description'   => t("Check this option to show social icons in header. Uncheck to hide."),
  ];

  $form['social']['only_footer_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Social Icons only in footer'),
    '#description'   => t('This feature show Social Icons only in footer'),
  ];
  $form['social']['only_footer_icons']['only_footer_icons_show'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show social icons only in footer'),
    '#default_value' => theme_get_setting('only_footer_icons_show', 'ceps'),
    '#description'   => t("Check this option to show social icons in footer. Uncheck to hide."),
  ];

  // Facebook.
  $form['social']['facebook'] = [
    '#type'        => 'details',
    '#title'       => t("Facebook"),
  ];

  $form['social']['facebook']['facebook_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Facebook Url'),
    '#description'   => t("Enter yours facebook profile or page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('facebook_url', 'ceps'),
  ];

  // Twitter.
  $form['social']['twitter'] = [
    '#type'        => 'details',
    '#title'       => t("Twitter"),
  ];

  $form['social']['twitter']['twitter_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Twitter Url'),
    '#description'   => t("Enter yours twitter page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('twitter_url', 'ceps'),
  ];

  // Instagram.
  $form['social']['instagram'] = [
    '#type'        => 'details',
    '#title'       => t("Instagram"),
  ];

  $form['social']['instagram']['instagram_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Instagram Url'),
    '#description'   => t("Enter yours instagram page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('instagram_url', 'ceps'),
  ];

  // Linkedin.
  $form['social']['linkedin'] = [
    '#type'        => 'details',
    '#title'       => t("Linkedin"),
  ];

  $form['social']['linkedin']['linkedin_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Linkedin Url'),
    '#description'   => t("Enter yours linkedin page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('linkedin_url', 'ceps'),
  ];

  // YouTube.
  $form['social']['youtube'] = [
    '#type'        => 'details',
    '#title'       => t("YouTube"),
  ];

  $form['social']['youtube']['youtube_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('YouTube Url'),
    '#description'   => t("Enter yours youtube.com page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('youtube_url', 'ceps'),
  ];

  // Vimeo.
  $form['social']['vimeo'] = [
    '#type'        => 'details',
    '#title'       => t("Vimeo"),
  ];

  $form['social']['vimeo']['vimeo_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('YouTube Url'),
    '#description'   => t("Enter yours vimeo.com page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('vimeo_url', 'ceps'),
  ];

  // Social -> whatsapp.
  $form['social']['whatsapp'] = [
    '#type'        => 'details',
    '#title'       => t("whatsapp"),
  ];
  $form['social']['whatsapp']['whatsapp_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('WhatsApp'),
    '#description'   => t("Enter yours whatsapp url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('whatsapp_url', 'ceps'),
  ];

  // Social -> telegram.
  $form['social']['telegram'] = [
    '#type'        => 'details',
    '#title'       => t("Telegram"),
  ];
  $form['social']['telegram']['telegram_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Telegram'),
    '#description'   => t("Enter yours telegram url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('telegram_url', 'ceps'),
  ];

  /**
   * Slider Settings
   */
  // Show or hide slider on homepage.
  $form['slider']['slider_enable_option'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Enable Slider'),
  ];

  $form['slider']['slider_enable_option']['slider_show'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show Slider on Homepage'),
    '#default_value' => theme_get_setting('slider_show', 'ceps'),
    '#description'   => t("Check this option to show slider on homepage. Uncheck to hide."),
  ];
  /* Slider -> Image upload */
  $form['slider']['slider_image_section'] = [
    '#type'          => 'fieldset',
    '#title'         => t('Slider Background Image'),
  ];
  $form['slider']['slider_image_section']['slider_image'] = [
    '#type'          => 'managed_file',
    '#upload_location' => 'public://',
    '#upload_validators' => [
      'file_validate_extensions' => ['gif png jpg jpeg svg'],
    ],
    '#title'  => t('<p>Upload Slider Image</p>'),
    '#default_value'  => theme_get_setting('slider_image', 'ceps'),
    '#description'   => t('ceps theme has limitation of single image for slider.'),
  ];
  $form['slider']['slider_time_field'] = [
    '#type'          => 'fieldset',
    '#title'         => t('Autoplay Interval Time'),
  ];
  $form['slider']['slider_time_field']['slider_time'] = [
    '#type'          => 'number',
    '#default_value' => theme_get_setting('slider_time', 'ceps'),
    '#title'         => t('Enter slider interval time between two slides'),
    '#description'   => t('Time interval between two slides. Default value is 5000, this means 5 seconds.'),
  ];

  $form['slider']['slider_dots_field'] = [
    '#type'          => 'fieldset',
    '#title'         => t('Slider Dots Navigation'),
  ];

  $form['slider']['slider_dots_field']['slider_dots'] = [
    '#type'          => 'select',
    '#title'         => t('Show or Hide Slider Dots Navigation'),
    '#options' => [
      'true' => t('Show'),
      'false' => t('Hide'),
    ],
    '#default_value' => theme_get_setting('slider_dots', 'ceps'),
    '#description'   => t('Show or hide slider dots navigation that appears at the bottom of slider.'),
  ];
  $form['slider']['slider_dots_field']['slider_nav'] = [
    '#type'          => 'select',
    '#title'         => t('Show or Hide Slider default Navigation'),
    '#options' => [
      'true' => t('Show'),
      'false' => t('Hide'),
    ],
    '#default_value' => theme_get_setting('slider_nav', 'ceps'),
    '#description'   => t('Show or hide slider default navigation.'),
  ];

  $form['slider']['slider_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('Slider Code'),
    '#default_value' => theme_get_setting('slider_code', 'ceps'),
    '#description'   => t('Exemple: <br/><pre>
            &lt;li&gt;
              &lt;h1&gtSlider Heading One&lt;/h1&gt;
              &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit &lt;/p&gt;
              &lt;br&gt;
              &lt;a class="button" href="#">read more&lt;/a&gt;
            &lt;/li&gt;
            </pre>
            <br/>
            <pre>
            &lt;li&gt;
              &lt;h1&gtSlider Heading Two&lt;/h1&gt;
              &lt;p&gtLorem ipsum dolor sit amet, consectetur adipiscing elit&lt;/p&gt;
              &lt;br&gt;
              &lt;a class="button" href="#"&gtread more&lt;/a&gt;
            &lt;/li&gt;
            </pre>'
    ),
  ];

  // Settings under header tab.
  $form['header']['custom_header'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Custom Header'),
  ];
  $form['header']['custom_header']['enable_custom_header'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show Custom Header On Homepage'),
    '#default_value' => theme_get_setting('enable_custom_header', 'ceps'),
    '#description'   => t('Check this option to enable a custom Header on homepage.'),
    '#attributes' => [
      'name' => 'enable_custom_header',
    ],
  ];
  $form['header']['custom_header']['custom_page_header'] = [
    '#type'          => 'textarea',
    '#title'         => t('Custom Page header'),
    '#default_value' => theme_get_setting('custom_page_header', 'ceps'),
    '#disabled' => 'disabled',
    '#states' => [
      'enabled' => [
        ':input[name="enable_custom_header"]' => ['checked' => TRUE],
      ],
      'visible' => [
        ':input[name="enable_custom_header"]' => ['checked' => TRUE],
      ],
      'invisible' => [
        ':input[name="enable_custom_header"]' => ['checked' => FALSE],
      ],
      'disabled' => [
        ':input[name="enable_custom_header"]' => ['checked' => FALSE],
      ],
    ],
  ];

  // Settings under footer tab.
  // Scroll to top.
  $form['footer']['scrolltotop'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Scroll To Top'),
  ];

  $form['footer']['scrolltotop']['scrolltotop_on'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable scroll to top feature.'),
    '#default_value' => theme_get_setting('scrolltotop_on', 'ceps'),
    '#description'   => t("Check this option to enable scroll to top feature. Uncheck to disable this fearure and hide scroll to top icon."),
  ];

  // Footer -> Copyright.
  $form['footer']['copyright'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Website Copyright Text'),
  ];

  $form['footer']['copyright']['copyright_text'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show website copyright text in footer.'),
    '#default_value' => theme_get_setting('copyright_text', 'ceps'),
    '#description'   => t("Check this option to show website copyright text in footer. Uncheck to hide."),
    '#attributes' => [
      'name' => 'copyright_text',
    ],
  ];

  // Footer -> Copyright -> custom copyright text
  $form['footer']['copyright']['copyright_custom'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Custom Copyright Text'),
    '#states' => [
      'visible' => [
        ':input[name="copyright_text"]' => ['checked' => TRUE],
      ],
      'invisible' => [
        ':input[name="copyright_text"]' => ['checked' => FALSE],
      ],
      'disabled' => [
        ':input[name="copyright_text"]' => ['checked' => FALSE],
      ],
    ],
  ];
  $form['footer']['copyright']['copyright_custom']['enable_copyright_text_custom'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show website copyright custom text in footer.'),
    '#default_value' => theme_get_setting('enable_copyright_text_custom', 'ceps'),
    '#description'   => t("Check this option to show website custom copyright text in footer. Uncheck to hide."),
    '#attributes' => [
      'name' => 'enable_copyright_text_custom',
    ],
  ];
  $form['footer']['copyright']['copyright_custom']['copyright_text_custom'] = [
    '#type'          => 'textarea',
    '#title'         => t('Custom copyright text'),
    '#default_value' => theme_get_setting('copyright_text_custom', 'ceps'),
    '#states' => [
      'enabled' => [
        ':input[name="enable_copyright_text_custom"]' => ['checked' => TRUE],
      ],
      'visible' => [
        ':input[name="enable_copyright_text_custom"]' => ['checked' => TRUE],
      ],
      'invisible' => [
        ':input[name="enable_copyright_text_custom"]' => ['checked' => FALSE],
      ],
      'disabled' => [
        ':input[name="enable_copyright_text_custom"]' => ['checked' => FALSE],
      ],
      /*'empty' => [
        ':input[name="enable_copyright_text_custom"]' => ['checked' => FALSE],
      ],*/
    ],
  ];

  /**
   * Insert Codes
   */
  $form['insert_codes']['insert_codes_tab'] = [
    '#type'  => 'vertical_tabs',
  ];
  // Insert Codes -> Head
  $form['insert_codes']['head'] = [
    '#type'        => 'details',
    '#title'       => t('Head'),
    '#description' => t('<h3>Insert Codes Before &lt;/HEAD&gt;</h3><hr />'),
    '#group' => 'insert_codes_tab',
  ];
  // Insert Codes -> Head -> Head codes
  $form['insert_codes']['head']['insert_head'] = [
    '#type'          => 'fieldset',
    '#description'   => t('Addtional header code'),
  ];
  $form['insert_codes']['head']['insert_head']['head_custom_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('Addtional CSS Codes'),
    '#default_value' => theme_get_setting('css_code', 'ceps'),
    '#description'   => t('Add your own JS/Metatags codes in the header section.'),
  ];

  // Insert Codes -> CSS
  $form['insert_codes']['css'] = [
    '#type'        => 'details',
    '#title'       => t('CSS Codes'),
    '#group'       => 'insert_codes_tab',
  ];
  // Insert Codes -> css
  $form['insert_codes']['css']['css_custom'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Addtional CSS'),
  ];
  $form['insert_codes']['css']['css_custom']['css_extra'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable Addtional CSS'),
    '#default_value' => theme_get_setting('css_extra', 'ceps'),
    '#description'   => t("Check this option to enable additional styling / css. Uncheck to disable this feature."),
  ];
  $form['insert_codes']['css']['css_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('Addtional CSS Codes'),
    '#default_value' => theme_get_setting('css_code', 'ceps'),
    '#description'   => t('Add your own CSS codes here to customize the appearance of your site. Please refer to this tutorial for detail: <a href="https://drupar.com/ceps-theme-documentation/custom-css" target="_blank">Custom CSS</a>'),
  ];

  // End form.
}
