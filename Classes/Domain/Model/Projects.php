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
 * Class Projects
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwProjects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Projects extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * shortName
     *
     * @var string
     * @validate NotEmpty
     */
    protected $shortName = '';

    /**
     * internalName
     *
     * @var string
     * @validate NotEmpty
     */
    protected $internalName = '';

    /**
     * visibility
     *
     * @var integer
     */
    protected $visibility = 0;

    /**
     * partnerLogos
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $partnerLogos = null;

    /**
     * projectPid
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Pages>
     * @cascade remove
     */
    protected $projectPid = null;

    /**
     * projectStaff
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors>
     */
    protected $projectStaff = null;

    /**
     * projectManager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors>
     * @cascade remove
     */
    protected $projectManager = null;

    /**
     * sysCategory
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory>
     */
    protected $sysCategory = null;

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
        $this->partnerLogos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->projectPid = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->projectStaff = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->projectManager = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->sysCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the shortName
     *
     * @return string $shortName
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Sets the shortName
     *
     * @param string $shortName
     * @return void
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * Returns the internalName
     *
     * @return string $internalName
     */
    public function getInternalName()
    {
        return $this->internalName;
    }

    /**
     * Sets the internalName
     *
     * @param string $internalName
     * @return void
     */
    public function setInternalName($internalName)
    {
        $this->internalName = $internalName;
    }

    /**
     * Returns the visibility
     *
     * @return string $type
     */
    public function getVisibility()
    {
        return $this->visibility;
        //===
    }

    /**
     * Sets the visibility
     *
     * @param string $visibility
     * @return void
     */
    public function setVisibility($visibility)
    {
        $this->visibility = intval($visibility);
    }

    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $partnerLogo
     * @return void
     */
    public function addPartnerLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $partnerLogo)
    {
        $this->partnerLogos->attach($partnerLogo);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $partnerLogoToRemove The FileReference to be removed
     * @return void
     */
    public function removePartnerLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $partnerLogoToRemove)
    {
        $this->partnerLogos->detach($partnerLogoToRemove);
    }

    /**
     * Returns the partnerLogos
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $partnerLogos
     */
    public function getPartnerLogos()
    {
        return $this->partnerLogos;
    }

    /**
     * Sets the partnerLogos
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $partnerLogos
     * @return void
     */
    public function setPartnerLogos(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $partnerLogos)
    {
        $this->partnerLogos = $partnerLogos;
    }

    /**
     * Adds a Pages
     *
     * @param \RKW\RkwProjects\Domain\Model\Pages $projectPid
     * @return void
     */
    public function addProjectPid(\RKW\RkwProjects\Domain\Model\Pages $projectPid)
    {
        $this->projectPid->attach($projectPid);
    }

    /**
     * Removes a Pages
     *
     * @param \RKW\RkwProjects\Domain\Model\Pages $projectPidToRemove The Pages to be removed
     * @return void
     */
    public function removeProjectPid(\RKW\RkwProjects\Domain\Model\Pages $projectPidToRemove)
    {
        $this->projectPid->detach($projectPidToRemove);
    }

    /**
     * Returns the projectPid
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Pages> $projectPid
     */
    public function getProjectPid()
    {
        return $this->projectPid;
    }

    /**
     * Sets the projectPid
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Pages> $projectPid
     * @return void
     */
    public function setProjectPid(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $projectPid)
    {
        $this->projectPid = $projectPid;
    }

    /**
     * Adds a TxRkwauthorsDomainModelAuthors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectStaff
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> projectStaff
     */
    public function addProjectStaff(\RKW\RkwProjects\Domain\Model\Authors $projectStaff)
    {
        $this->projectStaff->attach($projectStaff);
    }

    /**
     * Removes a TxRkwauthorsDomainModelAuthors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectStaffToRemove The Authors to be removed
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> projectStaff
     */
    public function removeProjectStaff(\RKW\RkwProjects\Domain\Model\Authors $projectStaffToRemove)
    {
        $this->projectStaff->detach($projectStaffToRemove);
    }

    /**
     * Returns the projectStaff
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> projectStaff
     */
    public function getProjectStaff()
    {
        return $this->projectStaff;
    }

    /**
     * Sets the projectStaff
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> $projectStaff
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> projectStaff
     */
    public function setProjectStaff(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $projectStaff)
    {
        $this->projectStaff = $projectStaff;
    }

    /**
     * Adds a Authors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectManager
     * @return void
     */
    public function addProjectManager(\RKW\RkwProjects\Domain\Model\Authors $projectManager)
    {
        $this->projectManager->attach($projectManager);
    }

    /**
     * Removes a Authors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectManagerToRemove The Authors to be removed
     * @return void
     */
    public function removeProjectManager(\RKW\RkwProjects\Domain\Model\Authors $projectManagerToRemove)
    {
        $this->projectManager->detach($projectManagerToRemove);
    }

    /**
     * Returns the projectManager
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> $projectManager
     */
    public function getProjectManager()
    {
        return $this->projectManager;
    }

    /**
     * Sets the projectManager
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> $projectManager
     * @return void
     */
    public function setProjectManager(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $projectManager)
    {
        $this->projectManager = $projectManager;
    }

    /**
     * Adds a SysCategory
     *
     * @param \RKW\RkwProjects\Domain\Model\SysCategory $sysCategory
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory> sysCategory
     */
    public function addSysCategory(\RKW\RkwProjects\Domain\Model\SysCategory $sysCategory)
    {
        $this->sysCategory->attach($sysCategory);
    }

    /**
     * Removes a SysCategory
     *
     * @param \RKW\RkwProjects\Domain\Model\SysCategory $sysCategory
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory> sysCategory
     */
    public function removeSysCategory(\RKW\RkwProjects\Domain\Model\SysCategory $sysCategory)
    {
        $this->sysCategory->detach($sysCategory);
    }

    /**
     * Returns the sysCategory
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory> sysCategory
     */
    public function getSysCategory()
    {
        return $this->sysCategory;
    }

    /**
     * Sets the sysCategory
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory> $sysCategory
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory> sysCategory
     */
    public function setSysCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sysCategory)
    {
        $this->sysCategory = $sysCategory;
    }


}