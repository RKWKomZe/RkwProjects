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
        // Add XClasses for extending existing classes
        // ATTENTION: deactivated due to faulty mapping in TYPO3 9.5
        //=================================================================
        /*
        // for TYPO3 12+
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\RKW\RkwBasics\Domain\Model\Pages::class] = [
            'className' => \RKW\RkwProjects\Domain\Model\Pages::class
        ];

        // for TYPO3 9.5 - 11.5 only, not required for TYPO3 12
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)
            ->registerImplementation(
                \RKW\RkwBasics\Domain\Model\Pages::class,
                \RKW\RkwProjects\Domain\Model\Pages::class
            );

        // for TYPO3 12+
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Domain\Model\Category::class] = [
            'className' => \RKW\RkwProjects\Domain\Model\SysCategory::class
        ];

        // for TYPO3 9.5 - 11.5 only, not required for TYPO3 12
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)
            ->registerImplementation(
                \TYPO3\CMS\Extbase\Domain\Model\Category::class,
                \RKW\RkwProjects\Domain\Model\SysCategory::class
            );
        */
        //=================================================================
        // Add Rootline fields
        //=================================================================
        $rootlineFields = &$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'];
        $newRootlineFields = 'tx_rkwprojects_project_uid';
        $rootlineFields .= (empty($rootlineFields))? $newRootlineFields : ',' . $newRootlineFields;

    },
    'rkw_projects'
);


