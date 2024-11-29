<?php 

class Pokemon {
    private $name;
    private $type;
    private $hp;
    private array $attaques = [];

    public function __construct(string $name, string $type, int $hp, array $attaques = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->attaques = $attaques;
    }

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


    public function ajouterAttaque(Attack $attaque): void
    {
        $this->attaques[] = $attaque;
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

    public function getAttaques(): array
    {
        return $this->attaques;
    }
}

