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
$adminPageElementsBlock = [
  'label' => 'Page Elements',
  'types' => ['statsBlockWithIcons', 'timeline', 'customTemplate', 'embeddedContent', 'emailSignup', 'meetingsTable', 'officials']
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
        'types' => [
          'meetingsTable' => [
            'maxLimit' => 1
          ],
        ],
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:departments,section:boardsCommissions,section:officials' => [
        'groups' => $departmentsBlock,
        'types' => [
          'meetingsTable' => [
            'maxLimit' => 1
          ],
        ],
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:topics' => [
        'groups' => $topicsBlock,
        'types' => [
          'meetingsTable' => [
            'maxLimit' => 1
          ],
        ],
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:resources' => [
        'groups' => $resourcesBlock,
        'types' => [
          'meetingsTable' => [
            'maxLimit' => 1
          ],
        ],
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
      'section:services' => [
        'groups' => $servicesBlock,
        'types' => [
          'meetingsTable' => [
            'maxLimit' => 1
          ],
        ],
        'hideUngroupedTypes' => ($isUserAdmin ? false : true),
      ],
    ],
    'recordings' => [
      'hiddenTypes' => ($isUserAdmin ? '' : ['embed']),
    ],
  ],
];
