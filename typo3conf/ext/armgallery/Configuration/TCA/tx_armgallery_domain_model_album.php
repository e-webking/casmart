<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_album',
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
        'iconfile' => 'EXT:armgallery/Resources/Public/icons/tx_armgallery_domain_model_album.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, title',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, title, items,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
            'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_album.title',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            ],
        ],
        
        'items' => [
            'exclude' => true,
            'label' => 'LLL:EXT:armgallery/Resources/Private/Language/locallang_db.xlf:tx_armgallery_domain_model_album.items',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_armgallery_domain_model_item',
                'foreign_field' => 'album',
                'maxitems'      => 99,
                'appearance' => [
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],   
    ],
];