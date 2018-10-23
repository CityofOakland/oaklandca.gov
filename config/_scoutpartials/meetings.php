<?php

return [
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
