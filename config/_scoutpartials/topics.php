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
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->getUrl('thumbFullRatio') : null,
      'leadIn' => (string) $entry->leadIn,
      'about' => (string) $entry->about,
    ];
  },
];
