<?php

namespace DominicJoas\Timeline\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class TimelineEvent extends AbstractEntity {
    
    /**
     * The title of the Event
     *
     * @var string
     * */
    protected $title = '';
    
    /**
     * The description of the Event
     *
     * @var string
     * */
    protected $description = '';
    
    /**
     * The start-date of the Event
     *
     * @var int
     * */
    protected $startDate = 0;
    
    /**
     * The End-Date of the Event
     *
     * @var int
     * */
    protected $endDate = 0;

    public function __construct($title = '', $description = '', $startDate = null, $endDate = null) {
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

}

