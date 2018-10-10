<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
    'endpoints' => [
        'volunteers.json' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => [
                  'section' => 'oldStaff',
                  'employmentType' => 'volunteer'
                ],
                'transformer' => function(Entry $entry) {
                    return [
                        'title' => $entry->title,
                        'firstName' => $entry->firstName,
                        'middleInitial' => $entry->middleInitial,
                        'lastName' => $entry->lastName,
                        'jobTitle' => $entry->jobTitle,
                        'phoneNumber' => $entry->phoneNumber,
                        'emailAddress' => $entry->emailAddress,
                        'departmentOfficialBoardCommission' => ! empty($entry->departmentOfficialBoardCommission->one()) ? (string) $entry->departmentOfficialBoardCommission->one()->title : null,
                        'bio' => (string) $entry->bio,
                        'portrait' => ! empty($entry->portrait->one()) ? (string) $entry->portrait->one()->url : null,

                    ];
                },
            ];
        },
    ]
];
