<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
  'endpoints' => [
    'volunteers.json' => function () {
      return [
        'elementType' => Entry::class,
        'criteria' => [
          'section' => 'volunteers',
        ],
        'transformer' => function (Entry $entry) {
          return [
            'title' => $entry->title,
            'firstName' => $entry->firstName,
            'middleInitial' => $entry->middleInitial,
            'lastName' => $entry->lastName,
            'jobTitle' => $entry->jobTitle,
            'phoneNumber' => $entry->phoneNumber,
            'emailAddress' => $entry->emailAddress,
            'departmentOfficialBoardCommission' => !empty($entry->departmentOfficialBoardCommission->one()) ? (string) $entry->departmentOfficialBoardCommission->one()->title : null,
            'bio' => (string) $entry->bio,
            'portrait' => !empty($entry->portrait->one()) ? (string) $entry->portrait->one()->url : null,

          ];
        },
      ];
    },
    'news.json' => function () {
      return [
        'elementType' => Entry::class,
        'criteria' => [
          'section' => 'news',
        ],
        'transformer' => function (Entry $entry) {
          $body = '';
          if ($entry->body) {
            $body = $entry->body->getRawContent();
          }
          return [
            'title' => $entry->title,
            'id' => $entry->id,
            'body' => $body,
          ];
        },
      ];
    },
    'meetings.json' => function () {
      return [
        'elementType' => \Solspace\Calendar\Elements\Event::class,
        'criteria' => [
          'calendar' => 'meetings',
        ],
        'transformer' => function(\Solspace\Calendar\Elements\Event $event) {
          $body = '';
          if ($event->body) {
            $body = $event->body->getRawContent();
          }
          return [
            'title' => $event->title,
            'id' => $event->id,
            'body' => $body,
          ];
        },
      ];
    },
    'events.json' => function () {
      return [
        'elementType' => \Solspace\Calendar\Elements\Event::class,
        'criteria' => [
          'calendar' => 'events',
        ],
        'transformer' => function(\Solspace\Calendar\Elements\Event $event) {
          $body = '';
          if ($event->body) {
            $body = $event->body->getRawContent();
          }
          return [
            'title' => $event->title,
            'id' => $event->id,
            'body' => $body,
          ];
        },
      ];
    },
  ]
];
