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
    include('_scoutpartials/news.php'),
    include('_scoutpartials/boards.php'),
    include('_scoutpartials/departments.php'),
    include('_scoutpartials/documents.php'),
    include('_scoutpartials/documentpackets.php'),
    include('_scoutpartials/projects.php'),
    include('_scoutpartials/resources.php'),
    include('_scoutpartials/services.php'),
    include('_scoutpartials/311.php'),
    include('_scoutpartials/topics.php'),
    include('_scoutpartials/events.php'),
    include('_scoutpartials/meetings.php'),
    include('_scoutpartials/citycouncil.php'),
    include('_scoutpartials/staff.php'),
  ],
];
