<?php

namespace MotorFiscal\Federal;

use MotorFiscal\Base;

/**
 * Classe com todas as informações para escrituração do IPI.
 */
class IPI extends Base
{
    /**
     * NF-e/NFC-e :O02 - clEnq.
     */
    protected $clEnq;
    
    /**
     * NF-e/NFC-e :O03 - CNPJProd.
     */
    protected $CNPJProd;
    
    /**
     * NF-e/NFC-e :O04 - cSelo.
     */
    protected $cSelo;
    
    /**
     * NF-e/NFC-e :O05 - qSelo.
     */
    protected $qSelo;
    
    /**
     * NF-e/NFC-e :O06 - cEnq.
     */
    protected $cEnq;
    
    /**
     * NF-e/NFC-e :O09 - CST.
     */
    protected $CST;
    
    /**
     * NF-e/NFC-e :O10 - vBC.
     */
    protected $vBC;
    
    /**
     * NF-e/NFC-e :O11 - qUnid.
     */
    protected $qUnid;
    
    /**
     * NF-e/NFC-e :O12 - vUnid.
     */
    protected $vUnid;
    
    /**
     * NF-e/NFC-e :O13 - pIPI.
     */
    protected $pIPI;
    
    /**
     * NF-e/NFC-e :O14 - vIPI.
     */
    protected $vIPI;
    
    
    /**
     * @return mixed
     */
    public function clEnq()
    {
        return $this->clEnq;
    }
    
    
    /**
     * @param mixed $clEnq
     *
     * @return IPI
     */
    public function setClEnq($clEnq)
    {
        $this->clEnq = $clEnq;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CNPJProd()
    {
        return $this->CNPJProd;
    }
    
    
    /**
     * @param mixed $CNPJProd
     *
     * @return IPI
     */
    public function setCNPJProd($CNPJProd)
    {
        $this->CNPJProd = $CNPJProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cSelo()
    {
        return $this->cSelo;
    }
    
    
    /**
     * @param mixed $cSelo
     *
     * @return IPI
     */
    public function setCSelo($cSelo)
    {
        $this->cSelo = $cSelo;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function qSelo()
    {
        return $this->qSelo;
    }
    
    
    /**
     * @param mixed $qSelo
     *
     * @return IPI
     */
    public function setQSelo($qSelo)
    {
        $this->qSelo = $qSelo;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cEnq()
    {
        return $this->cEnq;
    }
    
    
    /**
     * @param mixed $cEnq
     *
     * @return IPI
     */
    public function setCEnq($cEnq)
    {
        $this->cEnq = $cEnq;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CST()
    {
        return $this->CST;
    }
    
    
    /**
     * @param mixed $CST
     *
     * @return IPI
     */
    public function setCST($CST)
    {
        $this->CST = $CST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vBC()
    {
        return $this->vBC;
    }
    
    
    /**
     * @param mixed $vBC
     *
     * @return IPI
     */
    public function setVBC($vBC)
    {
        $this->vBC = $vBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function qUnid()
    {
        return $this->qUnid;
    }
    
    
    /**
     * @param mixed $qUnid
     *
     * @return IPI
     */
    public function setQUnid($qUnid)
    {
        $this->qUnid = $qUnid;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vUnid()
    {
        return $this->vUnid;
    }
    
    
    /**
     * @param mixed $vUnid
     *
     * @return IPI
     */
    public function setVUnid($vUnid)
    {
        $this->vUnid = $vUnid;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pIPI()
    {
        return $this->pIPI;
    }
    
    
    /**
     * @param mixed $pIPI
     *
     * @return IPI
     */
    public function setPIPI($pIPI)
    {
        $this->pIPI = $pIPI;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vIPI()
    {
        return $this->vIPI;
    }
    
    
    /**
     * @param mixed $vIPI
     *
     * @return IPI
     */
    public function setVIPI($vIPI)
    {
        $this->vIPI = $vIPI;
        
        return $this;
    }
}
