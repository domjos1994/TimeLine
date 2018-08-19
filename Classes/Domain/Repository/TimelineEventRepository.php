<?php

namespace DominicJoas\Timeline\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class TimelineEventRepository extends Repository {

    public function getContentElementEntries($uid) {
        $query = $this->createQuery();
        $query->statement("SELECT * FROM tx_timeline_domain_model_timelineevent WHERE timetable_id=$uid");
        $result = $query->execute();
        return $result;
    }
}
