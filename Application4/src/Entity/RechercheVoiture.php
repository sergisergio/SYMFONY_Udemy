<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class RechercheVoiture {
    /**
     * @Assert\LessThanOrEqual(propertyPath="maxAnnee", message="doit être plus petit que l'année max")
     */
    private $minAnnee;
    /**
     * @Assert\GreaterThanOrEqual(propertyPath="minAnnee", message="doit être plus petit que l'année min")
     */
    private $maxAnnee;

    /**
     * Get the value of minAnnee
     */ 
    public function getMinAnnee()
    {
        return $this->minAnnee;
    }

    /**
     * Set the value of minAnnee
     *
     * @return  self
     */ 
    public function setMinAnnee(int $annee)
    {
        $this->minAnnee = $annee;

        return $this;
    }

    /**
     * Get the value of maxAnnee
     */ 
    public function getMaxAnnee()
    {
        return $this->maxAnnee;
    }

    /**
     * Set the value of maxAnnee
     *
     * @return  self
     */ 
    public function setMaxAnnee(int $annee)
    {
        $this->maxAnnee = $annee;

        return $this;
    }
}