<?php
namespace ARM\Armdflip\Controller;

/***
 *
 * This file is part of the "ARM Dealers" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019
 *
 ***/
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * DflipController
 */
class DflipController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action view
     *
     * @return void
     */
    public function viewAction()
    {
        $pdfFile = $this->settings['pdf'];
        if(is_file('uploads/tx_armdflip/'.$pdfFile) && isset($pdfFile)) {
            $this->view->assign('pdf', $pdfFile);    
        } else {
            die('No PDF file');
        }      
    }
}
