<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'ARM.Armgallery',
            'gallery',
            'ARM Gallery'
        );
         
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('armgallery', 'Configuration/TypoScript', 'ARM Gallery');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armgallery_domain_model_album', 'EXT:armgallery/Resources/Private/Language/locallang_csh_tx_armgallery_domain_model_album.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armgallery_domain_model_album');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_armgallery_domain_model_item', 'EXT:armgallery/Resources/Private/Language/locallang_csh_tx_armgallery_domain_model_item.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_armgallery_domain_model_item');
    }
);
