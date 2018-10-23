<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_volunteers',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'volunteers',
    'type' => 'volunteers'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    return [
      'title' => $entry->title,
      'url' => $entry->url,
      'portrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->getUrl('thumbFullRatio') : null,
      'jobTitle' => (string) $entry->jobTitle,
      'bio' => (string) $entry->bio,
      'email' => (string) $entry->emailAddress,
      'department' => ! empty($entry->departmentOfficialBoardCommission->one()) ? (string) $entry->departmentOfficialBoardCommission->one()->title : null,
    ];
  },
];
