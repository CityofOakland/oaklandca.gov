<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_projects',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'projects'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    $milestones = [];
    foreach ($entry->timeline as $block) {
      $milestones[] = [
        'name' => (string) $block->milestoneName,
        'dates' => (string) $block->milestoneDates
      ];
    }
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
