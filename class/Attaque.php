<?php

class Attack {
    private $name;
    private $power;
    private $precision;

    public function __construct(string $name, int $power, float $precision) {
        $this->name = $name;
        $this->power = $power;
        $this->precision = $precision;
    }

    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }
    public function setPower(string $value): self
    {
        $this->power = $value;
        return $this;
    }
    public function setPrecision(int $value): self
    {
        $this->precision = $value;
        return $this;
    }
}