<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_documents',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'documents'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    $types = [];
    foreach($entry->documentType as $value)
      $types[] = $value->title;
    return [
      'title' => $entry->title,
      'url' => $entry->url,
      'summary' => (string) $entry->summary,
      'categories' => $types,
    ];
  },
];
