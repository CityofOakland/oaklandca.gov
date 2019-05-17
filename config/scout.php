<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;
use Solspace\Calendar\Elements\Event;
use fruitstudios\linkit\Linkit;
use League\Fractal\TransformerAbstract;
use nystudio107\imageoptimize\imagetransforms\ImageTransform;

function enumEntries($section, $element) {
  $sectionArray = [];
  if (! empty($element->$section)) {
    foreach($element->$section as $value) {
      $sectionArray[] = $value->title;
    }
  }
  return $sectionArray;
}

function entryUrl($entry) {
  return empty($entry->redirectUrl) ? $entry->uri : $entry->redirectUrl;
}

function entryDate($entry) {
  return $entry->postDate->getTimestamp() * 1000;
}

function entryPrettyDate($entry) {
  return $entry->postDate->format('F j, Y');
}

function ctaButtonText($element) {
  return ! empty($element->ctaButton->text) ? $element->ctaButton->text : null;
}

function banner($element) {
  if (! empty($element->banner)) {
    if (! empty($element->banner->one())) {
      return $element->banner->one()->url;
    }
  }
  return null;
}

function portrait($element) {
  ! empty($entry->portrait) ? $entry->portrait->one()->url : null;
}

function sectionPriority($element) {
  $handle = $element->section->handle;
  switch ($handle) {
    case 'services':
      return 1;
    case 'resources':
      return 2;
    case 'departments':
      return 3;
    case 'boardsCommissions':
      return 4;
    case 'projects':
      return 5;
    default:
      return null;
  }
}

function searchFilter($element) {
  $handle = ! empty($element->section) ? $element->section->handle : $element->calendar->handle;
  switch ($handle) {
    case 'news':
    case 'processes':
    case 'projects':
    case 'news':
    case 'resources':
    case 'services':
    case 'topics':
     return 'general';
    
    case 'boardsCommissions':
    case 'departments':
    case 'officials':
    case 'staff':
    case 'teams':
    case 'volunteers':
      return 'officialsPeople';
    
    case 'meetings':
    case 'events':
      return 'calendars';
  
    case 'documents':
    case 'documentPackets':
      return 'documents';

    default:
      break;
  }
}

class eventsTransform extends TransformerAbstract
{
  public function transform(Solspace\Calendar\Elements\Event $event)
  {
    $boardsCommissions = enumEntries("boardsCommissions", $event);
    $departments = enumEntries("departments", $event);
    $officials = enumEntries("officials", $event);
    $projects = enumEntries("projects", $event);
    $topics = enumEntries("topics", $event);
    return [
      'title' => $event->title,
      'url' => $event->uri,
      'date' => $event->startDate->timestamp * 1000,
      'displayDate' => $event->startDate->format('F j, Y'),
      'body' => strip_tags($event->body),
      'contact' => $event->eventContact,
      'eventImageSrc' => ! empty($event->eventImage->one()) ? $event->eventImage->one()->indexImage->src() : null,
      'boardsCommissions' => $boardsCommissions,
      'departments' => $departments,
      'officials' => $officials,
      'projects' => $projects,
      'topics' => $topics,
      'searchFilter' => searchFilter($event),
    ];
  }
}

class newsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $projects = enumEntries("projects", $entry);
    $topics = enumEntries("topics", $entry);
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'newsImageSrc' => ! empty($entry->newsImage->one()) ? $entry->newsImage->one()->indexImage->src() : null,
      'summary' => strip_tags($entry->summary),
      'body' => strip_tags($entry->body),
      'mediaContact' => $entry->mediaContact,
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
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'banner' => banner($entry),
      'ctaButtonText' => ctaButtonText($entry),
      'leadIn' => $entry->leadIn,
      'about' => $entry->about,
    ];
  }
}

class departmentsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $officials = enumEntries("officials", $entry);
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'leadIn' => $entry->leadIn,
      'banner' => banner($entry),
      'ctaButtonText' => ctaButtonText($entry),
      'groupHeadBio' => $entry->groupHeadBio,
      'groupHeadName' => $entry->groupHeadName,
      'groupHeadTitle' => $entry->groupHeadTitle,
      'officials' => $officials,
    ];
  }
}

class documentsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $projects = enumEntries("projects", $entry);
    $resources = enumEntries("resources", $entry);
    $services = enumEntries("services", $entry);
    $topics = enumEntries("topics", $entry);
    $documents = enumEntries("documents", $entry);
    $types = [];
    if (! empty($entry->documentType)) {
      foreach($entry->documentType as $value) {
        $types[] = $value->title;
      }
    }
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'leadIn' => $entry->leadIn,
      'summary' => strip_tags($entry->summary),
      'categories' => $types,
      'boardsCommissions' => $boardsCommissions,
      'departments' => $departments,
      'officials' => $officials,
      'projects' => $projects,
      'resources' => $resources,
      'services' => $services,
      'documents' => $documents,
      'topics' => $topics,
    ];
  }
}

class projectsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $milestones = [];
    foreach ($entry->timeline as $block) {
      $milestones[] = [
        'name' => $block->milestoneName,
        'dates' => $block->milestoneDates
      ];
    }
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $topics = enumEntries("topics", $entry);
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'banner' => banner($entry),
      'leadIn' => $entry->leadIn,
      'about' => $entry->about,
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
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $projects = enumEntries("projects", $entry);
    $topics = enumEntries("topics", $entry);
    $body = [];
    foreach ($entry->transactionBody as $block) {
      $body[] = strip_tags($block->text);
    }
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'leadIn' => $entry->leadIn,
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
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $projects = enumEntries("projects", $entry);
    $topics = enumEntries("topics", $entry);
    $body = [];
    foreach ($entry->transactionBody as $block) {
      $body[] = strip_tags($block->text);
    }
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'leadIn' => $entry->leadIn,
      'boardsCommissions' => $boardsCommissions,
      'departments' => $departments,
      'officials' => $officials,
      'projects' => $projects,
      'topics' => $topics,
      'body' => $body,
      'urgentIssuesDescription' => $entry->urgentIssuesDescription,
      'nonUrgentIssuesDescription' => $entry->nonUrgentIssuesDescription,
    ];
  }
}

class topicsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $projects = enumEntries("projects", $entry);
    $topics = enumEntries("topics", $entry);
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'banner' => banner($entry),
      'leadIn' => $entry->leadIn,
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
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'portrait' => portrait($entry),
      'jobTitle' => ! empty($entry->jobTitle) ? $entry->jobTitle : $entry->staffImportJobTitle,
      'bio' => $entry->bio,
      'email' => ! empty($entry->emailAddress) ? $entry->emailAddress : str_replace("@oaklandnet.com", "@oaklandca.gov", $entry->staffImportEmail),
      'department' => ! empty($entry->departments[0]) ? $entry->departments[0]->title : $entry->staffImportDepartment,
      'employmentType' => $entry->employmentType->label,
    ];
  }
}

class volunteersTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'portrait' => portrait($entry),
      'jobTitle' => ! empty($entry->jobTitle) ? $entry->jobTitle : null,
      'bio' => $entry->bio,
      'email' => ! empty($entry->emailAddress) ? $entry->emailAddress : null,
      'department' => ! empty($entry->departmentOfficialBoardCommission->one()) ? $entry->departmentOfficialBoardCommission->one()->title : null,
    ];
  }
}

class teamsTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $teamMembers = [];
    foreach($entry->teamMembers as $value)
      foreach($value->staff as $teamMember)
        $teamMembers[] = $teamMember->title;
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'teamMembers' => $teamMembers,
    ];
  }
}

