<?php

namespace RKW\RkwProjects\Domain\Repository;
/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Class ProjectsRepository
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwProjects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ProjectsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * initializeObject
     *
     * @return void
     */
    public function initializeObject()
    {
        /** @var $querySettings \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings */
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');

        // don't add the pid constraint
        $querySettings->setRespectStoragePage(false);

        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * findAllSorted
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array
     */
    public function findAllSorted()
    {
        $query = $this->createQuery();
        $query->setOrderings(
            array(
                'pid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
                'internalName' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
                'name'         => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            )
        );

        return $query->execute();
    }



    /**
     * findAllByVisibility
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array
     */
    public function findAllByVisibility()
    {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('visibility', 1)
        );
        $query->setOrderings(
            array('short_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING)
        );

        return $query->execute();
        //===
    }


    /**
     * findByVisibilityAndSelection
     *
     * @param mixed $projectsList
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findByVisibilityAndSelection($projectsList = null)
    {
        $query = $this->createQuery();
        $constraints = array();

        // if projectsList is set
        if (array_filter($projectsList)) {
            $constraints[] = $query->in('uid', $projectsList);
        }

        // get only visible entries
        $constraints[] = $query->equals('visibility', 1);

        // set ordering
        $query->setOrderings(
            array('short_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING)
        );

        // NOW: construct final query!
        if ($constraints) {
            $query->matching($query->logicalAnd($constraints));
        }

        // if no projectsList is given, this execute is equal to a findAll()
        return $query->execute();
        //===
    }
}