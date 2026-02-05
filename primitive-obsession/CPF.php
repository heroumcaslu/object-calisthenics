<?php

class CPF {
    private string $value;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function validate(string $cpf): bool
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        if (strlen($cpf) != 11) {
            throw new InvalidArgumentException('Invalid CPF.');
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new InvalidArgumentException('Invalid CPF.');
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new InvalidArgumentException('Invalid CPF.');
            }
        }
    }
}