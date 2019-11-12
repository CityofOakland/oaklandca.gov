<?php
  return [
  // Global settings
  '*' => [
    // If `devMode` is on, use webpack-dev-server to all for HMR (hot module reloading)
    'useDevServer' => false,
    // The JavaScript entry from the manifest.json to inject on Twig error pages
    'errorEntry' => '',
    // Manifest file names
    'manifest' => [
      'legacy' => 'mix-manifest.json',
      'modern' => 'mix-manifest.json',
    ],
    // Public server config
    'server' => [
      'manifestPath' => '@webroot/assets/',
      'publicPath' => '@web/assets/',
    ],
    // webpack-dev-server config
    'devServer' => [
      'manifestPath' => 'http://oakland.test:8080/assets/',
      'publicPath' => 'http://oakland.test:8080/assets/',
    ],
    // Local files config
    'localFiles' => [
      'basePath' => '@webroot/assets/',
      'criticalPrefix' => '',
      'criticalSuffix' => '_critical.min.css',
    ],
  ],
  // Live (production) environment
  'live' => [
  ],
  // Staging (pre-production) environment
  'staging' => [
  ],
  // Local (development) environment
  'local' => [
    // If `devMode` is on, use webpack-dev-server to all for HMR (hot module reloading)
    'useDevServer' => true,
  ],
];