<?php

$isUserAdmin = Craft::$app->getUser()->getIsAdmin();

return [
  'fields' => [
    'contentBuilder' => [
      'section:documents,section:documentPackets,section:projects,section:processes,section:services' => !$isUserAdmin ? [
        'groups' => [
          [
            'label' => 'Text',
            'types' => ['heading', 'subheading', 'text'],
          ]
        ],
        'hideUngroupedTypes' => true,
      ] : null,
      'section:topics' => $isUserAdmin ? [
        'groups' => [
          [
            'label' => 'Text',
            'types' => ['heading', 'subheading', 'text'],
          ],
          [
            'label' => 'Images',
            'types' => ['image', 'gallery'],
          ],
          [
            'label' => 'Tables',
            'types' => ['table2Columns', 'table3Columns', 'table4Columns']
          ]
        ],
        'hideUngroupedTypes' => true,
      ] : null,
      'section:news,section:pressReleases,section:resources' => $isUserAdmin ? [
        'groups' => [
          [
            'label' => 'Text',
            'types' => ['heading', 'subheading', 'text'],
          ],
          [
            'label' => 'Images',
            'types' => ['image', 'gallery'],
          ],
          [
            'label' => 'Tables',
            'types' => ['table2Columns', 'table3Columns', 'table4Columns']
          ]
        ],
        'hideUngroupedTypes' => true,
      ] : null,
    ],
  ],
];
