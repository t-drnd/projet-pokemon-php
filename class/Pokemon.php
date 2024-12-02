<?php 

class Pokemon {
    private $name;
    private $type;
    private $hp;
    private array $attaques = [];

    public function __construct($name, $type,  $hp, $attaques)
    {
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
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

    public function getAttaques()
    {
        return $this->attaques;
    }

    public function attack(Pokemon $adversaire, Attack $attaque) {
        $randomValue = mt_rand(0, 100) / 100; // Génère un nombre entre 0 et 1
        echo "Valeur aléatoire générée: $randomValue\n";  // Affiche la valeur générée pour débogage
    
        if ($randomValue <= $attaque->getPrecision()) {
            echo "{$this->name} utilise {$attaque->getName()} sur {$adversaire->name}.\n";
            $adversaire->recevoirDegats($attaque->getPower());
        } else {
            echo "{$this->name} utilise {$attaque->getName()}, mais échoue.\n";
        }
    }

    public function recevoirDegats(int $degats): void
    {
        $this->hp = max(0, $this->hp - $degats);
        echo "<p class=\"degatsdiv\">{$this->name} reçoit $degats dégâts.</p>\n";
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

