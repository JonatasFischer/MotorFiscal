<?php

namespace MotorFiscal\Federal;

use MotorFiscal\Base;

class PIS extends Base
{
    /**
     * NF-e/NFC-e :Q06 - CST.
     */
    protected $CST;
    
    /**
     * NF-e/NFC-e :Q07 - vBC.
     */
    protected $vBC;
    
    /**
     * NF-e/NFC-e :Q08 - pPIS.
     */
    protected $pPIS;
    
    /**
     * NF-e/NFC-e :Q09 - vPIS.
     */
    protected $vPIS;
    
    /**
     * NF-e/NFC-e :Q10 - qBCProd.
     */
    protected $qBCProd;
    
    /**
     * NF-e/NFC-e :Q11 - vAliqProd.
     */
    protected $vAliqProd;
    
    private   $_vBC;
    
    
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
     * @return PIS
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
     * @return PIS
     */
    public function setVBC($vBC)
    {
        $this->vBC = $vBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pPIS()
    {
        return $this->pPIS;
    }
    
    
    /**
     * @param mixed $pPIS
     *
     * @return PIS
     */
    public function setPPIS($pPIS)
    {
        $this->pPIS = $pPIS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vPIS()
    {
        return $this->vPIS;
    }
    
    
    /**
     * @param mixed $vPIS
     *
     * @return PIS
     */
    public function setVPIS($vPIS)
    {
        $this->vPIS = $vPIS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function qBCProd()
    {
        return $this->qBCProd;
    }
    
    
    /**
     * @param mixed $qBCProd
     *
     * @return PIS
     */
    public function setQBCProd($qBCProd)
    {
        $this->qBCProd = $qBCProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vAliqProd()
    {
        return $this->vAliqProd;
    }
    
    
    /**
     * @param mixed $vAliqProd
     *
     * @return PIS
     */
    public function setVAliqProd($vAliqProd)
    {
        $this->vAliqProd = $vAliqProd;
        
        return $this;
    }
}
