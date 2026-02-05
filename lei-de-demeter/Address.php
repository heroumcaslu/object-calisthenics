<?php

class Address {

    public function __construct(private string $zipcode,
    private String $city) {

    }

    public function getZipcode(): string {
        return $this->zipcode;
    }

    public function getCity(): string {
        return $this->city;
    }

}