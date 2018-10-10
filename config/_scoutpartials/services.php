<?php
use craft\helpers\UrlHelper;

return [
  'indexName' => getenv('ENVIRONMENT') . '_services',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'services',
    'type' => 'services'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    $body = [];
    foreach ($entry->transactionBody as $block) {
      $body[] = (string) $block->text;
    }
    return [
      'title' => $entry->title,
      'url' => Urlhelper::siteUrl($entry->url),
      'leadIn' => (string) $entry->leadIn,
      'body' => $body,
    ];
  },
];
