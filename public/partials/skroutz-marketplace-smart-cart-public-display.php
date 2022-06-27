<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link        https://github.com/mrakisp
 * @since      1.0.0
 *
 * @package    Skroutz_Marketplace_Smart_Cart
 * @subpackage Skroutz_Marketplace_Smart_Cart/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php 
if(is_page("smart-cart-orders-endpoint") && strpos( $_SERVER['HTTP_USER_AGENT'] , 'Skroutz') !== false){
	
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata);	
    $event_type = $data->event_type;
    $event_state = $data->order->state;
    $cour_voucher = $data->order->courier_voucher;
    
    if($data && $cour_voucher && $event_type == 'order_updated' && $event_state == 'accepted'){
        $fname = $data->order->customer->first_name;
        $lname = $data->order->customer->last_name;
        $addr = $data->order->customer->address->street_name;
        $addrNum = $data->order->customer->address->street_number;
        $addrCity = $data->order->customer->address->city;
        $addrzip = $data->order->customer->address->zip;
        $code = $data->order->code;
        $items = $data->order->line_items;
        $courier = $data->order->courier;

        global $woocommerce;
        $address = array(
            'first_name' => 'SKROUTZ order: '.$code. ' '.$fname,
            'last_name'  => $lname,
            'address_1'  => $addr.' '.$addrNum,
            'city'       => $addrCity,
            'postcode'   => $addrzip
        );

        $order = wc_create_order();
        foreach ($items as $item) {
            $order->add_product( get_product($item->shop_uid), $item->quantity);
        }
        $order->set_address( $address, 'billing' );
        $order->add_order_note( 'Skroutz Παραγγελία: '.$code );
        $order->add_order_note( 'Στάλθηκε με : '.$courier );
        $order->add_order_note( "<a target='_blank' href=".$cour_voucher.">SKROUTZ VOUCHER</a>");
        $order->calculate_totals();
        $order->update_status( 'wc-processing' );
    
    }
}

?>