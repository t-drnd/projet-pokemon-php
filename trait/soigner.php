<?php

trait Soigner {
    public function soigner(): void
    {
        // Restaure les points de vie au maximum
        $this->hp = $this->hpInitial;
        echo "{$this->getName()} a été soigné et a retrouvé ses points de vie au maximum ({$this->hp} PV).\n";
    }
}