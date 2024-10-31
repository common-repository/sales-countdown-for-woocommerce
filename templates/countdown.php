<?php

global $product;

$sale_date = $product->get_date_on_sale_to();

if( ! $sale_date ) return;

echo '<div class="sscw-countdown" data-date="' . esc_attr( $sale_date->date('Y/m/d') ) . '"></div>';