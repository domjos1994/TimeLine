<?php

use GeorgRinger\News\Domain\Repository\NewsRepository;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function() {
    ExtensionUtility::configurePlugin(
        'DominicJoas.Timeline', 'Pi1', ['Timeline' => 'list',], ['Timeline' => '',]
    );

    // wizards
    ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
		    elements {
                    timeline {
                        iconIdentifier = timeline-icon
                        title = LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timeline
                        description = LLL:EXT:timeline/Resources/Private/Language/locallang_db.xlf:tx_timeline_domain_model_timelineevent.description
                        tt_content_defValues {
                            CType = list
                            list_type = timeline_pi1
                        }
                    }
                }
                show = *
            }
        }'
    );
}, "timeline");

GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)->registerImplementation(NewsRepository::class, NewsRepository::class);
