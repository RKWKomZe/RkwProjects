<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rkwprojects_domain_model_projects', 'EXT:rkw_projects/Resources/Private/Language/locallang_csh_tx_rkwprojects_domain_model_projects.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rkwprojects_domain_model_projects');
$GLOBALS['TCA']['tx_rkwprojects_domain_model_projects'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects',
		'label' => 'short_name',
		'label_alt' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		//'sortby' => 'sorting',
		'default_sortby' => 'ORDER BY short_name, name',

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'short_name,name',
		'iconfile' => 'EXT:rkw_projects/Resources/Public/Icons/tx_rkwprojects_domain_model_projects.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, visibility, name, short_name, internal_name, partner_logos, project_pid, project_manager, project_staff',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1,visibility, name, short_name, internal_name, partner_logos, project_pid, project_manager, project_staff, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rkwprojects_domain_model_projects',
				'foreign_table_where' => 'AND tx_rkwprojects_domain_model_projects.pid=###CURRENT_PID### AND tx_rkwprojects_domain_model_projects.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
        'visibility' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.visibility',
            'config' => array(
                'type' => 'check',
                'default' => 0,
                'items' => array(
                    '1' => array(
                        '0' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.visibility.I.visible'
                    )
                )
            )
        ),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'short_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.short_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'internal_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.internal_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'partner_logos' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.partner_logos',
			'config' => 
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'partnerLogos',
				array('maxitems' => 5),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),

		),
		'project_pid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.project_pid',
			'config' => array(
				'type' => 'input',
                'size' => '30',
                'max' => '256',
                'eval' => 'trim',
                'wizards' => array(
                    'link' => array(
                        'type' => 'popup',
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:header_link_formlabel',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_link.gif',
                        'module' => array(
                            'name' => 'wizard_link',
                            'urlParameters' => array(
                                    'mode' => 'wizard'
                            )
                        ),
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'params' => Array(
                            // List of tabs to hide in link window. Allowed values are:
                            // file, mail, page, spec, folder, url
                            'blindLinkOptions' => 'mail,file,url,spec,folder',

                            // allowed extensions for file
                            //'allowedExtensions' => 'mp3,ogg',
                         )
                    )
                ),
                'softref' => 'typolink'
			),

		),
		'project_staff' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.project_staff',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_rkwauthors_domain_model_authors',
                'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY last_name ASC',
				'MM' => 'tx_rkwprojects_projects_authors_mm',
                'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
			),
		),
		'project_manager' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.project_manager',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_rkwauthors_domain_model_authors',
                'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY last_name ASC',
				'maxitems' => 1,
                'minitems' => 1,
                'items' => array(
                    array('---', NULL),
                ),
            ),
        ),
		'sys_category' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.sys_category',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'sys_category',
				'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY title ASC',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
			),
		),

	),
);
