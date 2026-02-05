<?php
declare(strict_types=1);

final class Customer
{
    private Email $email;
    private CPF $cpf;
    private Age $age;

    public function __construct(Email $email, CPF $cpf, Age $age)
    {
        $this->email = $email;
        $this->cpf = $cpf;
        $this->age = $age;
    }

    public function getEmail(): Email
    {
        return $this->email->getValue();
    }

    public function getCpf(): CPF
    {
        return $this->cpf->getValue();
    } 

    public function getAge(): Age
    {
        return $this->age->getValue();
    }

}