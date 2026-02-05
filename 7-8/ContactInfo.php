<?php

class ContactInfo
{
    private Email $email;
    private PhoneNumber $phoneNumber;

    public function __construct(Email $email, PhoneNumber $phoneNumber)
    {
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email->getValue();
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber->getValue();
    }

}