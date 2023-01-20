// obtain plugin
var cc = initCookieConsent();

const analytics = WPVars.analytics;

// run plugin with your configuration
cc.run({
  current_lang: 'en',
  autoclear_cookies: true, // default: false
  page_scripts: true, // default: false
  remove_cookie_tables: true,

  // mode: 'opt-in'                          // default: 'opt-in'; value: 'opt-in' or 'opt-out'
  // delay: 0,                               // default: 0
  // auto_language: null                     // default: null; could also be 'browser' or 'document'
  // autorun: true,                          // default: true
  // force_consent: false,                   // default: false
  // hide_from_bots: false,                  // default: false
  // remove_cookie_tables: false             // default: false
  // cookie_name: 'cc_cookie',               // default: 'cc_cookie'
  // cookie_expiration: 182,                 // default: 182 (days)
  // cookie_necessary_only_expiration: 182   // default: disabled
  // cookie_domain: location.hostname,       // default: current domain
  // cookie_path: '/',                       // default: root
  // cookie_same_site: 'Lax',                // default: 'Lax'
  // use_rfc_cookie: false,                  // default: false
  // revision: 0,                            // default: 0

  onFirstAction: function (user_preferences, cookie) {
    // callback triggered only once
  },

  onAccept: function (cookie) {
    if (cc.allowedCategory('analytics')) {
      console.log('Accept Clarity cookies');
      window.clarity('consent');
    }
  },

  onChange: function (cookie, changed_preferences) {
    // ...
  },

  gui_options: {
    consent_modal: {
      layout: 'box', // box/cloud/bar
      position: 'bottom right', // bottom/middle/top + left/right/center
      transition: 'slide', // zoom/slide
      swap_buttons: false, // enable to invert buttons
    },
    settings_modal: {
      layout: 'box', // box/bar
      position: 'left', // left/right
      transition: 'slide', // zoom/slide
    },
  },

  languages: {
    en: {
      consent_modal: {
        title: 'We use cookies!',
        description:
          'Hi, this website uses essential cookies to ensure its proper operation if you are a logged in user or attempting to log in. Some third-party cookies from YouTube to display videos will be set when viewing the embedded media content. <button type="button" data-cc="c-settings" class="cc-link">More information</button>',
        primary_btn: {
          text: 'Accept & Close',
          role: 'accept_all', // 'accept_selected' or 'accept_all'
        },
        secondary_btn: {
          text: 'Reject all',
          role: 'accept_necessary', // 'settings' or 'accept_necessary'
        },
      },
      settings_modal: {
        title: 'Cookie preferences',
        save_settings_btn: 'Save settings',
        accept_all_btn: 'Accept & Close',
        reject_all_btn: 'Reject all',
        close_btn_label: 'Close',
        cookie_table_headers: [
          { col1: 'Name' },
          { col2: 'Domain' },
          { col3: 'Expiration' },
          { col4: 'Description' },
        ],
        blocks: [
          {
            title: 'Cookie usage 📢',
            description: `We use cookies to ensure the basic functionalities of the website and to enhance the online experience for logged in users. On the front-end of the website, cookies will be set on your device if you leave a comment on an article and check the box consenting to this. A cookie to check whether a user's browser accepts cookies is also set when a user attempts to log in. Aside from this, No cookies are set for non-logged in users or those who have not attempted to log in. For more details relative to cookies and other sensitive data, please read the full <a href="
              ${WPVars.privacy_page}" class="cc-link">privacy policy</a>.`,
          },
          {
            title: 'Strictly necessary cookies',
            description:
              'These cookies are essential for the proper functioning of this website. Without these cookies, the website may not work properly.',
            toggle: {
              value: 'necessary',
              enabled: true,
              readonly: false, // cookie categories with readonly=true are all treated as "necessary cookies"
            },
            cookie_table: [
              // list of all expected cookies
              {
                col1: 'wordpress_test_cookie',
                col2: location.hostname,
                col3: 'Session',
                col4: "A cookie to check whether a user's browser accepts cookies is also set on the login screen before logging in",
                is_regex: true,
              },
              {
                col1: '^wordpress_', // match all cookies starting with "wordpress_"
                col2: location.hostname,
                col3: '',
                col4: '',
                is_regex: true,
              },
              {
                col1: '^wordpress-', // match all cookies starting with "wordpress-"
                col2: location.hostname,
                col3: '',
                col4: '',
                is_regex: true,
              },
              {
                col1: '^wp_', // match all cookies starting with "wp_"
                col2: location.hostname,
                col3: '',
                col4: '',
                is_regex: true,
              },
              {
                col1: '^wp-', // match all cookies starting with "wp-"
                col2: location.hostname,
                col3: '',
                col4: '',
                is_regex: true,
              },
            ],
          },
          {
            title: `${analytics ? 'Performance and Analytics cookies' : ''}`,
            description:
              'These cookies allow the website to remember the choices you have made in the past',
            toggle: {
              value: 'analytics', // your cookie category
              enabled: false,
              readonly: false,
            },
            cookie_table: [
              // list of all expected cookies
              {
                col1: '^_ga', // match all cookies starting with "_ga"
                col2: 'google.com',
                col3: '2 years',
                col4: 'description ...',
                is_regex: true,
              },
              {
                col1: '_gid',
                col2: 'google.com',
                col3: '1 day',
                col4: 'description ...',
              },
            ],
          },
          // {
          //   title: 'Advertisement and Targeting cookies',
          //   description:
          //     'These cookies collect information about how you use the website, which pages you visited and which links you clicked on. All of the data is anonymized and cannot be used to identify you',
          //   toggle: {
          //     value: 'targeting',
          //     enabled: false,
          //     readonly: false,
          //   },
          // },
          {
            title: 'More information',
            description: `For any queries in relation to our policy on cookies and your choices, please <a class="cc-link" href="${WPVars.contact_page}">contact us</a>.`,
          },
        ],
      },
    },
  },
});
