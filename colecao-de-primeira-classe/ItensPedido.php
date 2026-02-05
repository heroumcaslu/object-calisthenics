<?php
class ItensPedido
{
    private array $itens = [];

    public function __construct(array $itens)
    {
        $this->itens = $itens;
    }

    public function addItem(ItemPedido $item): void
    {
        $this->validarItem($item);
        $this->itens[] = $item;
    }

    public function valorTotalDosItens(): float
    {
        $total = 0.0;
        foreach ($this->itens as $item) {
            $total += $item->getPreco() * $item->getQuantidade();
        }
        return $total;
    }

    private function validar(ItemPedido $item): void
    {
        if($item === null) {
            throw new InvalidArgumentException("Item não pode ser nulo.");
        }

        if (!$item instanceof ItemPedido) {
            throw new InvalidArgumentException("Item inválido.");
        }

        if (!isset($item->getPreco()) || !isset($item->getQuantidade())) {
            throw new InvalidArgumentException("Item inválido.");
        }
    }

    public function getItens(): array
    {
        return $this->itens;
    }
}