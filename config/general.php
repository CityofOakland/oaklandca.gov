<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see craft\config\GeneralConfig
 */

return [
  // Global settings
  '*' => [
    // Default Week Start Day (0 = Sunday, 1 = Monday...)
    'defaultWeekStartDay' => 0,

    // Enable CSRF Protection (recommended)
    'enableCsrfProtection' => true,

    // Whether generated URLs should omit "index.php"
    'omitScriptNameInUrls' => true,

    // Control Panel trigger word
    'cpTrigger' => 'admin',

    // Maximum Upload Size
    'maxUploadFileSize' => 268435456,

    // Stores all Control Panel changes in a `project.yaml` file.
    'useProjectConfigFile' => true,

    // The secure key Craft will use for hashing and encrypting data
    'securityKey' => getenv('SECURITY_KEY'),

    // Sets a maximum number of entry revisions
    'maxRevisions' => 20,

    'extraFileKinds' => [
      // Allows us to use CSV files when uploading to the Excel filetype
      'excel' => [
        'extensions' => ['csv']
      ]
    ],

    'aliases' => [
      '@algoliaAppId' => getenv('ALGOLIA_APP_ID'),
      '@algoliaAdminApi' => getenv('ALGOLIA_ADMIN_API'),
      '@amazonKeyId' => getenv('AMAZON_KEY_ID'),
      '@amazonSecret' => getenv('AMAZON_SECRET'),
    ],
  ],

  // Dev environment settings
  'dev' => [
    // Base site URL
    'siteUrl' => 'https://oakland.test',

    // Dev Mode (see https://craftcms.com/support/dev-mode)
    'devMode' => true,
  ],

  // Staging environment settings
  'staging' => [
    // Base site URL
    'siteUrl' => 'https://staging.oaklandca.dev',
    // Disable project config changes on staging
    'allowAdminChanges' => false,
  ],

  // Production environment settings
  'production' => [
    // Base site URL
    'siteUrl' => 'https://www.oaklandca.gov',
    // Disable project config changes on production
    'allowAdminChanges' => false,
    // Changes the default preview duration from 24 hours to 5 days
    'defaultTokenDuration' => 432000,
  ],
];
