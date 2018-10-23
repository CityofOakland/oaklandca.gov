<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_people',
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
      'url' => $entry->url,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->getUrl('thumbFullRatio') : null,
      'leadIn' => $entry->leadIn,
      'officials' => $officials,
    ];
  },
];
