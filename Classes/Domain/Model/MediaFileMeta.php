<?php

namespace RKW\RkwProjects\Domain\Model;

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

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class MediaFileMeta
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwProjects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class MediaFileMeta extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Projects>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $txRkwprojectsProjectUid = null;


    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }


    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects(): void
    {
        $this->txRkwprojectsProjectUid = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }


    /**
     * Adds a Projects
     *
     * @param \RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUid
     * @return void
     */
    public function addTxRkwprojectsProjectUid(Projects $txRkwprojectsProjectUid): void
    {
        $this->txRkwprojectsProjectUid->attach($txRkwprojectsProjectUid);
    }


    /**
     * Removes a Projects
     *
     * @param \RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUidToRemove The Projects to be removed
     * @return void
     */
    public function removeTxRkwprojectsProjectUid(Projects $txRkwprojectsProjectUidToRemove): void
    {
        $this->txRkwprojectsProjectUid->detach($txRkwprojectsProjectUidToRemove);
    }


    /**
     * Returns the txRkwprojectsProjectUid
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Projects>
     */
    public function getTxRkwprojectsProjectUid(): ObjectStorage
    {
        return $this->txRkwprojectsProjectUid;
    }


    /**
     * Sets the txRkwprojectsProjectUid
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Projects> $txRkwprojectsProjectUid
     * @return void
     */
    public function setTxRkwprojectsProjectUid(ObjectStorage $txRkwprojectsProjectUid): void
    {
        $this->txRkwprojectsProjectUid = $txRkwprojectsProjectUid;
    }

}
