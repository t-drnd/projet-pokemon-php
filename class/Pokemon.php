<?php 

class Pokemon {
    private $name;
    private $type;
    private $hp;
    private array $attaques = [];

    private $maxHP;

    public function __construct($name, $type,  $hp, $attaques)
    {
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->maxHP = $hp;
        $this->attaques = $attaques;
    }

    public function ajouterAttaque(Attack $attaque): void
    {
        $this->attaques[] = $attaque;
    }

    public function getName()
    {
      return $this->name;
    }
    public function getType()
    {
      return $this->type;
    }
    public function getHP()
    {
      return $this->hp;
    }
    public function getmaxHP()
    {
      return $this->maxHP;
    }

    public function getAttaques()
    {
        return $this->attaques;
    }

    public function recevoirDegats(int $degats): void
    {
        $this->hp = max(0, $this->hp - $degats);
    }

    public function estKO(): bool
    {
        return $this->hp <= 0;
    }
}

