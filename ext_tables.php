<?php

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function($extKey) {
    ExtensionManagementUtility::addStaticFile($extKey, "Configuration/Typoscript", "TimeLine");
    ExtensionManagementUtility::addLLrefForTCAdescr('tx_timeline_domain_model_timelineevent', 'EXT:timeline/Resources/Private/Language/locallang_db.xlf');
    ExtensionManagementUtility::allowTableOnStandardPages('tx_timeline_domain_model_timelineevent');
    ExtensionManagementUtility::addPiFlexFormValue("*", 'FILE:EXT:' . $extKey . '/Configuration/FlexForms/flexform_timeline.xml');
}, "timeline");

$iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
$iconRegistry->registerIcon("timeline-icon", SvgIconProvider::class, ['source' => 'EXT:timeline/Resources/Public/Icons/Timeline.svg']);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']["timeline_pi1"] = 'recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']["timeline_pi1"] = 'pi_flexform,tx_timeline_timelineevents';