<?php
// Agragete root - essa classe conhece diretamente apenas seus filhos
// Essa classe é o Domminio da aplicação
class Order {

    public function __construct(private Customer $customer) {

    }

    public function getCustomer(): Customer {
        return $this->customer;
    }

    public function getZipcode(): string {
        return $this->customer->getZipcode();
    }

}