class allTransform extends TransformerAbstract
{
  public function transform(craft\elements\Entry $entry)
  {
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $projects = enumEntries("projects", $entry);
    $resources = enumEntries("resources", $entry);
    $services = enumEntries("services", $entry);
    $topics = enumEntries("topics", $entry);
    $documents = enumEntries("documents", $entry);
    $bodyMatrix = [];
    if (! empty($entry->transactionBody)) {
      foreach ($entry->transactionBody as $block) {
        $bodyMatrix[] = strip_tags($block->text);
      }
    }
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      $entry->section->handle . "Section" => true,
      'date' => entryDate($entry),
      'displayDate' => entryPrettyDate($entry),
      'summary' => strip_tags($entry->summary),
      'leadIn' => $entry->leadIn,
      'about' => strip_tags($entry->about),
      'bio' => $entry->bio,
      'boardsCommissions' => $boardsCommissions,
      'body' => strip_tags($entry->body),
      'bodyMatrix' => $bodyMatrix,
      'ctaButtonText' => ctaButtonText($entry),
      'groupHeadBio' => $entry->groupHeadBio,
      'groupHeadName' => $entry->groupHeadName,
      'groupHeadTitle' => $entry->groupHeadTitle,
      'mediaContact' => $entry->mediaContact,
      'urgentIssuesDescription' => $entry->urgentIssuesDescription,
      'nonUrgentIssuesDescription' => $entry->nonUrgentIssuesDescription,
      'departments' => $departments,
      'documents' => $documents,
      'officials' => $officials,
      'projects' => $projects,
      'resources' => $resources,
      'services' => $services,
      'topics' => $topics,
      'sectionPriority' => sectionPriority($entry),
      'searchFilter' => searchFilter($entry),
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
    // BEGIN DEPARTMENTS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_departments',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'departments'
      ],
      'transformer' => new departmentsTransform(),
    ],
    // BEGIN DOCUMENTS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_documents',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => ['documents', 'documentPackets'],
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'resources', 'services', 'topics', 'documentType', 'documents']
      ],
      'transformer' => new documentsTransform(),
    ],
    // BEGIN PROJECTS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_projects',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'projects'
      ],
      'transformer' => new projectsTransform(),
    ],
    // BEGIN RESOURCES INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_resources',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'resources',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => new resourcesTransform(),
    ],
    // BEGIN SERVICES INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_services',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'services',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics', 'transactionBody']
      ],
      'transformer' => new servicesTransform(),
    ],
    // BEGIN TOPICS INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_topics',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'topics',
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics'], 
      ],
      'transformer' => new topicsTransform(),
    ],
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
    // BEGIN CALENDAR INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_calendars',
      'elementType' => \Solspace\Calendar\Elements\Event::class,
      'criteria' => [
        'calendar' => ['events', 'meetings'],
        'with' => ['boardsCommissions', 'departments', 'officials', 'projects', 'topics']
      ],
      'transformer' => new eventsTransform(),
    ],
    // BEGIN ALL INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_all',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => [
          'news', 
          'boardsCommissions',
          'processes', 
          'projects', 
          'resources', 
          'services',
          'topics',
          'departments',
          'officials',
          'staff',
          'teams',
          'volunteers'
        ],
        'with' => [
          'boardsCommissions', 
          'departments', 
          'officials', 
          'projects', 
          'resources', 
          'services', 
          'topics', 
          'documentType', 
          'documents',
          'transactionBody'
        ]
      ],
      'transformer' => new allTransform(),
    ],
    // BEGIN GOVERNMENT INDEX
    [
      'indexName' => getenv('ENVIRONMENT') . '_government',
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => [
          'departments',
          'boardsCommissions',
          'officials',
          'staff',
          'teams',
          'volunteers'
        ],
        'with' => [
          'boardsCommissions', 
          'departments', 
          'officials', 
          'projects', 
          'resources', 
          'services', 
          'topics', 
          'documentType', 
          'documents',
          'transactionBody'
        ]
      ],
      'transformer' => new allTransform(),
    ]
  ],
];
