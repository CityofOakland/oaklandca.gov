<?php

$groupBoards = [
  'indexName' => getenv('ENVIRONMENT') . '_groups',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'boardsCommissions',
    'type' => 'boardsCommissions'
  ],
  'transformer' => function(craft\elements\Entry $entry) {

    return [
      'title' => $entry->title,
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
      'leadIn' => (string) $entry->leadIn,
      'about' => (string) $entry->about,
    ];
  },
];

$groupDepartments = [
  'indexName' => getenv('ENVIRONMENT') . '_groups',
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
    ];
  },
];

return [$groupBoards, $groupDepartments];
