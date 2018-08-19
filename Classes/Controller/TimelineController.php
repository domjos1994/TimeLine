<?php

namespace DominicJoas\Timeline\Controller;

use DominicJoas\Timeline\Domain\Repository\TimelineEventRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class TimelineController extends ActionController {
    private $timelineEventRepository;
    protected $configurationManager;
    private $layout;
    private $color;

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
        
        $tmpColor = $this->settings['color'];
        if(empty($tmpColor)) {
            $this->color = $tsSettings['color'];
        } else {
            $this->color = $tmpColor;
        }
    }

    public function listAction() {
        $uid = $this->configurationManager->getContentObject()->data['uid'];
        $timelineEvents = $this->timelineEventRepository->findAll();
        
        if(!is_null($timelineEvents)) {
            if(empty($timelineEvents->toArray())) {
                $query = $this->timelineEventRepository->getContentElementEntries($uid);
                $timelineEvents = $query->toArray();
            }
        } else {
            $query = $this->timelineEventRepository->getContentElementEntries($uid);
            $timelineEvents = $query->toArray();
        }

        $uniqueIDs = null;
        $i = 0;
        foreach($timelineEvents as $var) {
            $uniqueIDs[$i] = uniqid(rand(), true);
            $i++;
        }
        $this->view->assign('events', $timelineEvents);
        $this->view->assign('uid', $uid);
        $this->view->assign("layout", $this->layout);
        $this->view->assign("color", $this->color);
        return $this->view->render();
    }

}
