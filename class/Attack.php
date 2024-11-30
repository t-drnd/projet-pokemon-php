<?php

class Attack {
    private $name;
    private $power;
    private $precision;
    private $isSpecial;

    public function __construct(string $name, int $power, float $precision, $isSpecial = false) {
        $this->name = $name;
        $this->power = $power;
        $this->precision = $precision;
        $this->isSpecial = $isSpecial;
    }

    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }
    public function setPower(int $value): self
    {
        $this->power = $value;
        return $this;
    }
    public function setPrecision(int $value): self
    {
        $this->precision = $value;
        return $this;
    }

    public function isSpecial()
    {
        return $this->isSpecial;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    public function getPower(): int
    {
        return $this->power;
    }
    public function getPrecision(): float
    {
        return $this->precision;
    }


}