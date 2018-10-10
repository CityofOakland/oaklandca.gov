<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_staff',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'staff',
    'type' => 'staff'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    return [
      'title' => $entry->title,
      'url' => $entry->url,
      'portrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->url : null,
      'jobTitle' => ! empty($entry->jobTitle ? (string) $entry->jobTitle : (string) $entry->staffImportJobTitle),
      'bio' => (string) $entry->bio,
      'email' => ! empty($entry->emailAddress ? (string) $entry->emailAddress : (string) $entry->staffImportEmail),
      'department' => ! empty($entry->departments->one()) ? (string) $entry->departments->one()->title : null,
      'employmentType' => (string) $entry->employmentType->label,
    ];
  },
];
