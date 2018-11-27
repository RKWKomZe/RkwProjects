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

/**
 * Class MediaFileMeta
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwProjects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class MediaFileMeta extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * txRkwprojectsProjectUid
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Projects>
     * @cascade remove
     */
    protected $txRkwprojectsProjectUid = null;

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
    protected function initStorageObjects()
    {
        $this->txRkwprojectsProjectUid = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Projects
     *
     * @param \RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUid
     * @return void
     */
    public function addTxRkwprojectsProjectUid(\RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUid)
    {
        $this->txRkwprojectsProjectUid->attach($txRkwprojectsProjectUid);
    }

    /**
     * Removes a Projects
     *
     * @param \RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUidToRemove The Projects to be removed
     * @return void
     */
    public function removeTxRkwprojectsProjectUid(\RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUidToRemove)
    {
        $this->txRkwprojectsProjectUid->detach($txRkwprojectsProjectUidToRemove);
    }

    /**
     * Returns the txRkwprojectsProjectUid
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Projects> $txRkwprojectsProjectUid
     */
    public function getTxRkwprojectsProjectUid()
    {
        return $this->txRkwprojectsProjectUid;
    }

    /**
     * Sets the txRkwprojectsProjectUid
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Projects> $txRkwprojectsProjectUid
     * @return void
     */
    public function setTxRkwprojectsProjectUid(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $txRkwprojectsProjectUid)
    {
        $this->txRkwprojectsProjectUid = $txRkwprojectsProjectUid;
    }

}