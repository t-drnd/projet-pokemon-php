<?php

class Combat {
    private $pokemon1;
    private $pokemon2;

    public function __construct(string $pokemon1, string $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function startFight() {
        echo "Le combat entre {$this->pokemon1->getName()} et {$this->pokemon2->getName()} commence !\n\n";

        while (!$this->pokemon1->estKO() && !$this->pokemon2->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);
            if ($this->pokemon2->estKO()) break;

            $this->tourDeCombat($this->pokemon2, $this->pokemon1);
        }

        $this->determinerVainqueur();
    }
}