<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function (string $extKey) {
        $tempColumnsPages = [

            'tx_rkwprojects_project_uid' => [
                'exclude' => 0,
                'displayCond' => (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rkw_pdf2content')? 'FIELD:tx_rkwpdf2content_is_import_sub:=:0' : ''),
                'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_pages.tx_rkwprojects_project_uid',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingleBox',
                    'foreign_table' => 'tx_rkwprojects_domain_model_projects',
                    'foreign_table_where' => 'AND ((\'###PAGE_TSCONFIG_IDLIST###\' <> \'0\' AND FIND_IN_SET(tx_rkwprojects_domain_model_projects.pid,\'###PAGE_TSCONFIG_IDLIST###\')) OR (\'###PAGE_TSCONFIG_IDLIST###\' = \'0\')) AND tx_rkwprojects_domain_model_projects.sys_language_uid = ###REC_FIELD_sys_language_uid### AND tx_rkwprojects_domain_model_projects.deleted = 0 AND tx_rkwprojects_domain_model_projects.hidden = 0 ORDER BY tx_rkwprojects_domain_model_projects.pid ASC, tx_rkwprojects_domain_model_projects.status ASC, tx_rkwprojects_domain_model_projects.short_name ASC, tx_rkwprojects_domain_model_projects.name ASC',
                    'minitems' => 0,
                    'maxitems' => 1,
                    'items' => [
                        ['---', NULL],
                    ],
                    'itemsProcFunc' => 'RKW\RkwProjects\TCA\OptionLabels->getExtendedProjectNamesByUid',
                ],
            ],
        ];

        // Add TCA
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages',$tempColumnsPages);

        // Add field to the existing palette
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('pages', 'tx_rkwbasics_common','tx_rkwprojects_project_uid','before:tx_rkwbasics_department');
            },
    'rkw_projects'
);
