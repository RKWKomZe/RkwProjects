<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        //=================================================================
        // Configure Plugin
        //=================================================================
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'RKW.' . $extKey,
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

        //=================================================================
        // Add Rootline fields
        //=================================================================
        $rootlineFields = &$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'];
        $newRootlineFields = 'tx_rkwprojects_project_uid';
        $rootlineFields .= (empty($rootlineFields))? $newRootlineFields : ',' . $newRootlineFields;

    },
    $_EXTKEY
);


