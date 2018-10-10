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
      'id' => $entry->id,
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
      'ctaButtonText' => ! empty($entry->ctaButton->text) ? (string) $entry->ctaButton->text : null,
      'leadIn' => (string) $entry->leadIn,
      'groupHeadName' => (string) $entry->groupHeadName,
      'groupHeadTitle' => (string) $entry->groupHeadTitle,
      'groupHeadBio' => (string) $entry->groupHeadBio,
      'groupHeadPortrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->url : null,
    ];
  },
];
