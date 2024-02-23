<?php

class reservations
    {
        private $_tarifReduit;
        private $_tarifNormal;
        

        public function __const ($_tarifReduit, $_tarifNormal) {
            $this->_tarifReduit = $_tarifReduit;
            $this->_tarifNormal = $_tarifNormal;
        }

        public function getTarifReduit($jour) {
            if  (isset($this->_tarifReduit[$jour])) {return $this->_tarifReduit[$jour]; } else { 
                return null;
            }
        }


        public function getTarifNormal($jour) {
            if  (isset($this->_tarifNormal[$jour])) {return $this->_tarifNormal[$jour]; } else { 
                return null;
            }
        }

    }
?>