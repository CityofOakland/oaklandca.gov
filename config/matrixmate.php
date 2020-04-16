<?php

$defaultTextBlock = [
  'label' => 'Text',
  'types' => ['heading', 'subheading', 'text', ],
];
$topicsTextBlock = [
  'label' => 'Text',
  'types' => ['heading', 'subheading', 'text', 'textImageBlock'],
];
$adminTextBlock = $topicsTextBlock;
$defaultLinksBlock = [
  'label' => 'Links',
  'types' => ['largeEntryLinks', 'smallEntryLinks', 'newsEntries', 'eventEntries', 'meetingEntries']
];
$adminLinksBlock = [
  'label' => 'Links',
  'types' => ['linksWithDescriptions', 'largeEntryLinks', 'smallEntryLinks', 'newsEntries', 'eventEntries', 'meetingEntries']
];
$adminOnlyBlock = [
  'label' => 'Admin',
  'types' => ['customTemplate', 'embeddedContent']
];
$defaultImagesBlock = [
  'label' => 'Images',
  'types' => ['image', 'gallery']
];
$defaultTablesBlock = [
  'label' => 'Tables',
  'types' => ['table2Columns', 'table3Columns', 'table4Columns']
];

$user = Craft::$app->getUser();
$isUserAdmin = $user->getIsAdmin();
$isContentBuilder = $user->getIdentity() ? $user->getIdentity()->isInGroup('contentBuilderUser') : null;

if ($isUserAdmin) {
  $defaultBlock = [
    $adminTextBlock,
    $adminLinksBlock,
    $defaultImagesBlock,
    $defaultTablesBlock,
    $adminOnlyBlock
  ];
  $departmentsBlock = $defaultBlock;
  $topicsBlock = $defaultBlock;
  $newsPressBlock = $defaultBlock;
  $resourcesBlock = $defaultBlock;
  $servicesBlock = $defaultBlock;
} elseif ($isContentBuilder) {
  $defaultBlock = [
    $defaultTextBlock
  ];
  $departmentsBlock = [
    $defaultTextBlock,
    $defaultLinksBlock
  ];
  $topicsBlock = [
    $topicsTextBlock,
    $defaultLinksBlock,
    $defaultImagesBlock,
    $defaultTablesBlock
  ];
  $newsPressBlock = [
    $defaultTextBlock,
    $defaultImagesBlock,
    $defaultTablesBlock
  ];
  $resourcesBlock = [
    $defaultTextBlock,
    $defaultImagesBlock,
    $defaultTablesBlock
  ];
  $servicesBlock = [
    $defaultTextBlock,
    $defaultLinksBlock,
  ];
} else {
  $defaultBlock = [''];
  $departmentsBlock = $defaultBlock;
  $topicsBlock = $defaultBlock;
  $newsPressBlock = $defaultBlock;
  $resourcesBlock = [
    $defaultTextBlock
  ];
  $servicesBlock = [
    $defaultTextBlock
  ];
};

return [
  'fields' => [
    'contentBuilder' => [
      '*' => [
        'groups' => $defaultBlock,
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:departments,section:boardsCommissions,section:officials' => [
        'groups' => $departmentsBlock,
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:topics' => [
        'groups' => $topicsBlock,
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:news,section:pressReleases' => [
        'groups' => $newsPressBlock,
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:resources' => [
        'groups' => $resourcesBlock,
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:services' => [
        'groups' => $servicesBlock,
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
    ],
  ],
];
