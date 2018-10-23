<?php

return [
  'indexName' => getenv('ENVIRONMENT') . '_events',
  'elementType' => \Solspace\Calendar\Elements\Event::class,
  'criteria' => [
    'calendar' => 'events',
  ],
  'transformer' => function(Solspace\Calendar\Elements\Event $event) {
    return [
      'title' => $event->title,
      'url' => $event->url,
      'eventImage' => ! empty($event->eventImage->one()) ? (string) $event->eventImage->one()->getUrl('thumbFullRatio') : null,
      'body' => (string) $event->body,
      'contact' => (string) $event->eventContact,
    ];
  },
];
[
  'indexName' => getenv('ENVIRONMENT') . '_meetings',
  'elementType' => \Solspace\Calendar\Elements\Event::class,
  'criteria' => [
    'calendar' => 'meetings',
  ],
  'transformer' => function(Solspace\Calendar\Elements\Event $event) {
    return [
      'title' => $event->title,
      'eventImage' => ! empty($event->eventImage->one()) ? (string) $event->eventImage->one()->getUrl('thumbFullRatio') : null,
      'url' => $event->url,
      'body' => (string) $event->body,
      'contact' => (string) $event->eventContact,
    ];
  },
];
