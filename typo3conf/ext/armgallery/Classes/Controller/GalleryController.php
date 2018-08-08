<?php
namespace Arm\Armgallery\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 Anisur Rahaman Mullick <anisur@armtechnologies.com>, ARM Technologies
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package armgallery
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class GalleryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	/**
	 * itemRepository
	 *
	 * @var \ARM\Armgallery\Domain\Repository\ItemRepository
	 * @inject
	 */
	protected $itemRepository;
	
	/**
	 * 
	 * @var \ARM\Armgallery\Domain\Repository\AlbumRepository
	 * @inject
	 */
	protected $albumRepository;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
            //set the category
            if (isset($this->settings['album'])) {
                    $albumUid = intval($this->settings['album']);
            }
            if ($albumUid > 0) {
                
                $album = $this->albumRepository->findByUid($albumUid);
                $items = $this->itemRepository->findByAlbum($album);
                $cObj = $this->configurationManager->getContentObject();
                $width = $this->settings['width'];
                $height = $this->settings['height'];
                
                $this->view->assign('album', $album);
                $this->view->assign('width', $width);
                $this->view->assign('height', $height);
                $this->view->assign('config', "{thumbnailHeight:'". $height ."',thumbnailWidth:'".$width."',allowHTMLinData:true,'thumbnailLabel':{'display':false}}");
                $this->view->assign('items', $items);
                $this->view->assign('cobj', $cObj->data['uid']);
            }
	}

}