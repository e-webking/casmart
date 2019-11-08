<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}
call_user_func(function () {
    if (TYPO3_MODE === 'BE') {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            trim('
                module.tx_form {
                    settings {
                        yamlConfigurations {
                            100 = EXT:armtpl/Configuration/Yaml/forms.yaml
                        }
                    }
                }
            ')
        );
    }
});
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/TsConfig/pageTsConfig.txt">');


$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['armtpl_preset'] = 'EXT:armtpl/Configuration/RTE/Default.yaml';