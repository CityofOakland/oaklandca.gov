<?php

$isUserAdmin = Craft::$app->getUser()->getIsAdmin();

return [
  'fields' => [
    'contentBuilder' => [
      '*' => !$isUserAdmin ? [
        'groups' => [
          [
            'label' => 'Text',
            'types' => ['heading', 'subheading', 'text'],
          ]
        ],
        'hideUngroupedTypes' => true,
      ] : null,
      'section:departments' => !$isUserAdmin ? [
        'groups' => [
          [
            'label' => 'Text',
            'types' => ['heading', 'subheading', 'text'],
          ],
          [
            'label' => 'Links',
            'types' => ['links2Entries', 'links3Entries', 'links6Entries', 'links9Entries', 'newsEntries']
          ],
        ],
        'types' => [
          'newsEntries' => [
            'maxLimit' => 1
          ]
        ],
        'hideUngroupedTypes' => true,
      ] : null,
      'section:topics' => !$isUserAdmin ? [
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
      'section:news,section:pressReleases,section:resources' => !$isUserAdmin ? [
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
