<?php

namespace DominicJoas\Timeline\Controller;

use DominicJoas\Timeline\Domain\Repository\TimelineEventRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class TimelineController extends ActionController {
    private $timelineEventRepository;
    protected $configurationManager;
    private $layout;
    private $year;
    private $color, $foreColor;
    private $order;

    public function injectTimelineEventRepository(TimelineEventRepository $timelineEventRepository) {
        $this->timelineEventRepository = $timelineEventRepository;
    }
    
    public function injectConfigurationManager(ConfigurationManagerInterface $configurationManager) {
        parent::injectConfigurationManager($configurationManager);
        $this->configurationManager = $configurationManager;
        $tsSettings = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK, "timeline_pi1")['settings'];

        $tmpLayout = $this->settings['layout'];
        if($tmpLayout == 0) {
            $this->layout = str_replace("Layout ", "", $tsSettings['layout']);
        } else {
            $this->layout = $tmpLayout;
        }
        
        $tmpYear = $this->settings['year'];
        if(empty($tmpYear)) {
            $this->year = $tsSettings['year'];
        } else {
            $this->year = $tmpYear;
        }
        
        $tmpColor = $this->settings['back_color'];
        if(empty($tmpColor)) {
            $this->color = $tsSettings['back_color'];
        } else {
            $this->color = $tmpColor;
        }

        $tmpColor = $this->settings['fore_color'];
        if(empty($tmpColor)) {
            $this->foreColor = $tsSettings['fore_color'];
        } else {
            $this->foreColor = $tmpColor;
        }

        $tmpOrder = $this->settings['order'];
        if($tmpOrder == "fromTS") {
            $this->order = $tsSettings['order'];
        } else {
            $this->order = $tmpOrder;
        }
    }

    public function listAction() {
        $uid = $this->configurationManager->getContentObject()->data['_LOCALIZED_UID'];
        if($uid==null) {
            $uid = $this->configurationManager->getContentObject()->data['uid'];
        }
        $timelineEvents = $this->timelineEventRepository->findAll();
        
        if(!is_null($timelineEvents)) {
            if(empty($timelineEvents->toArray())) {
                $query = $this->timelineEventRepository->getContentElementEntries($uid, $this->order);
                $timelineEvents = $query->toArray();
            }
        } else {
            $query = $this->timelineEventRepository->getContentElementEntries($uid, $this->order);
            $timelineEvents = $query->toArray();
        }

        $uniqueIDs = null;
        for($i = 0;$i<=count($timelineEvents)-1; $i++) {
            $uniqueIDs[$i] = uniqid(rand(), true);
        }
        $this->view->assign('events', $timelineEvents);
        $this->view->assign('uid', $uid);
        $this->view->assign("layout", $this->layout);
        $this->view->assign("onlyYear", $this->year);
        $this->view->assign("color", $this->color);
        $this->view->assign("fore_color", $this->foreColor);
        return $this->view->render();
    }

}
