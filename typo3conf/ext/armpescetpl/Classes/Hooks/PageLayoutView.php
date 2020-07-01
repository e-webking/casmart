<?php
namespace ARM\Armpescetpl\Hooks;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Service\FlexFormService;

/**
 * Description of PageLayoutView
 *
 * @author anisur
 */
class PageLayoutView implements \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface {
    
    /**
     * 
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject
     * @param bool $drawItem Whether to draw the item using the default functionalities
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     */
    public function preProcess(\TYPO3\CMS\Backend\View\PageLayoutView &$parentObject, 
                        &$drawItem, &$headerContent, &$itemContent, array &$row) {
        
        switch ($row['tx_gridelements_backend_layout']) {

            case '2':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    
                    $itemContent = '';
                    if (!empty($flexArr['field_imgalt'])) {
                        $itemContent .= '<h3>'.$flexArr['field_imgalt'].'</h3>';
                    }
                    if(!empty($flexArr['field_imagelarge'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagelarge'].'" style="height:40px" height="40" alt="Large version" /> (Large Desktop)';
                    }
                    if(!empty($flexArr['field_imagemid'])) {
                        $itemContent .= '&nbsp;&nbsp;&nbsp;&nbsp;<img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagemid'].'" style="height:40px" height="40" alt="Desktop version" /> (Desktop)';
                    }
                    if(!empty($flexArr['field_imagetab'])) {
                        $itemContent .= '&nbsp;&nbsp;&nbsp;&nbsp;<img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagetab'].'" style="height:40px" height="40" alt="Tablet version" /> (Tablet)';
                    }
                    if(!empty($flexArr['field_imagemob'])) {
                        $itemContent .= '&nbsp;&nbsp;&nbsp;&nbsp;<img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagemob'].'" style="height:40px" height="40" alt="mobile version" /> (Mobile)';
                    }
                }
                break;
            case '6':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    $itemContent = '<h2>'.$flexArr['field_title'].'</h2>';
                    if(!empty($flexArr['field_text'])) {
                        $itemContent .= '<br />'.strip_tags($flexArr['field_text']);
                    }
                }
                break;
            case '7':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    $itemContent = '';
                    if(!empty($flexArr['field_text'])) {
                        $itemContent = strip_tags($flexArr['field_text']);
                    }
                    if(!empty($flexArr['field_img'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_img'].'" style="height:40px" height="40" alt="Image" />';
                    }
                }
                break;
             case '9':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    $itemContent = $flexArr['field_title'];
                    if(!empty($flexArr['field_text'])) {
                        $itemContent = strip_tags($flexArr['field_text']);
                    }
                    if(!empty($flexArr['field_img'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_img'].'" style="height:40px" height="40" alt="Image" />';
                    }
                }
                break;
             case '10':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    $itemContent = '<h2>'.$flexArr['field_heading'].'</h2>';
                    if(!empty($flexArr['field_text'])) {
                        $itemContent .= '<br />'.strip_tags($flexArr['field_text']);
                    }
                    if(!empty($flexArr['field_label'])) {
                        $itemContent .= '<br />Label:'.strip_tags($flexArr['field_label']);
                    }
                }
                break;
            case '13':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    $itemContent = '';
                    if(!empty($flexArr['field_headingone'])) {
                        $itemContent .= strip_tags($flexArr['field_headingone']);
                    }
                    if(!empty($flexArr['field_imageone'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_imageone'].'" style="height:40px" height="40" alt="Image" />';
                    }
                    if(!empty($flexArr['field_ctaone'])) {
                        $itemContent .= strip_tags($flexArr['field_ctaone']);
                    }
                    if(!empty($flexArr['field_headingtwo'])) {
                        $itemContent .= '<br />'.strip_tags($flexArr['field_headingtwo']);
                    }
                    if(!empty($flexArr['field_imagetwo'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagetwo'].'" style="height:40px" height="40" alt="Image" />';
                    }
                    if(!empty($flexArr['field_ctatwo'])) {
                        $itemContent .= strip_tags($flexArr['field_ctatwo']);
                    }
                    if(!empty($flexArr['field_headingthree'])) {
                        $itemContent .= '<br />'.strip_tags($flexArr['field_headingthree']);
                    }
                    if(!empty($flexArr['field_imagethree'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagethree'].'" style="height:40px" height="40" alt="Image" />';
                    }
                    if(!empty($flexArr['field_ctathree'])) {
                        $itemContent .= strip_tags($flexArr['field_ctathree']);
                    }
                     if(!empty($flexArr['field_headingfour'])) {
                        $itemContent .= '<br />'.strip_tags($flexArr['field_headingfour']);
                    }
                    if(!empty($flexArr['field_imagefour'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagefour'].'" style="height:40px" height="40" alt="Image" />';
                    }
                    if(!empty($flexArr['field_ctafour'])) {
                        $itemContent .= strip_tags($flexArr['field_ctafour']);
                    }
                     if(!empty($flexArr['field_headingfive'])) {
                        $itemContent .= '<br />'.strip_tags($flexArr['field_headingfive']);
                    }
                    if(!empty($flexArr['field_imagefive'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_imagefive'].'" style="height:40px" height="40" alt="Image" />';
                    }
                    if(!empty($flexArr['field_ctafive'])) {
                        $itemContent .= strip_tags($flexArr['field_ctafive']);
                    }
                }
                break;
            case '15':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    $itemContent = $flexArr['field_title'];
                    if(!empty($flexArr['field_image'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_image'].'" style="height:40px" height="40" alt="Image" /> (Default)';
                    }
                    if(!empty($flexArr['field_hover'])) {
                        $itemContent .= '&nbsp;&nbsp;&nbsp;&nbsp;<img src="/uploads/tx_armpescetpl/'.$flexArr['field_hover'].'" style="height:40px" height="40" alt="Hover" /> (Hover)';
                    }
                }
                break;
            case '16':
                
                if (!empty($row['pi_flexform'])) {
                    $drawItem = false;
                    $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
                    $flexArr = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);
                    $itemContent = '';
                    if(!empty($flexArr['field_text'])) {
                        $itemContent = strip_tags($flexArr['field_text']);
                    }
                    if(!empty($flexArr['field_img'])) {
                        $itemContent .= '<br /><img src="/uploads/tx_armpescetpl/'.$flexArr['field_img'].'" style="height:40px" height="40" alt="Image" />';
                    }
                    if(!empty($flexArr['field_imgalt'])) {
                        $itemContent .= '<br />'.strip_tags($flexArr['field_imgalt']);
                    }
                }
                break;
        }
    }
}
