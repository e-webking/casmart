<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
$params = $this->get( 'listParams', [] );
$catPath = $this->get( 'listCatPath', [] );

if( $this->param( 'f_catid' ) !== null )
{
	$target = $this->config( 'client/html/catalog/tree/url/target' );
	$cntl = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );
	$action = $this->config( 'client/html/catalog/tree/url/action', 'tree' );
	$config = $this->config( 'client/html/catalog/tree/url/config', [] );
}
else
{
	$target = $this->config( 'client/html/catalog/lists/url/target' );
	$cntl = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );
	$action = $this->config( 'client/html/catalog/lists/url/action', 'list' );
	$config = $this->config( 'client/html/catalog/lists/url/config', [] );
}

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );


$classes = '';
foreach( (array) $this->get( 'listCatPath', [] ) as $cat )
{
	$catConfig = $cat->getConfig();
	if( isset( $catConfig['css-class'] ) ) {
		$classes .= ' ' . $catConfig['css-class'];
	}
}


/** client/html/catalog/lists/head/text-types
 * The list of text types that should be rendered in the catalog list head section
 *
 * The head section of the catalog list view at least consists of the category
 * name. By default, all short and long descriptions of the category are rendered
 * as well.
 *
 * You can add more text types or remove ones that should be displayed by
 * modifying these list of text types, e.g. if you've added a new text type
 * and texts of that type to some or all categories.
 *
 * @param array List of text type names
 * @since 2014.03
 * @category User
 * @category Developer
 */
$textTypes = $this->config( 'client/html/catalog/lists/head/text-types', array( 'short', 'long' ) );


$quoteItems = [];
if( $catPath !== [] && ( $catItem = end( $catPath ) ) !== false ) {
	$quoteItems = $catItem->getRefItems( 'text', 'quote', 'default' );
}


/** client/html/catalog/lists/pagination/enable
 * Enables or disables pagination in list views
 *
 * Pagination is automatically hidden if there are not enough products in the
 * category or search result. But sometimes you don't want to show the pagination
 * at all, e.g. if you implement infinite scrolling by loading more results
 * dynamically using AJAX.
 *
 * @param boolean True for enabling, false for disabling pagination
 * @since 2019.04
 * @category User
 * @category Developer
 */
$pagination = '';
if( $this->get( 'listProductTotal', 0 ) > 1 && $this->config( 'client/html/catalog/lists/pagination/enable', true ) == true )
{
	/** client/html/catalog/lists/partials/pagination
	 * Relative path to the pagination partial template file for catalog lists
	 *
	 * Partials are templates which are reused in other templates and generate
	 * reoccuring blocks filled with data from the assigned values. The pagination
	 * partial creates an HTML block containing a page browser and sorting links
	 * if necessary.
	 *
	 * @param string Relative path to the template file
	 * @since 2017.01
	 * @category Developer
	 */
	$pagination = $this->partial(
		$this->config( 'client/html/catalog/lists/partials/pagination', 'catalog/lists/pagination-standard' ),
		array(
			'params' => $params,
			'size' => $this->get( 'listPageSize', 12 ),
			'total' => $this->get( 'listProductTotal', 1 ),
			'current' => $this->get( 'listPageCurr', 1 ),
			'prev' => $this->get( 'listPagePrev', 1 ),
			'next' => $this->get( 'listPageNext', 1 ),
			'last' => $this->get( 'listPageLast', 1 ),
                        'category' => $catItem->getName(),
                        'showbottom' => 0
		)
	);
        
        $bottompagination = $this->partial(
		$this->config( 'client/html/catalog/lists/partials/pagination', 'catalog/lists/pagination-standard' ),
		array(
			'params' => $params,
			'size' => $this->get( 'listPageSize', 12 ),
			'total' => $this->get( 'listProductTotal', 1 ),
			'current' => $this->get( 'listPageCurr', 1 ),
			'prev' => $this->get( 'listPagePrev', 1 ),
			'next' => $this->get( 'listPageNext', 1 ),
			'last' => $this->get( 'listPageLast', 1 ),
                         'showbottom' => 1
		)
	);
}

?>
<section class="aimeos catalog-list<?= $enc->attr( $classes ); ?>" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>">

	<?= $pagination; ?>

	<?= $this->block()->get( 'catalog/lists/items' ); ?>

        <?= $bottompagination; ?>
</section>
