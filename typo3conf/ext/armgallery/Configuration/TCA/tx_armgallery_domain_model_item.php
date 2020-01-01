<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'default_sortby' => 'uid DESC',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title, image, flink, linktext,',
        'iconfile' => 'EXT:armgallery/Resources/Public/icons/tx_armgallery_domain_model_item.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, album, title, image, flink, linktext',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, album, title, image, flink, linktext, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.title',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            ],
        ],
        'linktext' => [
            'exclude' => true,
            'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.linktext',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image',
                    [
                        'appearance' => [
                           'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                        ],
                        'overrideChildTca' => [
                            'types' => [
                                '0' => [
                                    'showitem' => '
                                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                        --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                    'showitem' => '
                                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                        --palette--;;filePalette'
                                ],
                            ],
                        ],
                    ],
                    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
                ),
        ],
        'flink' => [
            'exclude' => true,
            'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.flink',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => 1,
                'maxitems' => 1
            ],
        ],
        'album' => [
            'exclude' => true,
            'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_item.album',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_armgallery_domain_model_album',
                'foreign_table_where' => ' ORDER BY tx_armgallery_domain_model_album.title',
            ],
        ],
        
    ],
];
