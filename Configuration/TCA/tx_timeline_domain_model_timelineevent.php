<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent',
        'label' => 'title',
        'iconfile' => 'EXT:timeline/Resources/Public/Icons/TimelineEvent.svg',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'uid',
        'searchFields' => 'title',
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        )
    ],
    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_title',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim,required'
            ]
        ],
        'description' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_description',
            'config' => [
                'type' => 'text',
                'eval' => 'trim'
            ]
        ],
        'start_date' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_start',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'date,required'
            ]
        ],
        'end_date' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_end',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'date'
            ]
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'title, description, start_date, end_date']
    ]
];

