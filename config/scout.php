<?php
use craft\elements\Entry;
use craft\helpers\UrlHelper;
use Solspace\Calendar\Elements\Event;
use fruitstudios\linkit\Linkit;
use League\Fractal\TransformerAbstract;
use nystudio107\imageoptimize\imagetransforms\ImageTransform;
use Solspace\Calendar\Elements\Db\EventQuery;

function enumEntries($section, $element)
{
  $sectionArray = [];
  if (!empty($element->$section)) {
    foreach ($element->$section as $value) {
      $sectionArray[] = $value->title;
    }
  }
  return $sectionArray;
}

function entryUrl($entry)
{
  return empty($entry->redirectUrl) ? $entry->uri : $entry->redirectUrl;
}

function entryDate($entry)
{
  return $entry->postDate->getTimestamp() * 1000;
}

function entryPrettyDate($entry)
{
  return $entry->postDate->format('F j, Y');
}

function ctaButtonText($element)
{
  return !empty($element->ctaButton->text) ? $element->ctaButton->text : null;
}

function banner($element)
{
  if (!empty($element->banner)) {
    if (!empty($element->banner->one())) {
      return $element->banner->one()->url;
    }
  }
  return null;
}

function contentBuilder($element)
{
  $body = [];
  if (!empty($element)) {
    foreach ($element as $block) {
      switch ($block->type) {
        case 'heading':
        case 'subheading':
        case 'text':
          $body[] = strip_tags($block->text);
          break;
        case 'gallery':
          foreach ($block->images as $image) {
            $body[] = $image->altText;
          }
        default:
      }
    }
  }
}

function portrait($element)
{
  !empty($element->portrait) ? $element->portrait->one()->url : null;
}

function sectionPriority($element)
{
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

function searchFilter($element)
{
  $handle = !empty($element->section) ? $element->section->handle : $element->calendar->handle;
  switch ($handle) {
    case 'news':
    case 'processes':
    case 'projects':
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
      'calendar' => $event->calendar->handle,
      'date' => $event->startDate->timestamp * 1000,
      'displayDate' => $event->startDate->format('F j, Y'),
      'body' => strip_tags($event->body),
      'contact' => $event->eventContact,
      'eventImage' => $event->eventImage->one()->url ?? null,
      'boardsCommissions' => $boardsCommissions,
      'departments' => $departments,
      'officials' => $officials,
      'projects' => $projects,
      'topics' => $topics,
      'searchFilter' => searchFilter($event),
    ];
  }
}

class documentsTransform extends TransformerAbstract
{
  public function transform(Entry $entry)
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
    if (!empty($entry->documentType)) {
      foreach ($entry->documentType as $value) {
        $types[] = $value->title;
      }
    }
    return [
      'title' => $entry->title,
      'section' => $entry->section->handle,
      'type' => $entry->type->handle,
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

class allTransform extends TransformerAbstract
{
  public function transform(Entry $entry)
  {
    $boardsCommissions = enumEntries("boardsCommissions", $entry);
    $departments = enumEntries("departments", $entry);
    $officials = enumEntries("officials", $entry);
    $projects = enumEntries("projects", $entry);
    $resources = enumEntries("resources", $entry);
    $services = enumEntries("services", $entry);
    $topics = enumEntries("topics", $entry);
    $documents = enumEntries("documents", $entry);
    $bodyMatrix = contentBuilder($entry->contentBuilder);
    return [
      'title' => $entry->title,
      'url' => entryUrl($entry),
      'section' => $entry->section->handle,
      'type' => $entry->type->handle,
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
  /*
     * Scout listens to numerous Element events to keep them updated in
     * their respective indices. You can disable these and update
     * your indices manually using the commands.
     */
  'sync' => true,

  /*
     * By default Scout handles all indexing in a queued job, you can disable
     * this so the indices are updated as soon as the elements are updated
     */
  'queue' => true,

  /*
     * The connection timeout (in seconds), increase this only if necessary
     */
  'connect_timeout' => 1,

  /*
     * The batch size Scout uses when importing a large amount of elements
     */
  'batch_size' => 1000,

  /*
     * The Algolia Application ID, this id can be found in your Algolia Account
     * https://www.algolia.com/api-keys. This id is used to update records.
     */
  'application_id' => getenv('ALGOLIA_APP_ID'),

  /*
     * The Algolia Admin API key, this key can be found in your Algolia Account
     * https://www.algolia.com/api-keys. This key is used to update records.
     */
  'admin_api_key'  => getenv('ALGOLIA_ADMIN_API'),

  /*
     * The Algolia search API key, this key can be found in your Algolia Account
     * https://www.algolia.com/api-keys. This search key is not used in Scout
     * but can be used through the Scout variable in your template files.
     */
  'search_api_key' => getenv('ALGOLIA_SEARCH_API'), //optional

  /*
     * A collection of indices that Scout should sync to, these can be configured
     * by using the \rias\scout\ScoutIndex::create('IndexName') command. Each
     * index should define an ElementType, criteria and a transformer.
     */
  'indices'       => [
    // BEGIN DOCUMENTS INDEX
    \rias\scout\ScoutIndex::create(getenv('ENVIRONMENT') . '_documents')
        // Scout uses this by default, so this is optional
        ->elementType(\craft\elements\Entry::class)
        // If you don't define a siteId, the primary site is used
        ->criteria(function (\craft\elements\db\EntryQuery $query) {
          return $query
            ->section(['documents', 'documentPackets'])
            ->with(['boardsCommissions', 'departments', 'officials', 'projects', 'resources', 'services', 'topics', 'documentType', 'documents']);
        })
        // The element gets passed into the transform function, you can omit
        // this and Scout will use the \rias\scout\ElementTransformer class 
        // instead
        ->transformer(new documentsTransform())
        // You can use this to define index settings that get synced when 
        // you call the ./craft scout/settings/update console command. This way 
        // you can keep your index settings in source control. The IndexSettings
        // object provides autocompletion for all Algolia's settings
        ->indexSettings(
          \rias\scout\IndexSettings::create()
          ->attributesForFaceting(['boardsCommissions', 'departments', 'officials', 'documentType'])
        ),
        \rias\scout\ScoutIndex::create(getenv('ENVIRONMENT') . '_calendars')
        ->elementType(\Solspace\Calendar\Elements\Event::class)
        ->criteria(function (Solspace\Calendar\Elements\Db\EventQuery $query) {
          return $query
            ->with(['boardsCommissions', 'departments', 'officials', 'projects', 'topics']);
        })
        ->transformer(new eventsTransform())
        ->indexSettings(
          \rias\scout\IndexSettings::create()
          ->attributesForFaceting(['boardsCommissions', 'departments', 'officials'])
        ),  
        \rias\scout\ScoutIndex::create(getenv('ENVIRONMENT') . '_all')
        ->elementType(\craft\elements\Entry::class)
        ->criteria(function (\craft\elements\db\EntryQuery $query) {
          return $query
            ->section(['boardsCommissions', 'departments', 'news',  'officials', 'processes', 'projects', 'resources', 'services', 'staff', 'teams', 'topics', 'volunteers'])
            ->with(['boardsCommissions', 'contentBuilder', 'departments', 'documents', 'documentType', 'officials', 'projects', 'resources', 'services', 'topics']);
        })
        ->transformer(new allTransform())
  
    ],
];