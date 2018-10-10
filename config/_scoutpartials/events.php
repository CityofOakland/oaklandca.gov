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
      'id' => $event->id,
      'url' => $event->url,
      'eventImage' => ! empty($event->eventImage->one()) ? (string) $event->eventImage->one()->url : null,
      'body' => (string) $event->body,
      'contact' => (string) $event->eventContact,
    ];
  },
];
