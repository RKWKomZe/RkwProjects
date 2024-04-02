<?php
declare(strict_types = 1);

return [
    \RKW\RkwProjects\Domain\Model\Pages::class => [
        'tableName' => 'pages',
    ],
    \RKW\RkwProjects\Domain\Model\Authors::class => [
        'tableName' => 'tx_rkwauthors_domain_model_authors',
    ],
    \RKW\RkwProjects\Domain\Model\MediaFileMeta::class => [
        'tableName' => 'sys_file_metadata',
    ],
    \RKW\RkwProjects\Domain\Model\SysCategory::class => [
        'tableName' => 'sys_category',
    ],
];
