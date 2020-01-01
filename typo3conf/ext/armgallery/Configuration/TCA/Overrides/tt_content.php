<?php

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['armgallery_gallery'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'armgallery_gallery',
    'FILE:EXT:armgallery/Configuration/FlexForm/flexform_gallery.xml'
);
