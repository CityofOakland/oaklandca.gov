<?php
use craft\elements\Entry;
use craft\helpers\UrlHelper;
use Solspace\Calendar\Elements\Event;
use fruitstudios\linkit\Linkit;
use League\Fractal\TransformerAbstract;

class eventsTransform extends TransformerAbstract
{
  public function transform(Solspace\Calendar\Elements\Event $event)
  {
    $boardsCommissions = [];
    foreach($event->boardsCommissions as $value)
      $boardsCommissions[] = $value->title;
    $departments = [];
    foreach($event->departments as $value)
      $departments[] = $value->title;
    $officials = [];
    foreach($event->officials as $value)
      $officials[] = $value->title;
    $projects = [];
    foreach($event->projects as $value)
      $projects[] = $value->title;
    $topics = [];
    foreach($event->topics as $value)
      $topics[] = $value->title;
    return [
      'title' => $event->title,
      'url' => $event->uri,
      'date' => $event->startDate->timestamp,
      'displayDate' => $event->startDate->format('F j, Y'),
      'body' => strip_tags($event->body),
      'contact' => (string) $event->eventContact,
      'eventImage' => ! empty($event->eventImage->one()) ? (string) $event->eventImage->one()->getUrl('smallSquare') : null,
      'boardsCommissions' => $boardsCommissions,
      'departments' => $departments,
      'officials' => $officials,
      'projects' => $projects,
      'topics' => $topics,
    ];
  }
}

