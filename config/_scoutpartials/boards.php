<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_boards',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'boardsCommissions',
    'type' => 'boardsCommissions'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    return [
      'title' => $entry->title,
      'id' => $entry->id,
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
      'ctaButtonText' => ! empty($entry->ctaButton->text) ? (string) $entry->ctaButton->text : null,
      'leadIn' => (string) $entry->leadIn,
      'about' => (string) $entry->about,
    ];
  },
];
