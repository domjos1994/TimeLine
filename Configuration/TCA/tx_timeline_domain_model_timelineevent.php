<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent',
        'label' => 'title',
        'iconfile' => 'EXT:timeline/Resources/Public/Icons/TimelineEvent.svg',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
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
        'event_link' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_event_title',
            'config' => array(
                'type' => 'input',
                'wizards' => array(
                    'link' => array(
                        'type' => 'popup',
                        'title' => 'Link',
                        'icon' => 'link_popup.gif',
                        'module' => array(
                            'name' => 'wizard_element_browser',
                            'urlParameters' => array(
                                'mode' => 'wizard'
                            )
                        ),
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
                    ),
                ),
                'softref' => 'typolink[linkList]',
            ),
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
        'format' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_format',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '15',
                'default' => 'd.m.Y'
            ]
        ],
        'side' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_side',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_side.right', '0'),
                    array('LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_side.left', '1'),
                ),
                'size' => 1,
                'maxitems' => 1,
            ]
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'title, event_link, description, start_date, end_date, format, side']
    ]
];

