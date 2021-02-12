<?php

namespace RKW\RkwProjects\TCA;

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

use TYPO3\CMS\Extbase\Utility\LocalizationUtility;


/**
 * Class OptionLabels
 *
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwEtracker
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class OptionLabels
{
    /**
     * Fetches labels for projects
     *
     * @params array &$params
     * @params object $pObj
     * @return void
     */
    public static function getExtendedProjectNamesByUid(array &$params, $pObj): void
    {

        /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);

        /** @var \RKW\RkwProjects\Domain\Repository\ProjectsRepository $projectRepository */
        $projectRepository = $objectManager->get(\RKW\RkwProjects\Domain\Repository\ProjectsRepository::class);
        $result = $projectRepository->findAllSorted();

        // build extended names
        $extendedNames = [];

        /** @var \RKW\RkwProjects\Domain\Model\Projects $project */
        foreach ($result as $project) {
            $extendedNames[$project->getUid()] = self::getExtendedProjectName($project);
        }

        // override given values
        foreach ($params['items'] as &$item) {
            if (isset($extendedNames[$item[1]])) {
                $item[0] = $extendedNames[$item[1]];
            }
        }
    }


    /**
     * Return extended name for a project
     *
     * @param \RKW\RkwProjects\Domain\Model\Projects $project
     * @return string
     */
    public static function getExtendedProjectName(\RKW\RkwProjects\Domain\Model\Projects $project): string
    {

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
            ) . ': ' . $project->getpid()
        );

        $status = LocalizationUtility::translate(
            'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.status.I.' . $project->getStatus(),
            'rkw_projects'
        );

        $projectName = ($project->getShortName() ? $project->getShortName() : $project->getName());
        return $folder
            . ' - ' . $status
            . ' - ' . $projectName;

    }

}