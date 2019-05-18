<?php

namespace MotorFiscal\Estadual;

use MotorFiscal\Base;

class ICMSUFDest extends Base
{
    /**
     * NF-e/NFC-e :NA03 - vBCUFDest.
     */
    protected $vBCUFDest;
    
    /**
     * NF-e/NFC-e :NA05 - pFCPUFDest.
     */
    protected $pFCPUFDest;
    
    /**
     * NF-e/NFC-e :NA07 - pICMSUFDest.
     */
    protected $pICMSUFDest;
    
    /**
     * NF-e/NFC-e :NA09 - pICMSInter.
     */
    protected $pICMSInter;
    
    /**
     * NF-e/NFC-e :NA11 - pICMSInterPart.
     */
    protected $pICMSInterPart;
    
    /**
     * NF-e/NFC-e :NA13 - vFCPUFDest.
     */
    protected $vFCPUFDest;
    
    /**
     * NF-e/NFC-e :NA15 - vICMSUFDest.
     */
    protected $vICMSUFDest;
    
    /**
     * NF-e/NFC-e :NA17 - vICMSUFRemet.
     */
    protected $vICMSUFRemet;
    
    
    /**
     * @return mixed
     */
    public function vBCUFDest()
    {
        return $this->vBCUFDest;
    }
    
    
    /**
     * @param mixed $vBCUFDest
     *
     * @return ICMSUFDest
     */
    public function setVBCUFDest($vBCUFDest)
    {
        $this->vBCUFDest = $vBCUFDest;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pFCPUFDest()
    {
        return $this->pFCPUFDest;
    }
    
    
    /**
     * @param mixed $pFCPUFDest
     *
     * @return ICMSUFDest
     */
    public function setPFCPUFDest($pFCPUFDest)
    {
        $this->pFCPUFDest = $pFCPUFDest;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pICMSUFDest()
    {
        return $this->pICMSUFDest;
    }
    
    
    /**
     * @param mixed $pICMSUFDest
     *
     * @return ICMSUFDest
     */
    public function setPICMSUFDest($pICMSUFDest)
    {
        $this->pICMSUFDest = $pICMSUFDest;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pICMSInter()
    {
        return $this->pICMSInter;
    }
    
    
    /**
     * @param mixed $pICMSInter
     *
     * @return ICMSUFDest
     */
    public function setPICMSInter($pICMSInter)
    {
        $this->pICMSInter = $pICMSInter;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pICMSInterPart()
    {
        return $this->pICMSInterPart;
    }
    
    
    /**
     * @param mixed $pICMSInterPart
     *
     * @return ICMSUFDest
     */
    public function setPICMSInterPart($pICMSInterPart)
    {
        $this->pICMSInterPart = $pICMSInterPart;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vFCPUFDest()
    {
        return $this->vFCPUFDest;
    }
    
    
    /**
     * @param mixed $vFCPUFDest
     *
     * @return ICMSUFDest
     */
    public function setVFCPUFDest($vFCPUFDest)
    {
        $this->vFCPUFDest = $vFCPUFDest;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSUFDest()
    {
        return $this->vICMSUFDest;
    }
    
    
    /**
     * @param mixed $vICMSUFDest
     *
     * @return ICMSUFDest
     */
    public function setVICMSUFDest($vICMSUFDest)
    {
        $this->vICMSUFDest = $vICMSUFDest;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSUFRemet()
    {
        return $this->vICMSUFRemet;
    }
    
    
    /**
     * @param mixed $vICMSUFRemet
     *
     * @return ICMSUFDest
     */
    public function setVICMSUFRemet($vICMSUFRemet)
    {
        $this->vICMSUFRemet = $vICMSUFRemet;
        
        return $this;
    }
}
