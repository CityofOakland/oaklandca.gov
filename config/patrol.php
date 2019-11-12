<?php

// Move to config/patrol.php if you'd like to customize settings
// Note that once moved to config/patrol.php those settings will take precedence over those set via the UI
return [
  '*' => [                                                                      
      'primaryDomain' => null,
      'redirectStatusCode' => 302,

      'sslRoutingBaseUrl' => "https://www.oaklandca.gov",
      'sslRoutingEnabled' => true,
      'sslRoutingRestrictedUrls' => ['/'],

      'maintenanceModeEnabled' => false,
      'maintenanceModePageUrl' => '/offline',
      'maintenanceModeAuthorizedIps' => ['::1', '127.0.0.1'],
      'maintenanceModeResponseStatusCode' => 410,
  ],
  'dev' => [
      'sslRoutingEnabled' => false,
  ],
  'production' => [
      'redirectStatusCode' => 301,
      'maintenanceModeResponseStatusCode' => 503,
  ]
];