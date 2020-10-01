<?php

$textBlock = [
  'label' => 'Text',
  'types' => ['heading', 'subheading', 'text', 'textImageBlock', 'noticeBlock'],
];
$adminTextBlock = $textBlock;
$linksBlock = [
  'label' => 'Links',
  'types' => ['linksWithDescriptions', 'largeEntryLinks', 'smallEntryLinks', 'newsEntries', 'eventEntries', 'meetingEntries', 'callToAction'],
];
$adminLinksBlock = [
  'label' => 'Links',
  'types' => ['linksWithDescriptions', 'linkBlocksWithImages', 'linkBlocksWithIcons', 'largeEntryLinks', 'smallEntryLinks', 'newsEntries', 'eventEntries', 'meetingEntries', 'callToAction']
];
// $pageElementsBlock = [
//   'label' => 'Page Elements',
//   'types' => ['statsBlockWithIcons']
// ];
$adminPageElementsBlock = [
  'label' => 'Page Elements',
  'types' => ['statsBlockWithIcons', 'timeline', 'customTemplate', 'embeddedContent', 'emailSignup']
];
$imagesBlock = [
  'label' => 'Images',
  'types' => ['image', 'gallery']
];
$tablesBlock = [
  'label' => 'Tables',
  'types' => ['table2Columns', 'table3Columns', 'table4Columns']
];

$user = Craft::$app->getUser();
$isUserAdmin = $user->getIsAdmin();

if ($isUserAdmin) {
  $defaultBlock = [
    $adminTextBlock,
    $adminLinksBlock,
    $imagesBlock,
    $tablesBlock,
    $adminPageElementsBlock
  ];
  $departmentsBlock = $defaultBlock;
  $topicsBlock = $defaultBlock;
  $newsPressBlock = $defaultBlock;
  $resourcesBlock = $defaultBlock;
  $servicesBlock = $defaultBlock;
} else {
  $defaultBlock = [
    $textBlock
  ];
  $departmentsBlock = [
    $textBlock,
    $linksBlock
  ];
  $topicsBlock = [
    $textBlock,
    $linksBlock,
    $imagesBlock,
    $tablesBlock,
  ];
  $newsPressBlock = [
    $textBlock,
    $imagesBlock,
    $tablesBlock,
  ];
  $resourcesBlock = [
    $textBlock,
    $imagesBlock,
    $tablesBlock,
  ];
  $servicesBlock = [
    $textBlock,
    $linksBlock,
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
    'recordings' => [
      'hiddenTypes' => ($isUserAdmin ? '' : ['embed']),
    ],
    // 'addresses' => [
    //   'hiddenTypes' => ['onlineLocation'],
    // ],
  ],
];
