<?php

class ShippingCalculator {
    public function calculate(Order $order): void {
        // $zipcode = $order->getCustomer()->getAddress()->getZipcode();
        $zipcode = $order->->getZipcode();
        echo "Calculando frete para o CEP: " . $zipcode;
    }
}