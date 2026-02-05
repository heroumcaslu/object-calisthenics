<?php

class Age
{
    private int $value;

    public function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    private function validate(int $age): bool
    {
        if ($age < 18) {
            throw new InvalidArgumentException('Customer must be at least 18 years old.');
        }
    }

}