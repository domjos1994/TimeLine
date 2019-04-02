<?php

namespace DominicJoas\Timeline\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\Repository;

class TimelineEventRepository extends Repository {

	/**
	 * @param int $uid
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
    public function getContentElementEntries($uid) {
        $query = $this->createQuery();

        $query->getQuerySettings()->setRespectStoragePage(false);

        $query->matching(
        	$query->equals('timetable_id', (int)$uid)
        );
        $query->setOrderings([
        	'start_date' => Query::ORDER_ASCENDING,
        ]);


        $result = $query->execute();
        return $result;
    }
}
