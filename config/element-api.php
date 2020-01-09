<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

function cbEntries($section, $element)
{
  $sectionArray = [];
  if (!empty($element->$section)) {
    foreach ($element->$section as $value) {
      $sectionArray[] = $value->id;
    }
  }
  return $sectionArray;
}

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
    'export/departments.json' => function () {
      return [
        'elementType' => Entry::class,
        'criteria' => [
          'section' => 'departments',
          'type' => 'departments'
        ],
        'transformer' => function (Entry $entry) {
          return [
            'title' => $entry->title,
            'id' => $entry->id,
            'matrix' => [
              'serviceBlock' => !empty($entry->pageServices->all()) ? [
                'title' => "Services",
                cbEntries("pageServices", $entry)
              ] : null,
              'resourceBlock' => !empty($entry->pageResources->all()) ? [
                'title' => "Resources",
                cbEntries("pageResources", $entry)
              ] : null,
              'boardBlock' => !empty($entry->pageBoardsCommissions->all()) ? [
                'title' => "Boards & Commissions",
                cbEntries("pageBoardsCommissions", $entry)
              ] : null,
              'newsBlock' => !empty($entry->pageNews->all()) ? [
                'title' => "News",
                cbEntries("pageNews", $entry)
              ] : null,
              'topicBlock' => !empty($entry->pageTopics->all()) ? [
                'title' => "Topics",
                cbEntries("pageTopics", $entry)
              ] : null,
              'documentBlock' => !empty($entry->pageDocuments->all()) ? [
                'title' => "Documents",
                cbEntries("pageDocuments", $entry)
              ] : null,
            ]
          ];
        },
      ];
    },
    'pressreleases.json' => function () {
      return [
        'elementType' => Entry::class,
        'criteria' => [
          'section' => 'news',
          'relatedTo' => 17939
        ],
        'transformer' => function (Entry $entry) {
          $body = '';
          if ($entry->body) {
            $body = Craft::$app->getElements()->parseRefs($entry->body->getRawContent());
          }
          return [
            'title' => $entry->title,
            'id' => $entry->id,
            'author' => $entry->author->email,
            'postDate' => $entry->postDate->format("Y-m-d\TH:i:sP"),
            'summary' => $entry->summary,
            'image' => !empty($entry->newsImage->one()) ? $entry->newsImage->one() : null,
            'body' => $body,
            'pressRelease' => !empty($entry->pressReleaseFile->one()) ? (string) $entry->pressReleaseFile->one()->url : null,
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
