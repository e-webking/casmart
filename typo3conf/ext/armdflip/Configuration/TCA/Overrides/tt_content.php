<?php

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['armdflip_flip'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'armdflip_flip',
    'FILE:EXT:armdflip/Configuration/FlexForm/flexform_pdf.xml'
);