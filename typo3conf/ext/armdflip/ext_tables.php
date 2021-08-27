<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}
call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'ARM.Armdflip',
            'flip',
            'PDF Flip Book'
        );
        
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('armdflip', 'Configuration/TypoScript', 'PDF Flipbook');        
       
    }
);
