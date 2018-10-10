<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_departments',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'departments',
    'type' => 'cityCouncil'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    $officials = [];
    foreach($entry->pageOfficials as $value)
      $officials[] = [$value->title, $value->groupHeadName];
    return [
      'title' => $entry->title,
      'id' => $entry->id,
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
      'ctaButtonText' => ! empty($entry->ctaButton->text) ? (string) $entry->ctaButton->text : null,
      'leadIn' => $entry->leadIn,
      'officials' => $officials,
    ];
  },
];
