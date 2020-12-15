<?php

namespace RKW\RkwProjects\TCA;

use \RKW\RkwEtracker\Utility\CategoryUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper;
use TYPO3\CMS\Lang\Service\TranslationService;

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
 * Class SelectOptions
 *
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwEtracker
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class SelectOptions
{
    /**
     * Fetches filter for domain
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getExtendedProjectName(array &$params, $pObj)
    {

        /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

        /** @var \RKW\RkwProjects\Domain\Repository\ProjectsRepository $projectRepository */
        $projectRepository = $objectManager->get('RKW\RkwProjects\Domain\Repository\ProjectsRepository');
        $result = $projectRepository->findAllSorted();

        // build extended names
        $extendedNames = [];

        /** @var \RKW\RkwProjects\Domain\Model\Projects $project */
        foreach ($result as $project) {
            if ($project->getName()) {

                $folder = (
                    LocalizationUtility::translate(
                        'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.pid.I.' . $project->getpid(),
                        'rkw_projects'
                    ) ?
                    LocalizationUtility::translate(
                        'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.pid.I.' . $project->getpid(),
                        'rkw_projects'
                    ) :
                    LocalizationUtility::translate(
                        'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.pid',
                        'rkw_projects'
                    ). ': ' . $project->getpid()
                );

                $status = LocalizationUtility::translate(
                    'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.status.I.' . $project->getStatus(),
                    'rkw_projects'
                );
                $projectName = ($project->getInternalName() ? $project->getInternalName() : $project->getName());


                $extendedNames[$project->getUid()] =
                    $folder
                    . ' - ' . $status
                    . ' - ' . $projectName;
            }
        }

        // override values
        foreach ($params['items'] as &$item) {
            if (isset($extendedNames[$item[1]])) {
                $item[0] = $extendedNames[$item[1]];
            }
        }
    }


    /**
     * Fetches filter for domain
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getDomainLabels(array &$params, $pObj)
    {

        /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

        /** @var \RKW\RkwEtracker\Domain\Repository\SysDomainRepository $sysDomainRepository */
        $sysDomainRepository = $objectManager->get('RKW\RkwEtracker\Domain\Repository\SysDomainRepository');
        $result = $sysDomainRepository->findAll();

        /** @var \RKW\RkwEtracker\Domain\Model\SysDomain $sysDomain */
        foreach ($result as $sysDomain) {

            if ($sysDomain->getDomainName()) {

                // just in case of using a DEV-Environment with LIVE-data
                $domain = str_replace('.local', '.de', $sysDomain->getDomainName());
                $params['items'][] = array($domain, $domain);

            }
        }

    }

    /**
     * Fetches filter for category level 1
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getCategoryLabelsLevel1(array &$params, $pObj)
    {

        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rkw_projects')) {

            /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

            /** @var \RKW\RkwBasics\Domain\Repository\DepartmentRepository $departmentRepository */
            $departmentRepository = $objectManager->get('RKW\RkwBasics\Domain\Repository\DepartmentRepository');
            $result = $departmentRepository->findAllSorted();

            /** @var \RKW\RkwBasics\Domain\Model\Department $department */
            foreach ($result as $department) {
                if ($department->getName()) {
                    $params['items'][] = array(($department->getInternalName() ? CategoryUtility::cleanUpCategoryName($department->getInternalName()) : CategoryUtility::cleanUpCategoryName($department->getName())), ($department->getInternalName() ? CategoryUtility::cleanUpCategoryName($department->getInternalName()) : CategoryUtility::cleanUpCategoryName($department->getName())));
                }
            }
        }
    }


    /**
     * Fetches filter for category level 2
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getCategoryLabelsLevel2(array &$params, $pObj)
    {

        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rkw_projects')) {

            /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

            /** @var \RKW\RkwProjects\Domain\Repository\ProjectsRepository $projectRepository */
            $projectRepository = $objectManager->get('RKW\RkwProjects\Domain\Repository\ProjectsRepository');
            $result = $projectRepository->findAllSorted();

            $params['items'][] = array('- DEFAULT - ', 'Default');

            /** @var \RKW\RkwProjects\Domain\Model\Projects $project */
            foreach ($result as $project) {
                if ($project->getName()) {
                    $params['items'][] = array(($project->getInternalName() ? CategoryUtility::cleanUpCategoryName($project->getInternalName()) : CategoryUtility::cleanUpCategoryName($project->getName())), ($project->getInternalName() ? CategoryUtility::cleanUpCategoryName($project->getInternalName()) : CategoryUtility::cleanUpCategoryName($project->getName())));
                }
            }
        }
    }


    /**
     * Fetches filter for category level 3
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getCategoryLabelsLevel3(array &$params, $pObj)
    {

        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rkw_projects')) {

            /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

            /** @var \RKW\RkwBasics\Domain\Repository\DocumentTypeRepository $documentTypeRepository */
            $documentTypeRepository = $objectManager->get('RKW\RkwBasics\Domain\Repository\DocumentTypeRepository');
            $result = $documentTypeRepository->findAllSorted();

            /** @var \RKW\RkwBasics\Domain\Model\DocumentType $documentType */
            foreach ($result as $documentType) {
                if ($documentType->getName()) {
                    $params['items'][] = array(($documentType->getInternalName() ? CategoryUtility::cleanUpCategoryName($documentType->getInternalName()) : CategoryUtility::cleanUpCategoryName($documentType->getName())), ($documentType->getInternalName() ? CategoryUtility::cleanUpCategoryName($documentType->getInternalName()) : CategoryUtility::cleanUpCategoryName($documentType->getName())));
                }
            }
        }
    }


    /**
     * Fetches filter for category level 4
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getCategoryLabelsLevel4(array &$params, $pObj)
    {
        // nothing here
    }

    /**
     * Fetches filter for category level 5
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getCategoryLabelsLevel5(array &$params, $pObj)
    {
        // nothing here
    }

    /**
     * Get all available download labels
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public function getDownloadLabels(array &$params, $pObj)
    {

        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rkw_projects')) {

            /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

            /** @var \RKW\RkwProjects\Domain\Repository\ProjectsRepository $projectRepository */
            $projectRepository = $objectManager->get('RKW\RkwProjects\Domain\Repository\ProjectsRepository');
            $result = $projectRepository->findAllSorted();

            $params['items'][] = array('- DEFAULT - ', 'Default');

            /** @var \RKW\RkwProjects\Domain\Model\Projects $project */
            foreach ($result as $project) {
                if ($project->getName()) {
                    $params['items'][] = array(($project->getInternalName() ? CategoryUtility::cleanUpCategoryName($project->getInternalName()) : CategoryUtility::cleanUpCategoryName($project->getName())), ($project->getInternalName() ? CategoryUtility::cleanUpCategoryName($project->getInternalName()) : CategoryUtility::cleanUpCategoryName($project->getName())));
                }
            }
        }
    }


}