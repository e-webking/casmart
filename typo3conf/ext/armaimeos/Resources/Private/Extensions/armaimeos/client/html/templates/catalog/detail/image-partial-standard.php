<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2014-2018
 */

/* Available data:
 * - productItem : Product item incl. referenced items
 * - params : Request parameters for this detail view
 * - mediaItems : Media items incl. referenced items
 */

$enc = $this->encoder();

$getVariantData = function( \Aimeos\MShop\Media\Item\Iface $mediaItem ) use ( $enc )
{
	$string = '';

	foreach( $mediaItem->getRefItems( 'attribute', null, 'variant' ) as $id => $item ) {
		$string .= ' data-variant-' . $item->getType() . '="' . $enc->attr( $id ) . '"';
	}

	return $string;
};


$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

$url = $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $this->get( 'params', [] ), [], $detailConfig ) );
$mediaItems = $this->get( 'mediaItems', [] );


?>
<div class="catalog-detail-image product_detail_img">
	<div class="image-single" data-pswp="{bgOpacity: 0.75, shareButtons: false}">

		<?php foreach( $mediaItems as $id => $mediaItem ) : ?>
			<?php
				$srcset = $sources = [];
				foreach( $mediaItem->getPreviews() as $type => $path ) {
					$srcset[] = $this->content( $path ) . ' ' . $type . 'w';
					$sources[$type] = $this->content( $path );
				}
			?>
			<div id="imageitem-<?php echo $enc->attr( $id ); ?>" class="mediaitem_n media-item">
				<img id="image-<?= $enc->attr( $id ); ?>" class="item"
					srcset="<?= $enc->attr( join( ', ', $srcset ) ) ?>"
					src="<?= $enc->attr( $this->content( $mediaItem->getPreview() ) ) ?>"
					itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject"
					data-image="<?= $enc->attr( $this->content( $mediaItem->getPreview() ) ) ?>"
					data-sources="<?= $enc->attr( json_encode( $sources, JSON_FORCE_OBJECT ) ) ?>"
					alt="<?= $enc->html( $mediaItem->getName() ); ?>"
					<?= $getVariantData( $mediaItem ); ?>
				/>
			</div>
		<?php endforeach; ?>

	</div><!--

	--><?php if( count( $mediaItems ) > 1 ) : $class = 'item selected'; ?>
		<div class="image-thumbs thumbs-horizontal" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'><!--
			--><button type="button" class="slick-prev"><?= $enc->html( $this->translate( 'client', 'Previous' ) ); ?></button><!--
			--><div class="thumbs"><!--

				<?php foreach( $mediaItems as $id => $mediaItem ) : ?>
					<?php $previewUrl = $enc->attr( $this->content( $mediaItem->getPreview() ) ); ?>

					--><a img-id="imageitem-<?php echo $enc->attr( $id ); ?>" class="getcclass <?= $class; ?>" style="background-image: url('<?= $previewUrl; ?>')"
						href="javascript:void(0);"
					></a><!--

					<?php $class = 'item'; ?>
				<?php endforeach; ?>

			--></div><!--
			--><button type="button" class="slick-next"><?= $enc->html( $this->translate( 'client', 'Next' ) ); ?></button><!--
		--></div>
	<?php endif; ?>


	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. Don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close"
						title="<?= $enc->attr( $this->translate( 'client', 'Close' ) ); ?>">
					</button>
					<!-- button class="pswp__button pswp__button--share"
						title="<?= $enc->attr( $this->translate( 'client', 'Share' ) ); ?>">
					</button -->
					<button class="pswp__button pswp__button--fs"
						title="<?= $enc->attr( $this->translate( 'client', 'Toggle fullscreen' ) ); ?>">
					</button>
					<button class="pswp__button pswp__button--zoom"
						title="<?= $enc->attr( $this->translate( 'client', 'Zoom in/out' ) ); ?>">
					</button>

					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
						  <div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						  </div>
						</div>
					</div>
				</div>

				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>

				<button class="pswp__button pswp__button--arrow--left"
					title="<?= $enc->attr( $this->translate( 'client', 'Previous' ) ); ?>">
				</button>
				<button class="pswp__button pswp__button--arrow--right"
					title="<?= $enc->attr( $this->translate( 'client', 'Next' ) ); ?>">
				</button>

				<div class="pswp__caption"><div class="pswp__caption__center"></div></div>

			</div>
		</div>
	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".getcclass").click(function(){
    var getid = $(this).attr('img-id');
	console.log(getid);
	$(".mediaitem_n").hide();
	$("#"+getid).show();
  });
});
</script>