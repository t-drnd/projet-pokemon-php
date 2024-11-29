<?php 

abstract class Pokemon {
    private $name;
    private $type;
    private $hp;
    private $atkpower;
    private $defense;

    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }
    public function setHP(int $value): self
    {
        $this->hp = $value;
        return $this;
    }
    public function setATKPower(int $value): self
    {
        $this->atkpower = $value;
        return $this;
    }
    public function setDefense(float $value): self
    {
        $this->defense = $value;
        return $this;
    }

    public function getName(): string
    {
      return $this->name;
    }
    public function getType(): string
    {
      return $this->type;
    }
    public function getHP(): int
    {
      return $this->hp;
    }
    public function getATKPower(): int
    {
      return $this->atkpower;
    }
    public function getDefense(): float
    {
      return $this->defense;
    }
}