return [
  "sync" => true,
  "application_id" => getenv('ALGOLIA_APP_ID'),
  "admin_api_key" => getenv('ALGOLIA_ADMIN_API'),
  "mappings" => [
    // BEGIN NEWS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_news',
      'indexSettings' => [
        'settings' => [
            'attributesForFaceting' => [
              'boardsCommissions',
              'departments',
              'projects',
              'officials',
              'topics'
            ],
        ],
        'forwardToReplicas' => 'true',
      ],
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'news'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $boardsCommissions = [];
        foreach($entry->boardsCommissions->all() as $value)
          $boardsCommissions[] = $value->title;
        $departments = [];
        foreach($entry->departments->all() as $value)
          $departments[] = $value->title;
        $officials = [];
        foreach($entry->officials->all() as $value)
          $officials[] = $value->title;
        $projects = [];
        foreach($entry->projects->all() as $value)
          $projects[] = $value->title;
        $topics = [];
        foreach($entry->topics->all() as $value)
          $topics[] = $value->title;
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'newsImage' => ! empty($entry->newsImage->one()) ? (string) $entry->newsImage->one()->url : null,
          'summary' => strip_tags($entry->summary),
          'body' => strip_tags($entry->body),
          'mediaContact' => (string) $entry->mediaContact,
          'boardsCommissions' => $boardsCommissions,
          'departments' => $departments,
          'projects' => $projects,
          'officials' => $officials,
          'topics' => $topics,
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
          'url' => $entry->uri,
          'date' => $entry->postDate,
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
          'url' => $entry->uri,
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
        foreach($entry->pageOfficials->all() as $value)
          $officials[] = [$value->title, $value->groupHeadName];
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
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
        'section' => 'documents',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'resources', 'services', 'topics', 'documentType']
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $boardsCommissions = [];
        foreach($entry->boardsCommissions as $value)
          $boardsCommissions[] = $value->title;
        $departments = [];
        foreach($entry->departments as $value)
          $departments[] = $value->title;
        $officials = [];
        foreach($entry->officials as $value)
          $officials[] = $value->title;
        $projects = [];
        foreach($entry->projects as $value)
          $projects[] = $value->title;
        $resources = [];
        foreach($entry->resources as $value)
          $resources[] = $value->title;
        $services = [];
        foreach($entry->services as $value)
          $services[] = $value->title;
        $topics = [];
        foreach($entry->topics as $value)
          $topics[] = $value->title;
        $types = [];
        foreach($entry->documentType as $value)
          $types[] = $value->title;
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'date' => $entry->postDate->getTimestamp(),
          'displayDate' => $entry->postDate->format('F j, Y'),
          'summary' => strip_tags($entry->summary),
          'categories' => $types,
          'boardsCommissions' => $boardsCommissions,
          'departments' => $departments,
          'officials' => $officials,
          'projects' => $projects,
          'resources' => $resources,
          'services' => $services,
          'topics' => $topics,
        ];
      },
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_documents',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'documentPackets',
        'with' => 'documents'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $documents = [];
        foreach($entry->documents as $value)
          $documents[] = $value->title;
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'date' => $entry->postDate->getTimestamp(),
          'displayDate' => $entry->postDate->format('F j, Y'),
          'leadIn' => (string) $entry->leadIn,
          'summary' => strip_tags($entry->summary),
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
        foreach ($entry->timeline->all() as $block) {
          $milestones[] = [
            'name' => (string) $block->milestoneName,
            'dates' => (string) $block->milestoneDates
          ];
        }
        $boardsCommissions = [];
        foreach($entry->boardsCommissions->all() as $value)
          $boardsCommissions[] = $value->title;
        $departments = [];
        foreach($entry->departments->all() as $value)
          $departments[] = $value->title;
        $officials = [];
        foreach($entry->officials->all() as $value)
          $officials[] = $value->title;
        $topics = [];
        foreach($entry->topics->all() as $value)
          $topics[] = $value->title;
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
          'leadIn' => (string) $entry->leadIn,
          'about' => (string) $entry->about,
          'boardsCommissions' => $boardsCommissions,
          'departments' => $departments,
          'officials' => $officials,
          'topics' => $topics,
        ];
      },
    ],
    // END PROJECTS INDEX
    // BEGIN RESOURCES INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_resources',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'resources',
        'type' => 'resources',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $boardsCommissions = [];
        foreach($entry->boardsCommissions as $value)
          $boardsCommissions[] = $value->title;
        $departments = [];
        foreach($entry->departments as $value)
          $departments[] = $value->title;
        $officials = [];
        foreach($entry->officials as $value)
          $officials[] = $value->title;
        $projects = [];
        foreach($entry->projects as $value)
          $projects[] = $value->title;
        $topics = [];
        foreach($entry->topics as $value)
          $topics[] = $value->title;
        $body = [];
        foreach ($entry->transactionBody as $block) {
          $body[] = strip_tags($block->text);
        }
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'resourceImage' => ! empty($entry->resourceImage->one()) ? (string) $entry->resourceImage->one()->url : null,
          'leadIn' => (string) $entry->leadIn,
          'boardsCommissions' => $boardsCommissions,
          'departments' => $departments,
          'officials' => $officials,
          'projects' => $projects,
          'topics' => $topics,
          'body' => $body,
        ];
      },
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_resources',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'resources',
        'type' => 'videos',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $boardsCommissions = [];
        foreach($entry->boardsCommissions as $value)
          $boardsCommissions[] = $value->title;
        $departments = [];
        foreach($entry->departments as $value)
          $departments[] = $value->title;
        $officials = [];
        foreach($entry->officials as $value)
          $officials[] = $value->title;
        $projects = [];
        foreach($entry->projects as $value)
          $projects[] = $value->title;
        $topics = [];
        foreach($entry->topics as $value)
          $topics[] = $value->title;
        $body = [];
        foreach ($entry->transactionBody as $block) {
          $body[] = strip_tags($block->text);
        }
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'leadIn' => (string) $entry->leadIn,
          'boardsCommissions' => $boardsCommissions,
          'departments' => $departments,
          'officials' => $officials,
          'projects' => $projects,
          'topics' => $topics,
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
        'type' => 'services',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $boardsCommissions = [];
        foreach($entry->boardsCommissions as $value)
          $boardsCommissions[] = $value->title;
        $departments = [];
        foreach($entry->departments as $value)
          $departments[] = $value->title;
        $officials = [];
        foreach($entry->officials as $value)
          $officials[] = $value->title;
        $projects = [];
        foreach($entry->projects as $value)
          $projects[] = $value->title;
        $topics = [];
        foreach($entry->topics as $value)
          $topics[] = $value->title;
        $body = [];
        foreach ($entry->transactionBody as $block) {
          $body[] = strip_tags($block->text);
        }
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'leadIn' => (string) $entry->leadIn,
          'boardsCommissions' => $boardsCommissions,
          'departments' => $departments,
          'officials' => $officials,
          'projects' => $projects,
          'topics' => $topics,
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
          'url' => $entry->uri,
          'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
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
        $boardsCommissions = [];
        foreach($entry->boardsCommissions->all() as $value)
          $boardsCommissions[] = $value->title;
        $departments = [];
        foreach($entry->departments->all() as $value)
          $departments[] = $value->title;
        $officials = [];
        foreach($entry->officials->all() as $value)
          $officials[] = $value->title;
        $projects = [];
        foreach($entry->projects->all() as $value)
          $projects[] = $value->title;
        $topics = [];
        foreach($entry->topics->all() as $value)
          $topics[] = $value->title;
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
          'leadIn' => (string) $entry->leadIn,
          'about' => strip_tags($entry->about),
          'boardsCommissions' => $boardsCommissions,
          'departments' => $departments,
          'officials' => $officials,
          'projects' => $projects,
          'topics' => $topics,
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
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics']
      ],
      'transformer' => new eventsTransform(),
    ],
    // END EVENTS INDEX
    // BEGIN MEETINGS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_meetings',
      'elementType' => \Solspace\Calendar\Elements\Event::class,
      'criteria' => [
        'calendar' => 'meetings',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics']
      ],
      'transformer' => new eventsTransform(),
    ],
    // END MEETINGS INDEX
    // BEGIN CALENDAR INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_calendars',
      'elementType' => \Solspace\Calendar\Elements\Event::class,
      'criteria' => [
        'calendar' => 'events',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics']
      ],
      'transformer' => new eventsTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_calendars',
      'elementType' => \Solspace\Calendar\Elements\Event::class,
      'criteria' => [
        'calendar' => 'meetings',
      ],
      'transformer' => new eventsTransform(),
    ],
    // END CALENDAR INDEX
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
          'url' => $entry->uri,
          'portrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->url : null,
          'jobTitle' => ! empty($entry->jobTitle) ? (string) $entry->jobTitle : (string) $entry->staffImportJobTitle,
          'bio' => (string) $entry->bio,
          'email' => ! empty($entry->emailAddress) ? (string) $entry->emailAddress : str_replace("@oaklandnet.com", "@oaklandca.gov", $entry->staffImportEmail),
          'department' => ! empty($entry->departments->one()) ? (string) $entry->departments->one()->title : $entry->staffImportDepartment,
          'employmentType' => (string) $entry->employmentType->label,
        ];
      },
    ],
    // END STAFF INDEX
    // BEGIN VOLUNTEERS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_volunteers',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'volunteers',
        'type' => 'volunteers'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'portrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->url : null,
          'jobTitle' => ! empty($entry->jobTitle) ? (string) $entry->jobTitle : null,
          'bio' => (string) $entry->bio,
          'email' => ! empty($entry->emailAddress) ? (string) $entry->emailAddress : null,
          'department' => ! empty($entry->departmentOfficialBoardCommission->one()) ? (string) $entry->departmentOfficialBoardCommission->one()->title : null,
        ];
      },
    ],
    // END VOLUNTEERS INDEX
    // BEGIN TEAMS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_teams',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'teams',
        'type' => 'teams'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        $teamMembers = [];
        foreach($entry->teamMembers->all() as $value)
          foreach($value->staff->all() as $teamMember)
            $teamMembers[] = $teamMember->title;
        return [
          'title' => $entry->title,
          'url' => $entry->uri,
          'teamMembers' => $teamMembers,
        ];
      },
    ],
    // END TEAMS INDEX
  ],
];
