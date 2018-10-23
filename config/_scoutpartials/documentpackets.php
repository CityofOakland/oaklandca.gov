<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_documents',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'documentPackets'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    $documents = [];
    foreach($entry->documents as $value)
      $documents[] = $value->title;
    return [
      'title' => $entry->title,
      'url' => $entry->url,
      'leadIn' => (string) $entry->leadIn,
      'summary' => (string) $entry->summary,
      'documents' => $documents,
    ];
  },
];
