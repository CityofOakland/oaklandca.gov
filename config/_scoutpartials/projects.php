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
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->getUrl('thumbFullRatio') : null,
      'leadIn' => (string) $entry->leadIn,
      'about' => (string) $entry->about,
    ];
  },
];
