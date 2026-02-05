<?php

class Customer {

    public function __construct(private Address $address) {

    }

    public function getAddress(): Address {
        return $this->address;
    }

    public function getZipcode(): string {
        return $this->address->getZipcode();
    }

}