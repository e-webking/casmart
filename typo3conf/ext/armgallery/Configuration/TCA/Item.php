<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_armgallery_domain_model_item'] = array(
	'ctrl' => $TCA['tx_armgallery_domain_model_item']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, album, title, image, flink, linktext',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, album, title, image, flink, linktext, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_armgallery_domain_model_item',
				'foreign_table_where' => 'AND tx_armgallery_domain_model_item.pid=###CURRENT_PID### AND tx_armgallery_domain_model_item.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image',
				array(
                                    'maxitems' => 1,
                                    'appearance' => array(
                                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                                    ),
                                    'foreign_types' => array(
                                        '0' => array(
                                            'showitem' => '
                                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                            --palette--;;filePalette'
                                                    ),
                                                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
                                                        'showitem' => '
                                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                            --palette--;;filePalette'
                                                    )
                                    )
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'php'
			),
		),
		'flink' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.flink',
			'config' => array(
				'type' => 'group',
                                'internal_type' => 'db',
                                'allowed' => 'pages',
				'size' => 1,
                                'maxitems' => 1,
			),
		),
                'linktext' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.linktext',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'album' => array(
			'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.album',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_armgallery_domain_model_album',
				'foreign_table_where' => 'AND tx_armgallery_domain_model_album.sys_language_uid IN (-1,0) ORDER BY tx_armgallery_domain_model_album.title',
			),
		),
	),
);