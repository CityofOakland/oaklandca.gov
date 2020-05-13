<?php
  return [
    '*' => [
      'transformer' => 'imgix',
      'imagerSystemPath' => '@webroot/assets/imager/',
      'imagerUrl' => '/assets/imager/',
      'allowUpscale' => false,
      'removeMetadata' => true,
      'convertToRGB' => true,
      'useForNativeTransforms' => true,
      'useForCpThumbs' => true,
      'imgixProfile' => 'default',
      'imgixApiKey' => getenv('IMGOPT_IMGIX_API'),
      'imgixEnableAutoPurging' => true,
      'imgixEnablePurgeElementAction' => true,
      'imgixConfig' => [
        'default' => [
          'domains' => [getenv('IMGOPT_IMGIX_SOURCE_DOMAIN')],
          'useHttps' => true,
          'getExternalImageDimensions' => true,
          'defaultParams' => ['auto'=>'compress,format', 'q'=>80],
        ]
      ]
    ]
  ];