<?php

class Customer
{
    private string $nome;
    private ContactInfo $contactInfo;
    private Address $address;

    public function __construct(
        string $nome,
        ContactInfo $contactInfo,
        Address $address
    ) {
        $this->nome = $nome;
        $this->contactInfo = $contactInfo;
        $this->address = $address;
    }

    public function getEmail(): string
    {
        return $this->contactInfo->getEmail();
    }

} 

$contactInfo = new ContactInfo(
    new Email("lucas@exemplo.com"), 
    new PhoneNumber("123456789")
);

$address = new Address("12345-678", "São Paulo", "Rua Exemplo", "123", "SP", "Brasil");

$customer = new Customer(
    "Lucas",
    $contactInfo,
    $address
);

$email = $customer->getEmail();