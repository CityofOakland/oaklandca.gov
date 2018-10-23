<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_resources',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'resources',
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    $body = [];
    foreach ($entry->transactionBody as $block) {
      $body[] = (string) $block->text;
    }
    switch ($entry->type) {
      case 'resources':
        return [
          'title' => $entry->title,
          'url' => $entry->url,
          'resourceImage' => ! empty($entry->resourceImage->one()) ? (string) $entry->resourceImage->one()->getUrl('thumbFullRatio') : null,
          'leadIn' => (string) $entry->leadIn,
          'body' => $body,
        ];
        break;

      case 'videos':
        return [
          'title' => $entry->title,
          'url' => $entry->url,
          'leadIn' => (string) $entry->leadIn,
          'body' => $body,
        ];

      default:
        break;
    }
  },
];
