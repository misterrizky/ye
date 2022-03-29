<?php

namespace App\Traits;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\TransactionPaymentGateway;

trait PaymentGateway{
    protected function loadConfig(){
        Config::$serverKey = 'Mid-server-30A8eC9cuMoObST9aCzKwUyL';
        Config::$isProduction = true;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function goToPayment($amount,$userdata,$paymentType=null){
        $this->loadConfig();

        $orderId = rand();
        // Required
        $transaction_details = array(
            'order_id' => 'TU'.$orderId,
            'gross_amount' => $amount, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => '1',
            'price' => $amount,
            'quantity' => 1,
            'name' => "TOP UP EDODON"
        );

        // Optional
        $item_details = array ($item1_details);

        // Optional
        $billing_address = array(
            'first_name'    => $userdata->FirstName,
            'last_name'     => $userdata->LastName,
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => $userdata->phone,
            'country_code'  => 'INDONESIA'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => $userdata->FirstName,
            'last_name'     => $userdata->LastName,
            'email'         => $userdata->email,
            'phone'         => $userdata->phone
            //'billing_address'  => $billing_address,
        );

        if($paymentType!=null){
            // Fill SNAP API parameter
            $params = array(
                'enabled_payments' => array($paymentType),
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
            );
        }else{
            // Fill SNAP API parameter
            $params = array(
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
            );
        }



        try {

            $tpg = new TransactionPaymentGateway();
            $tpg->fidUser = $userdata->idUser;
            $tpg->product = 'TOPUP';
            $tpg->product_code = 1;
            $tpg->order_id = 'TU'.$orderId;
            $tpg->status = 'pending';
            $tpg->save();

            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($params)->redirect_url;

            // Redirect to Snap Payment Page
            return $paymentUrl;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function goToPaymentPackage($amount,$package,$userdata,$type,$code,$product_id=null,$paymentType=null){
        $this->loadConfig();

        if($type==1){
            $orderId = 'SB'.rand();
            $product = 'SUBSCRIBE';
        }else{
            $orderId = 'PB'.rand();
            $product = 'PROMOTION';
        }


        // Required
        $transaction_details = array(
            'order_id' => $orderId,
            'gross_amount' => $amount, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => '1',
            'price' => $amount,
            'quantity' => 1,
            'name' => $package
        );

        // Optional
        $item_details = array ($item1_details);

        // Optional
        $billing_address = array(
            'first_name'    => $userdata->FirstName,
            'last_name'     => $userdata->LastName,
            'address'       => $userdata->Address,
            'city'          => '',
            'postal_code'   => "16602",
            'phone'         => $userdata->phone,
            'country_code'  => 'INDONESIA'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => $userdata->FirstName,
            'last_name'     => $userdata->LastName,
            'email'         => $userdata->email,
            'phone'         => $userdata->phone
            //'billing_address'  => $billing_address,
        );

        if($paymentType!=null){
            // Fill SNAP API parameter
            $params = array(
                'enabled_payments' => array($paymentType),
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
            );
        }else{
            // Fill SNAP API parameter
            $params = array(
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
            );
        }


        try {

            $tpg = new TransactionPaymentGateway();
            $tpg->fidUser = $userdata->idUser;
            $tpg->product = $product;
            $tpg->product_code = $code;
            $tpg->product_id = $product_id;
            $tpg->order_id = $orderId;
            $tpg->status = 'pending';
            $tpg->save();

            // Redirect to Snap Payment Page
            return Snap::createTransaction($params)->redirect_url;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
