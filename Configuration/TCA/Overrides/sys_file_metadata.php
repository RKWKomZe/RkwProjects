<?php
defined('TYPO3_MODE') || die('Access denied.');
call_user_func(
    function (string $extKey) {
        $tempColumnsMedia = [

            'columns' => [
                'tx_rkwprojects_project_uid' => [
                    'exclude' => 0,
                    'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_pages.tx_rkwprojects_project_uid',
                    'config' => [
                        'type' => 'select',
                        'renderType' => 'selectSingle',
                        'foreign_table' => 'tx_rkwprojects_domain_model_projects',
                        'foreign_table_where' => 'AND tx_rkwprojects_domain_model_projects.sys_language_uid = ###REC_FIELD_sys_language_uid### AND tx_rkwprojects_domain_model_projects.deleted = 0 AND tx_rkwprojects_domain_model_projects.hidden = 0 ORDER BY tx_rkwprojects_domain_model_projects.pid ASC, tx_rkwprojects_domain_model_projects.status ASC, tx_rkwprojects_domain_model_projects.short_name ASC, tx_rkwprojects_domain_model_projects.name ASC',
                        'minitems' => 0,
                        'maxitems' => 1,
                        'items' => [
                            ['---', 0],
                        ],
                        'itemsProcFunc' => 'RKW\RkwProjects\TCA\OptionLabels->getExtendedProjectNamesByUid',
                    ],
                ],
            ],
        ];


        // insert columns
        $GLOBALS['TCA']['sys_file_metadata'] = array_replace_recursive($GLOBALS['TCA']['sys_file_metadata'], $tempColumnsMedia);

        // insert field
        foreach ($GLOBALS['TCA']['sys_file_metadata']['types'] as $type => &$config) {

            // insert new ones
            $config = str_replace(
                'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:tabs.metadata,',
                'LLL:EXT:filemetadata/Resources/Private/Language/locallang_tca.xlf:tabs.metadata,' . implode(',', array_keys($tempColumnsMedia['columns'])) . ',',
                $config
            );

        }
    },
    'rkw_projects'
);
