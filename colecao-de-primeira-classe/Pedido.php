<?php

class Pedido
{
    private ItensPedido $itens;
    private float $valorDoFrete;
    private float $valorDesconto;

    public function __construct(ItensPedido $itens)
    {
        $this->itens = $itens;
    }

    public function adicionarItem(ItemPedido $item): void
    {
        $this->itens->addItem($item);
    }

    public function valorTotalDosItens(): float
    {
        return $this->itens->valorTotalDosItens();
    }

    public function getValorDesconto(): float
    {
        return $this->valorDesconto;
    }

    public function applyDesconto(float $desconto): void
    {
        $this->valorDesconto = $desconto;
    }

    public function valorTotal(): float
    {
        return $this->valorTotalDosItens() + $this->valorDoFrete - $this->valorDesconto;
    }

}