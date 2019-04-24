<?php
use craft\elements\Entry;
use craft\helpers\UrlHelper;
use Solspace\Calendar\Elements\Event;
use fruitstudios\linkit\Linkit;
use League\Fractal\TransformerAbstract;
use nystudio107\imageoptimize\imagetransforms\ImageTransform;

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
      'eventImageSrc' => ! empty($event->eventImage->one()) ? $event->eventImage->one()->indexImage->src() : null,
      'eventImage' => ! empty($event->eventImage->one()) ? $event->eventImage->one()->indexImage->toArray() : null,
      'boardsCommissions' => $boardsCommissions,
      'departments' => $departments,
      'officials' => $officials,
      'projects' => $projects,
      'topics' => $topics,
    ];
  }
}

class newsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
      'newsImageSrc' => ! empty($entry->newsImage->one()) ? $entry->newsImage->one()->indexImage->src() : null,
      'newsImage' => ! empty($entry->newsImage->one()) ? $entry->newsImage->one()->indexImage->toArray() : null,
      'summary' => strip_tags($entry->summary),
      'body' => strip_tags($entry->body),
      'mediaContact' => (string) $entry->mediaContact,
      'boardsCommissions' => $boardsCommissions,
      'departments' => $departments,
      'projects' => $projects,
      'officials' => $officials,
      'topics' => $topics,
    ];
  }
}

class boardsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    return [
      'title' => $entry->title,
      'url' => $entry->uri,
      'date' => $entry->postDate,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
      'ctaButtonText' => ! empty($entry->ctaButton->text) ? (string) $entry->ctaButton->text : null,
      'leadIn' => (string) $entry->leadIn,
      'about' => (string) $entry->about,
    ];
  }
}

class departmentsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class cityCouncilTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class documentsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class documentPacketsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class projectsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class resourcesTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class videosTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class servicesTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class three11Transform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    return [
      'title' => $entry->title,
      'url' => $entry->uri,
      'banner' => ! empty($entry->banner->one()) ? (string) $entry->banner->one()->url : null,
      'leadIn' => (string) $entry->leadIn,
      'body' => (string) $entry->body,
      'urgentIssuesDescription' => (string) $entry->urgentIssuesDescription,
      'nonUrgentIssuesDescription' => (string) $entry->nonUrgentIssuesDescription,
    ];
  }
}

class topicsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
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
  }
}

class staffTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    return [
      'title' => $entry->title,
      'url' => $entry->uri,
      'portrait' => ! empty($entry->portrait[0]) ? (string) $entry->portrait[0]->url : null,
      'jobTitle' => ! empty($entry->jobTitle) ? (string) $entry->jobTitle : (string) $entry->staffImportJobTitle,
      'bio' => (string) $entry->bio,
      'email' => ! empty($entry->emailAddress) ? (string) $entry->emailAddress : str_replace("@oaklandnet.com", "@oaklandca.gov", $entry->staffImportEmail),
      'department' => ! empty($entry->departments[0]) ? (string) $entry->departments[0]->title : $entry->staffImportDepartment,
      'employmentType' => (string) $entry->employmentType->label,
    ];
  }
}

class volunteersTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    return [
      'title' => $entry->title,
      'url' => $entry->uri,
      'portrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->url : null,
      'jobTitle' => ! empty($entry->jobTitle) ? (string) $entry->jobTitle : null,
      'bio' => (string) $entry->bio,
      'email' => ! empty($entry->emailAddress) ? (string) $entry->emailAddress : null,
      'department' => ! empty($entry->departmentOfficialBoardCommission->one()) ? (string) $entry->departmentOfficialBoardCommission->one()->title : null,
    ];
  }
}

class teamsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $teamMembers = [];
    foreach($entry->teamMembers->all() as $value)
      foreach($value->staff->all() as $teamMember)
        $teamMembers[] = $teamMember->title;
    return [
      'title' => $entry->title,
      'url' => $entry->uri,
      'teamMembers' => $teamMembers,
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
      'transformer' => new newsTransform(),
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
      'transformer' => new boardsTransform(),
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
      'transformer' => new departmentsTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_departments',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'departments',
        'type' => 'cityCouncil'
      ],
      'transformer' => new cityCouncilTransform(),
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
      'transformer' => new documentsTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_documents',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'documentPackets',
        'with' => 'documents'
      ],
      'transformer' => new documentPacketsTransform(),
    ],
    // END DOCUMENTS INDEX
    // BEGIN PROJECTS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_projects',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'projects'
      ],
      'transformer' => new projectsTransform(),
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
      'transformer' => new resourcesTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_resources',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'resources',
        'type' => 'videos',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => new videosTransform(),
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
      'transformer' => new servicesTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_services',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'services',
        'type' => 'services311'
      ],
      'transformer' => new three11Transform(),
    ],
    // END SERVICES INDEX
    // BEGIN TOPICS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_topics',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'topics'
      ],
      'transformer' => new topicsTransform(),
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
    // BEGIN STAFF INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_staff',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'staff',
        'type' => 'newStaff',
        'with' => ['portrait', 'department']
      ],
      'transformer' => new staffTransform(),
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
      'transformer' => new volunteersTransform(),
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
      'transformer' => new teamsTransform(),
    ],
    // END TEAMS INDEX
    // BEGIN GOVERNMENT INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'officials',
        'type' => 'officials'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        return [
          'title' => $entry->title,
          'sectionRank' => 1,
          'url' => $entry->uri,
          'name' => $entry->groupHeadName,
          'portrait' => ! empty($entry->portrait[0]) ? (string) $entry->portrait[0]->url : null,
          'bio' => strip_tags($entry->groupHeadBio),
        ];
      },
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'officials',
        'type' => 'officialsRedirect'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        return [
          'title' => $entry->title,
          'sectionRank' => 1,
          'url' => $entry->redirectUrl,
          'portrait' => ! empty($entry->portrait[0]) ? (string) $entry->portrait[0]->url : null,
          'name' => $entry->groupHeadName,
        ];
      },
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'departments',
        'type' => 'departments'
      ],
      'transformer' => new departmentsTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'departments',
        'type' => 'departmentRedirect'
      ],
      'transformer' => function(craft\elements\Entry $entry) {
        return [
          'title' => $entry->title,
          'sectionRank' => 2,
          'url' => $entry->redirectUrl,
        ];
      },
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'departments',
        'type' => 'cityCouncil'
      ],
      'transformer' => new cityCouncilTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'boardsCommissions',
        'type' => 'boardsCommissions'
      ],
      'transformer' => new boardsTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'staff',
        'type' => 'newStaff',
        'with' => ['portrait', 'department']
      ],
      'transformer' => new staffTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'volunteers',
        'type' => 'volunteers'
      ],
      'transformer' => new volunteersTransform(),
    ],
    // END GOVERNMENT INDEX
    // BEGIN PUBLIC INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_public',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'services',
        'type' => 'services',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => new servicesTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_public',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'services',
        'type' => 'services311'
      ],
      'transformer' => new three11Transform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_public',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'resources',
        'type' => 'resources',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => new resourcesTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_public',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'resources',
        'type' => 'videos',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => new videosTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_public',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'topics'
      ],
      'transformer' => new topicsTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_public',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'projects'
      ],
      'transformer' => new projectsTransform(),
    ],
    [
      'indexName' => getenv('ENVIRONMENT') . '_public',
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
      'transformer' => new newsTransform(),
    ],
    // END PUBLIC INDEX
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
  ],
];
