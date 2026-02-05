<?php

class Product
{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function changePrice(float $price): void
    {
        if($price <= 0) {
            throw new InvalidArgumentException("Preço não pode ser negativo");
        }
        $this->price = $price;
    }

    public function applyDiscount(float $discount): void
    {

        if($discount > $this->price) {
            throw new InvalidArgumentException("Desconto maior que o preço do produto");
        }

        if($this->price > 50) {
            $this->price -= $discount;
        }
    }

}

// Product service

$product = new Product("Laptop", 1500.00);

//Ferindo o tell dont ask principle
$price = $product->getPrice();
$product->setPrice($price * 0.9); // Aplicando desconto de 10%

if($price > 50) {
    $discountedPrice = $price * 0.9;
    $product->setPrice($discountedPrice);
}