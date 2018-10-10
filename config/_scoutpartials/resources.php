<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_resources',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'resources'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    $body = [];
    foreach ($entry->transactionBody as $block) {
      $body[] = (string) $block->text;
    }
    return [
      'title' => $entry->title,
      'id' => $entry->id,
      'url' => $entry->url,
      'resourceImage' => ! empty($entry->resourceImage->one()) ? (string) $entry->resourceImage->one()->url : null,
      'leadIn' => (string) $entry->leadIn,
      'body' => $body,
    ];
  },
];
