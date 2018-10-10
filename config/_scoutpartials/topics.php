<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_topics',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'topics'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    return [
      'title' => $entry->title,
      'id' => $entry->id,
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
      'leadIn' => (string) $entry->leadIn,
      'about' => (string) $entry->about,
    ];
  },
];
