<?php

class ItemPedido
{
    private float $preco;
    private int $quantidade;

    public function __construct(float $preco, int $quantidade)
    {
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getTotal(): float
    {
        return $this->preco * $this->quantidade;
    }
}