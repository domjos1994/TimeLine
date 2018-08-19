<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'DominicJoas.Timeline',
    'Pi1',
    'Timeline',
    'timeline-icon'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', array(
    'tx_timeline_timelineevents' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'tx_timeline_domain_model_timelineevent',
            'foreign_field' => 'timetable_id',
            'foreign_label' => 'title',
            'maxitems' => '100',
            'appearance' => array(
                #'collapseAll' => 0,
                'expandSingle' => true,
                'newRecordLinkAddTitle' => 1,
                'newRecordLinkPosition' => 'both',
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => true,
            ),
            'behaviour' => array(
                'localizationMode' => 'select',
                'localizeChildrenAtParentLocalization' => true,
            ),
        )
    ),
));