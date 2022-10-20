<?php
return [
	'ctrl' => [
		'title'	=> 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects',
		'label' => 'short_name',
		'label_alt' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => true,
		//'sortby' => 'sorting',
		'default_sortby' => 'ORDER BY short_name, name',

		'versioningWS' => true,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		],
		'searchFields' => 'short_name,name',
		'iconfile' => 'EXT:rkw_projects/Resources/Public/Icons/tx_rkwprojects_domain_model_projects.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, visibility, status, name, short_name, internal_name, partner_logos, project_pid, project_manager, project_staff',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, --palette--;;1,visibility, status, name, short_name, internal_name, partner_logos, project_pid, project_manager, project_staff, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
	],
	'palettes' => [
		'1' => ['showitem' => ''],
	],
	'columns' => [

		'sys_language_uid' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => [
					['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1],
					['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0],
				],
			],
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_rkwprojects_domain_model_projects',
				'foreign_table_where' => 'AND tx_rkwprojects_domain_model_projects.pid=###CURRENT_PID### AND tx_rkwprojects_domain_model_projects.sys_language_uid IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],

		't3ver_label' => [
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			],
		],

		'hidden' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
			'config' => [
				'type' => 'check',
			],
		],
		'starttime' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'input',
                'renderType' => 'inputDateTime',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
				],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
			],
		],
		'endtime' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'input',
                'renderType' => 'inputDateTime',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => [
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
				],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
			],
		],
        'visibility' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.visibility',
            'config' => [
                'type' => 'check',
                'default' => 0,
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.visibility.I.visible'
                    ],
                ],
            ],
        ],
        'status' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'minitems' => 0,
                'maxitems' => 1,
                'items' => [
                    ['LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.status.I.0', 0],
                    ['LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.status.I.100', 100],
                ],
                'default' => 0,
            ],
        ],
		'name' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
		'short_name' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.short_name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
		'internal_name' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.internal_name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
		'partner_logos' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.partner_logos',
			'config' =>
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'partnerLogos',
				['maxitems' => 5],
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),

		],
		'project_pid' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.project_pid',
			'config' => [
				'type' => 'input',
                'renderType' => 'inputLink',
			],

		],
		'project_staff' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.project_staff',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_rkwauthors_domain_model_authors',
                'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY last_name ASC',
				'MM' => 'tx_rkwprojects_projects_authors_mm',
                'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
			],
		],
		'project_manager' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.project_manager',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_rkwauthors_domain_model_authors',
                'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY last_name ASC',
				'maxitems' => 1,
                'minitems' => 1,
                'items' => [
                    ['---', NULL],
                ],
            ],
        ],
		'sys_category' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:rkw_projects/Resources/Private/Language/locallang_db.xlf:tx_rkwprojects_domain_model_projects.sys_category',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'sys_category',
				'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY title ASC',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
			],
		],
	],
];
