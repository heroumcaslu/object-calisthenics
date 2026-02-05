<?php

class Address {

    public function __construct(
        private string $zipcode,
        private string $city,
        private string $street,
        private string $number,
        private string $state,
        private string $country
    ) {}

    public function getZipcode(): string {
        return $this->zipcode;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function getStreet(): string {
        return $this->street;
    }

    public function getNumber(): string {
        return $this->number;
    }

    public function getState(): string {
        return $this->state;
    }

    public function getCountry(): string {
        return $this->country;
    }

}