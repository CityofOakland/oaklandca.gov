<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_news',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'news'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    return [
      'title' => $entry->title,
      'url' => $entry->url,
      'newsImage' => ! empty($entry->newsImage->one()) ? (string) $entry->newsImage->one()->getUrl('thumbFullRatio') : null,
      'summary' => (string) $entry->summary,
      'body' => (string) $entry->body,
      'mediaContact' => (string) $entry->mediaContact,
    ];
  },
];
