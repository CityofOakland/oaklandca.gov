<?php

return [
  '*' => [
    'pluginName' => 'Feed Imports',
    'cache' => 60,
    'backupLimit' => 10,
    'parseTwig' => false,
    'compareContent' => true,
    'sleepTime' => 0,
    'logging' => true,
    'runGcBeforeFeed' => false,
    'queueTtr' => 300,
    'queueMaxRetry' => 5,
  ]
];