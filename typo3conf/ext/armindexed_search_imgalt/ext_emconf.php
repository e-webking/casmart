<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "armindexed_search_imgalt".
 *
 * Auto generated 06-06-2018 06:18
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
    'title' => 'TYPO3 extend index to img-alt',
    'description' => 'Indexed search indexer to parse img tag and index alt attribute for TYPO3 6.x',
    'category' => 'plugin',
    'author' => 'Anisur R. Mullick',
    'author_email' => 'anisur@armtechnologies.com',
    'author_company' => 'ARM Technologies',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'beta',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '1.0.0',
    'constraints' => 
    array (
        'depends' => 
        array (
            'typo3' => '6.2',
            'indexed_search' => '6.2',
        ),
        'conflicts' => 
        array (
        ),
        'suggests' => 
        array (
        ),
    ),
);
