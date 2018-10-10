<?php
use craft\helpers\UrlHelper;

return [
  'indexName' => getenv('ENVIRONMENT') . '_services',
  'elementType' => \craft\elements\Entry::class,
  'criteria' => [
    'section' => 'services',
    'type' => 'services311'
  ],
  'transformer' => function(craft\elements\Entry $entry) {
    return [
      'title' => $entry->title,
      'url' => UrlHelper::siteUrl($entry->url),
      'banner' => ! empty($entry->banner->one()) ? (string) UrlHelper::siteUrl($entry->banner->one()->url) : null,
      'leadIn' => (string) $entry->leadIn,
      'body' => (string) $entry->body,
      'urgentIssuesDescription' => (string) $entry->urgentIssuesDescription,
      'nonUrgentIssuesDescription' => (string) $entry->nonUrgentIssuesDescription,
    ];
  },
];
