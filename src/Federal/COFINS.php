<?php
/**
 * Created by PhpStorm.
 * User: j.fischer
 * Date: 27.03.19
 * Time: 13:13.
 */

namespace MotorFiscal\Federal;

use MotorFiscal\Base;

class COFINS extends Base
{
    /**
     * NF-e/NFC-e :S06 - CST.
     */
    protected $CST;
    
    /**
     * NF-e/NFC-e :S07 - vBC.
     */
    protected $vBC;
    
    /**
     * NF-e/NFC-e :S08 - pCOFINS.
     */
    protected $pCOFINS;
    
    /**
     * NF-e/NFC-e :Q09 - qBCProd.
     */
    protected $qBCProd;
    
    /**
     * NF-e/NFC-e :S10 - vAliqProd.
     */
    protected $vAliqProd;
    
    /**
     * NF-e/NFC-e :S11 - vCOFINS.
     */
    protected $vCOFINS;
    
    
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
     * @return COFINS
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
     * @return COFINS
     */
    public function setVBC($vBC)
    {
        $this->vBC = $vBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pCOFINS()
    {
        return $this->pCOFINS;
    }
    
    
    /**
     * @param mixed $pCOFINS
     *
     * @return COFINS
     */
    public function setPCOFINS($pCOFINS)
    {
        $this->pCOFINS = $pCOFINS;
        
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
     * @return COFINS
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
     * @return COFINS
     */
    public function setVAliqProd($vAliqProd)
    {
        $this->vAliqProd = $vAliqProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vCOFINS()
    {
        return $this->vCOFINS;
    }
    
    
    /**
     * @param mixed $vCOFINS
     *
     * @return COFINS
     */
    public function setVCOFINS($vCOFINS)
    {
        $this->vCOFINS = $vCOFINS;
        
        return $this;
    }
}
