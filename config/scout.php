<?php
use craft\elements\Entry;
use craft\helpers\UrlHelper;
use Solspace\Calendar\Elements\Event;
use fruitstudios\linkit\Linkit;

return [
  "sync" => true,
  "application_id" => getenv('ALGOLIA_APP_ID'),
  "admin_api_key" => getenv('ALGOLIA_ADMIN_API'),
  "mappings" => [
    // BEGIN NEWS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_news',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'news'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        return [
          'title' => $entry->title,
          'id' => $entry->id,
          'url' => $entry->url,
          'newsImage' => ! empty($entry->newsImage->one()) ? (string) $entry->newsImage->one()->url : null,
          'summary' => (string) $entry->summary,
          'body' => (string) $entry->body,
          'mediaContact' => (string) $entry->mediaContact,
        ];
      },
    ],
    // END NEWS INDEX
    // BEGIN BOARDS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_boards',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'boardsCommissions',
        'type' => 'boardsCommissions'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        return [
          'title' => $entry->title,
          'id' => $entry->id,
          'url' => $entry->url,
          'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
          'ctaButtonText' => ! empty($entry->ctaButton->text) ? (string) $entry->ctaButton->text : null,
          'leadIn' => (string) $entry->leadIn,
          'about' => (string) $entry->about,
        ];
      },
    ],
    // END BOARDS INDEX
    // BEGIN DEPARTMENTS INDEX
    [
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
    ],
    [
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
    ],
    // END DEPARTEMNTS INDEX
    // BEGIN DOCUMENTS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_documents',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'documents'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $types = [];
        foreach($entry->documentType as $value)
          $types[] = $value->title;
        return [
          'title' => $entry->title,
          'id' => $entry->id,
          'url' => $entry->url,
          'summary' => (string) $entry->summary,
          'categories' => $types,
        ];
      },
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_documents',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'documentPackets'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $documents = [];
        foreach($entry->documents as $value)
          $documents[] = $value->title;
        return [
          'title' => $entry->title,
          'id' => $entry->id,
          'url' => $entry->url,
          'leadIn' => (string) $entry->leadIn,
          'summary' => (string) $entry->summary,
          'documents' => $documents,
        ];
      },
    ],
    // END DOCUMENTS INDEX
    // BEGIN PROJECTS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_projects',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'projects'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $milestones = [];
        foreach ($entry->timeline as $block) {
          $milestones[] = [
            'name' => (string) $block->milestoneName,
            'dates' => (string) $block->milestoneDates
          ];
        }
        return [
          'title' => $entry->title,
          'id' => $entry->id,
          'url' => $entry->url,
          'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
          'leadIn' => (string) $entry->leadIn,
          'about' => (string) $entry->about,
        ];
      },
    ],
    // END PROJECTS INDEX
    // BEGIN RESOURCES INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_resources',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'resources'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $body = [];
        foreach ($entry->transactionBody as $block) {
          $body[] = (string) $block->text;
        }
        return [
          'title' => $entry->title,
          'id' => $entry->id,
          'url' => $entry->url,
          'resourceImage' => ! empty($entry->resourceImage->one()) ? (string) $entry->resourceImage->one()->url : null,
          'leadIn' => (string) $entry->leadIn,
          'body' => $body,
        ];
      },
    ],
    // END RESOURCES INDEX
    // BEGIN SERVICES INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_services',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'services',
        'type' => 'services'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $body = [];
        foreach ($entry->transactionBody as $block) {
          $body[] = (string) $block->text;
        }
        return [
          'title' => $entry->title,
          'url' => Urlhelper::siteUrl($entry->url),
          'leadIn' => (string) $entry->leadIn,
          'body' => $body,
        ];
      },
    ],
    [
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
    ],
    // END SERVICES INDEX
    // BEGIN TOPICS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_topics',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'topics'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        return [
          'title' => $entry->title,
          'id' => $entry->id,
          'url' => $entry->url,
          'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
          'leadIn' => (string) $entry->leadIn,
          'about' => (string) $entry->about,
        ];
      },
    ],
    // END TOPICS INDEX
    // BEGIN EVENTS INDEX
    [
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
    ],
    // END EVENTS INDEX
    // BEGIN MEETINGS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_meetings',
      'elementType' => \Solspace\Calendar\Elements\Event::class,
      'criteria' => [
        'calendar' => 'meetings',
      ],
      'transformer' => function(Solspace\Calendar\Elements\Event $event) {
        return [
          'title' => $event->title,
          'id' => $event->id,
          'eventImage' => ! empty($event->eventImage->one()) ? (string) $event->eventImage->one()->url : null,
          'url' => $event->url,
          'body' => (string) $event->body,
          'contact' => (string) $event->eventContact,
        ];
      },
    ],
    // END MEETINGS INDEX
    // BEGIN STAFF INDEX
    [
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
          'jobTitle' => ! empty($entry->jobTitle) ? (string) $entry->jobTitle : (string) $entry->staffImportJobTitle,
          'bio' => (string) $entry->bio,
          'email' => ! empty($entry->emailAddress) ? (string) $entry->emailAddress : (string) $entry->staffImportEmail,
          'department' => ! empty($entry->departments->one()) ? (string) $entry->departments->one()->title : null,
          'employmentType' => (string) $entry->employmentType->label,
        ];
      },
    ],
    // END STAFF INDEX
  ],
];
