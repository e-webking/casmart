<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
$iface = '\Aimeos\MShop\Price\Item\Iface';
$priceItems = $this->get( 'prices', [] );
$prices = [];

if( !is_array( $priceItems ) ) {
	$priceItems = array( $priceItems );
}

foreach( $priceItems as $priceItem )
{
	$qty = $priceItem->getQuantity();
	if( !isset( $prices[$qty] ) || $prices[$qty]->getValue() > $priceItem->getValue() ) {
		$prices[$qty] = $priceItem;
	}
}

$format = array(
	/// Price quantity format with quantity (%1$s)
	'quantity' => $this->translate( 'client', 'from %1$s' ),
	/// Price shipping format with shipping / payment cost value (%1$s) and currency (%2$s)
	'costs' => ( $this->get( 'costsItem', true ) ? $this->translate( 'client', '+ %1$s %2$s/item' ) : $this->translate( 'client', '%1$s %2$s' ) ),
	/// Rebate format with rebate value (%1$s) and currency (%2$s)
	'rebate' => $this->translate( 'client', '%1$s %2$s off' ),
	/// Rebate percent format with rebate percent value (%1$s)
	'rebate%' => $this->translate( 'client', '-%1$s%%' ),
);

/// Tax rate format with tax rate in percent (%1$s)
$withtax = $this->translate( 'client', 'Incl. %1$s%% VAT' );
/// Tax rate format with tax rate in percent (%1$s)
$notax = $this->translate( 'client', '+ %1$s%% VAT' );

$first = true;


?>
<?php foreach( $prices as $priceItem ) : ?>
	<?php
		if( !( $priceItem instanceof $iface ) ) {
			throw new \Aimeos\MW\View\Exception( sprintf( 'Object doesn\'t implement "%1$s"', $iface ) );
		}

		$costs = $priceItem->getCosts();
		$rebate = $priceItem->getRebate();
		$key = 'price:' . ( $priceItem->getType() ?: 'default' );
                //echo 'hello'. $priceItem->getCurrencyId();
		/// Price format with price value (%1$s) and currency (%2$s)
		$format['value'] = $this->translate( 'client/code', $key );
		$currency = $this->translate( 'currency', $priceItem->getCurrencyId() );
                //$currency = 'CHF';
		$taxformat = ( $priceItem->getTaxFlag() ? $withtax : $notax );
                $marketPrice = $priceItem->getValue() + $rebate;
	?>

	<?php if( $first === true ) : $first = false; ?>
		<meta itemprop="price" content="<?= $priceItem->getValue(); ?>" />
	<?php endif; ?>


	<div class="price-item <?= $enc->attr( $priceItem->getType() ); ?>" itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/PriceSpecification">

		<meta itemprop="valueAddedTaxIncluded" content="<?= ( $priceItem->getTaxFlag() ? 'true' : 'false' ); ?>" />
		<meta itemprop="priceCurrency" content="<?= $priceItem->getCurrencyId(); ?>" />
		<meta itemprop="price" content="<?= $priceItem->getValue(); ?>" />

		<span class="quantity" itemscope="" itemtype="http://schema.org/QuantitativeValue">
			<meta itemprop="minValue" content="<?= $priceItem->getQuantity(); ?>" />
			<?= $enc->html( sprintf( $format['quantity'], $priceItem->getQuantity() ), $enc::TRUST ); ?>
		</span>

		<span class="value">
			ab <?= $enc->html( sprintf( $format['value'], $this->number( $priceItem->getValue(), $priceItem->getPrecision() ), $currency ), $enc::TRUST ); ?>
		</span>
                
		<?php if( $priceItem->getValue() > 0 && $rebate > 0 ) : ?>
                <br>
                <span class="marketprice">anstatt <?= $enc->html( sprintf( $format['value'], $this->number( $marketPrice, $priceItem->getPrecision() ), $currency ), $enc::TRUST ); ?> </span> &nbsp;&nbsp; <span class="arminfo"></span>
                <div class="arm-aimeos-info"><i class="fa fa-2x fa-close pull-right"></i>Unsere Preise beziehen sich auf die unverbindlich empfohlenen Verkaufspreise des Herstellers. Diese unterliegen Markt- und Währungsschwankungen. Kontaktieren Sie uns, um das attraktivste Angebot zu bekommen!
                <br><br>Preise "ab CHF…" bedeuten, dass wir die günstigste Aufführungsvariante, ohne Accessoires oder Dekoelemente berücksichtigen.</div>
		<?php endif; ?>
	</div>

<?php endforeach; ?>
