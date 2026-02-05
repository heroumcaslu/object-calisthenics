<?php

class PhoneNumber
{
    private string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function format(): string
    {
        return preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2-$3', $this->number);
    }

    public function isValid(): bool
    {
        return preg_match('/^\d{10,11}$/', $this->number) === 1;
    }

    public function __toString(): string
    {
        return $this->format();
    }
}