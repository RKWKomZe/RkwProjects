<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'RKW.' . $_EXTKEY,
	'Projectstaff',
	array(
		'Projects' => 'listStaff, ',
		'Pages' => '',
		
	),
	// non-cacheable actions
	array(
		'Projects' => '',
		'Pages' => '',
		
	)
);


// Add rootline-Fields
$TYPO3_CONF_VARS['FE']['addRootLineFields'] .= ',tx_rkwprojects_project_uid';

