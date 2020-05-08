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
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_timeline_domain_model_timelineevent',
                'foreign_table_where' => 'AND tx_timeline_domain_model_timelineevent.uid=###REC_FIELD_l10n_parent### AND tx_timeline_domain_model_timelineevent.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' =>'passthrough'
            ],
        ],
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
                'default' => 0
            )
        ),
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
                'renderType' => 'inputLink',
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
                'eval' => 'trim',
                'cols' => 40,
                'rows' => 6
            ],
            'defaultExtras' => 'richtext[]'
        ],
        'start_date' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_start',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => '20',
                'eval' => 'date,required'
            ]
        ],
        'end_date' => [
            'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.item_end',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
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
        '0' => ['showitem' => 'sys_language_uid, l10n_parent, hidden, title, event_link, description, start_date, end_date, format, side']
    ]
];

