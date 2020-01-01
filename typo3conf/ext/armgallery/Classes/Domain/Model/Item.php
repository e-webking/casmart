<?php
namespace ARM\Armgallery\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2019 Anisur Rahaman Mullick <anisur@armtechnologies.com>, ARM Technologies
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
class Item extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * @var \TYPO3\CMS\Core\Resource\FileRepository
	 * @inject
	 */
	protected $falRepository;

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

        /**
	 * album
	 * @var \ARM\Armgallery\Domain\Model\Album
	 */
	protected $album;

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @lazy
	 */
	protected $image;
        
        /**
         *
         * @var \string
         */
        protected $flink;
        
        /**
         *
         * @var \string 
         */
        protected $linktext;

        /**
	 * Return the album
	 * @return \ARM\Armgallery\Domain\Model\Album
	 */
	public function getAlbum() {
            return $this->album;
	}
	
	/**
	 * Sets the album
	 * 
	 * @param \ARM\Armgallery\Domain\Model\Album $album
	 * @return void
	 */
	public function setAlbum(\ARM\Armgallery\Domain\Model\Album $album) {
            $this->album = $album;
	}
	
	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
            return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
            $this->title = $title;
	}
	
	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		
            if (!is_null($this->image)) {

                if ($this->image instanceof \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy) {
                    $this->image->_loadRealInstance();
                }
                
                if ($this->image instanceof  \TYPO3\CMS\Extbase\Domain\Model\FileReference) {
                    return $this->image->getOriginalResource();
                }
            }
	}
	
	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
            $this->image = $image;
	}
        
        /**
	 * Returns the flink
	 *
	 * @return \string $flink
	 */
	public function getFlink() {
            return $this->flink;
	}

	/**
	 * Sets the flink
	 *
	 * @param \string $flink
	 * @return void
	 */
	public function setFlink($flink) {
            $this->flink = $flink;
	}
        
        /**
	 * Returns the linktext
	 *
	 * @return \string $linktext
	 */
	public function getLinktext() {
            return $this->linktext;
	}

	/**
	 * Sets the linktext
	 *
	 * @param \string $linktext
	 * @return void
	 */
	public function setLinktext($linktext) {
            $this->linktext = $linktext;
	}
}
