<?php

class reservations
{
    private $_tarifReduit;
    private $_tarifNormal;
    
    public function __construct($_tarifReduit, $_tarifNormal) {
        $this->_tarifReduit = $_tarifReduit;
        $this->_tarifNormal = $_tarifNormal;
    }

    public function getTarifReduit($jour) {
        if (isset($this->_tarifReduit[$jour])) {
            return $this->_tarifReduit[$jour];
        } else { 
            return null;
        }
    }

    public function getTarifNormal($jour) {
        if (isset($this->_tarifNormal[$jour])) {
            return $this->_tarifNormal[$jour];
        } else { 
            return null;
        }
    }

    public function displayReservationInfo() {
        // Format reservation information for display
        $info = "Tarif Réduit:\n";
        foreach ($this->_tarifReduit as $jour => $tarif) {
            $info .= "Jour: $jour, Tarif: $tarif\n";
        }
        
        $info .= "\nTarif Normal:\n";
        foreach ($this->_tarifNormal as $jour => $tarif) {
            $info .= "Jour: $jour, Tarif: $tarif\n";
        }
        
        return $info;
    }
}
