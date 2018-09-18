<?php
namespace Arm\ArmindexedSearchImgalt\Xclass;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 *
 *
 * @package armindexed_search_imgalt
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Indexer extends \TYPO3\CMS\IndexedSearch\Indexer
{

    /**
     * Splits HTML content and returns an associative array, with title, a list of metatags, and a list of words in the body.
     *
     * @param 	string		HTML content to index. To some degree expected to be made by TYPO3 (ei. splitting the header by ":")
     * @return 	array		Array of content, having keys "title", "body", "keywords" and "description" set.
     * @see splitRegularContent()
     * @todo Define visibility
     */
    public function splitHTMLContent($content) 
    {
  	// divide head from body ( u-ouh :) )
        $contentArr = $this->defaultContentArray;
        $contentArr['body'] = stristr($content,'<body');
        $headPart = substr($content, 0, -strlen($contentArr['body']));
        // get title
        $this->embracingTags($headPart, 'TITLE', $contentArr['title'], $dummy2, $dummy);
        $titleParts = explode(':', $contentArr['title'], 2);
        $contentArr['title'] = trim(isset($titleParts[1]) ? $titleParts[1] : $titleParts[0]);
                // get keywords and description metatags
        if ($this->conf['index_metatags']) {
            $meta = array();
            $i = 0;
            while ($this->embracingTags($headPart, 'meta', $dummy, $headPart, $meta[$i])) {
                $i++;
            }
            // TODO The code below stops at first unset tag. Is that correct?
            for ($i = 0; isset($meta[$i]); $i++) {
                $meta[$i] = GeneralUtility::get_tag_attributes($meta[$i]);
                if (stristr($meta[$i]['name'], 'keywords')) {
                    $contentArr['keywords'] .= ',' . $this->addSpacesToKeywordList($meta[$i]['content']);
                }
                if (stristr($meta[$i]['name'], 'description')) {
                    $contentArr['description'] .= ',' . $meta[$i]['content'];
                }
            }
        }
                // Process <!--TYPO3SEARCH_begin--> or <!--TYPO3SEARCH_end--> tags:
        $this->typoSearchTags($contentArr['body']);

                // Get rid of unwanted sections (ie. scripting and style stuff) in body
        $tagList = explode(',',$this->excludeSections);
        foreach($tagList as $tag)	{
            while($this->embracingTags($contentArr['body'],$tag,$dummy,$contentArr['body'],$dummy2));
        }
        // remove tags, but first make sure we don't concatenate words by doing it
        $contentArr['body'] = str_replace('<', ' <', $contentArr['body']);
        
        $contentArr['body'] = trim(strip_tags($contentArr['body'], '<img>'));
        
        $pattern[0] = "/(<img .*)(alt=\")([^<>\"]*)(\")(.*>)/iU";
        $pattern[1] = "/(<img .*)(title=\")([^<>\"]*)(\")(.*>)/iU";
        $pattern[2] = "/<img .*>/iU";
        $replacement[0] = " \\1\\5\\3 ";
        $replacement[1] = " \\1\\5\\3 ";
        $replacement[2] = "";
        
        $contentArr['body'] = preg_replace($pattern, $replacement, $contentArr['body']);
        $contentArr['keywords'] = trim($contentArr['keywords']);
        $contentArr['description'] = trim($contentArr['description']);

                // Return array
        return $contentArr;
    }
	
}