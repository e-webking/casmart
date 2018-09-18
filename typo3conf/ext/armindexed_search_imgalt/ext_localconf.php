<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\IndexedSearch\\Indexer'] = array(
    'className' => 'Arm\\ArmindexedSearchImgalt\\Xclass\\Indexer',
);