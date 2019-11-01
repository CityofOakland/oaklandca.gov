<?php

$isUserAdmin = Craft::$app->getUser()->getIsAdmin();
$defaultTextBlock = [
  'label' => 'Text',
  'types' => ['heading', 'subheading', 'text'],
];
$defaultLinksBlock = [
  'label' => 'Links',
  'types' => ['largeEntryLinks', 'mediumEntryLinks', 'smallEntryLinks', 'newsEntries', 'eventEntries', 'meetingEntries']
];
$defaultImagesBlock = [
  'label' => 'Images',
  'types' => ['image', 'gallery']
];
$defaultTablesBlock = [
  'label' => 'Tables',
  'types' => ['table2Columns', 'table3Columns', 'table4Columns']
];

return [
  'fields' => [
    'contentBuilder' => [
      '*' => !$isUserAdmin ? [
        'groups' => [
          $defaultTextBlock
        ],
        'hideUngroupedTypes' => true,
      ] : [
        'groups' => [
          $defaultTextBlock,
          $defaultLinksBlock,
          $defaultImagesBlock,
          $defaultTablesBlock
        ],
      ],
      'section:departments' => !$isUserAdmin ? [
        'groups' => [
          $defaultTextBlock,
          $defaultLinksBlock,
        ],
        'hideUngroupedTypes' => true,
      ] : null,
      'section:topics' => !$isUserAdmin ? [
        'groups' => [
          $defaultTextBlock,
          $defaultLinksBlock,
          $defaultImagesBlock,
          $defaultTablesBlock
        ],
        'hideUngroupedTypes' => true,
      ] : null,
      'section:news,section:pressReleases,section:resources' => !$isUserAdmin ? [
        'groups' => [
          $defaultTextBlock,
          $defaultImagesBlock,
          $defaultTablesBlock
        ],
        'hideUngroupedTypes' => true,
      ] : null,
    ],
  ],
];
