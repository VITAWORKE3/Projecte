<?php

namespace vitaworke3\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use vitaworke3\ClientBundle\Util\Util;

/**
 * TipusClient
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipusClient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TipusClient", type="string", length=100)
     */
    private $TipusClient;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=100,nullable=true)
     */
    private $slug;

     /**
     * @var boolean
     *
     * @ORM\Column(name="Baixa", type="boolean", nullable=true)
     */
    private $Baixa;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set TipusClient
     *
     * @param string $tipusClient
     * @return TipusClient
     */
    public function setTipusClient($tipusClient)
    {
        $this->TipusClient = $tipusClient;
        $this->slug = Util::getSlug($tipusClient);
    
        return $this;
    }

    /**
     * Get TipusClient
     *
     * @return string 
     */
    public function getTipusClient()
    {
        return $this->TipusClient;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return TipusClient
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
   
     /**
     * Set Baixa
     *
     * @param boolean $baixa
     * 
     */
    public function setBaixa($baixa)
    {
        $this->Baixa = $baixa;
    
        return $this;
    }

    /**
     * Get Baixa
     *
     * @return boolean 
     */
    public function getBaixa()
    {
        return $this->Baixa;
    }

    public function __toString()
    {
        $var= $this->getTipusClient();
        if ($var==null)
        {
            $var=' ';
        }

        return $var;
    }

    
}
