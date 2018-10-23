<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_departments',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'departments',
    'type' => 'departments'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    return [
      'title' => $entry->title,
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->getUrl('thumbFullRatio') : null,
      'leadIn' => (string) $entry->leadIn,
      'groupHeadName' => (string) $entry->groupHeadName,
      'groupHeadTitle' => (string) $entry->groupHeadTitle,
      'groupHeadBio' => (string) $entry->groupHeadBio,
      'groupHeadPortrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->getUrl('thumbFullRatio') : null,
    ];
  },
];
