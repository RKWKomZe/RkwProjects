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

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Projects
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwProjects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Projects extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     */
    protected string $name = '';


    /**
     * @var string
     */
    protected string $shortName = '';


    /**
     * @var string
     */
    protected string $internalName = '';


    /**
     * @var int
     */
    protected int $visibility = 0;


    /**
     * @var int
     */
    protected int $status = 0;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $partnerLogos = null;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Pages>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $projectPid = null;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors>|null
     */
    protected ?ObjectStorage $projectStaff = null;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $projectManager = null;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory>|null
     */
    protected ?ObjectStorage$sysCategory = null;


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
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * Returns the shortName
     *
     * @return string $shortName
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }


    /**
     * Sets the shortName
     *
     * @param string $shortName
     * @return void
     */
    public function setShortName(string $shortName): void
    {
        $this->shortName = $shortName;
    }


    /**
     * Returns the internalName
     *
     * @return string $internalName
     */
    public function getInternalName(): string
    {
        return $this->internalName;
    }


    /**
     * Sets the internalName
     *
     * @param string $internalName
     * @return void
     */
    public function setInternalName(string $internalName): void
    {
        $this->internalName = $internalName;
    }


    /**
     * Returns the visibility
     *
     * @return int
     */
    public function getVisibility(): int
    {
        return $this->visibility;
    }


    /**
     * Sets the visibility
     *
     * @param int $visibility
     * @return void
     */
    public function setVisibility(int $visibility): void
    {
        $this->visibility = $visibility;
    }


    /**
     * Returns the status
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }


    /**
     * Sets the status
     *
     * @param int $status
     * @return void
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }


    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $partnerLogo
     * @return void
     */
    public function addPartnerLogo(FileReference $partnerLogo): void
    {
        $this->partnerLogos->attach($partnerLogo);
    }


    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $partnerLogoToRemove
     * @return void
     */
    public function removePartnerLogo(FileReference $partnerLogoToRemove): void
    {
        $this->partnerLogos->detach($partnerLogoToRemove);
    }


    /**
     * Returns the partnerLogos
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    public function getPartnerLogos(): ObjectStorage
    {
        return $this->partnerLogos;
    }


    /**
     * Sets the partnerLogos
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $partnerLogos
     * @return void
     */
    public function setPartnerLogos(ObjectStorage $partnerLogos): void
    {
        $this->partnerLogos = $partnerLogos;
    }


    /**
     * Adds a Pages
     *
     * @param \RKW\RkwProjects\Domain\Model\Pages $projectPid
     * @return void
     */
    public function addProjectPid(Pages $projectPid): void
    {
        $this->projectPid->attach($projectPid);
    }


    /**
     * Removes a Pages
     *
     * @param \RKW\RkwProjects\Domain\Model\Pages $projectPidToRemove
     * @return void
     */
    public function removeProjectPid(Pages $projectPidToRemove): void
    {
        $this->projectPid->detach($projectPidToRemove);
    }

    /**
     * Returns the projectPid
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Pages>
     */
    public function getProjectPid(): ObjectStorage
    {
        return $this->projectPid;
    }


    /**
     * Sets the projectPid
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Pages> $projectPid
     * @return void
     */
    public function setProjectPid(ObjectStorage $projectPid): void
    {
        $this->projectPid = $projectPid;
    }


    /**
     * Adds a TxRkwauthorsDomainModelAuthors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectStaff
     * @return void
     */
    public function addProjectStaff(Authors $projectStaff): void
    {
        $this->projectStaff->attach($projectStaff);
    }


    /**
     * Removes a TxRkwauthorsDomainModelAuthors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectStaffToRemove
     * @return void
     */
    public function removeProjectStaff(Authors $projectStaffToRemove): void
    {
        $this->projectStaff->detach($projectStaffToRemove);
    }


    /**
     * Returns the projectStaff
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors>
     */
    public function getProjectStaff(): ObjectStorage
    {
        return $this->projectStaff;
    }


    /**
     * Sets the projectStaff
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> $projectStaff
     * @return void
     */
    public function setProjectStaff(ObjectStorage $projectStaff)
    {
        $this->projectStaff = $projectStaff;
    }


    /**
     * Adds a Authors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectManager
     * @return void
     */
    public function addProjectManager(Authors $projectManager): void
    {
        $this->projectManager->attach($projectManager);
    }


    /**
     * Removes a Authors
     *
     * @param \RKW\RkwProjects\Domain\Model\Authors $projectManagerToRemove
     * @return void
     */
    public function removeProjectManager(Authors $projectManagerToRemove): void
    {
        $this->projectManager->detach($projectManagerToRemove);
    }


    /**
     * Returns the projectManager
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors>
     */
    public function getProjectManager(): ObjectStorage
    {
        return $this->projectManager;
    }


    /**
     * Sets the projectManager
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\Authors> $projectManager
     * @return void
     */
    public function setProjectManager(ObjectStorage $projectManager): void
    {
        $this->projectManager = $projectManager;
    }


    /**
     * Adds a SysCategory
     *
     * @param \RKW\RkwProjects\Domain\Model\SysCategory $sysCategory
     * @return void
     */
    public function addSysCategory(SysCategory $sysCategory): void
    {
        $this->sysCategory->attach($sysCategory);
    }


    /**
     * Removes a SysCategory
     *
     * @param \RKW\RkwProjects\Domain\Model\SysCategory $sysCategory
     * @return void
     */
    public function removeSysCategory(SysCategory $sysCategory): void
    {
        $this->sysCategory->detach($sysCategory);
    }

    /**
     * Returns the sysCategory
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory>
     */
    public function getSysCategory(): ObjectStorage
    {
        return $this->sysCategory;
    }


    /**
     * Sets the sysCategory
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RKW\RkwProjects\Domain\Model\SysCategory> $sysCategory
     * @return void
     */
    public function setSysCategory(ObjectStorage $sysCategory): void
    {
        $this->sysCategory = $sysCategory;
    }


}
