<?php 

class Pokemon {
    use Soigner;
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

    public function attack(Pokemon $adversaire, Attack $attaque) {
        if (mt_rand(0, 100) / 100 <= $attaque->getPrecision()) {
            echo "{$this->name} utilise {$attaque->getName()} sur {$adversaire->name}.\n";
            $adversaire->recevoirDegats($attaque->getPower());
        } else {
            echo "{$this->name} utilise {$attaque->getName()}, mais échoue.\n";
        }
    }

    public function recevoirDegats(int $degats): void
    {
        $this->hp = max(0, $this->hp - $degats);
        echo "{$this->name} reçoit $degats dégâts. Il lui reste {$this->hp} pv.\n";
    }

    public function estKO(): bool
    {
        return $this->hp <= 0;
    }

    public function capaciteSpeciale(Pokemon $adversaire, Attack $attaque): void
    {
        if (mt_rand(0, 100) / 100 <= $attaque->getPrecision()) {
            echo "{$this->name} utilise son attaque spéciale {$attaque->getName()} sur {$adversaire->name}.\n";
            $adversaire->recevoirDegats($attaque->getPower());
        } else {
            echo "{$this->name} tente {$attaque->getName()}, mais échoue.\n";
        }
    }
}

