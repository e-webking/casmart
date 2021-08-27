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
                            100 = EXT:armpescetpl/Configuration/Yaml/forms.yaml
                        }
                    }
                }
            ')
        );
    }
});
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/TsConfig/pageTsConfig.txt">');


$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['armpescetpl_preset'] = 'EXT:armpescetpl/Configuration/RTE/Default.yaml';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][$_EXTKEY] = \ARM\Armpescetpl\Hooks\PageLayoutView::class;