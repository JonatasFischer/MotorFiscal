<?php

namespace MotorFiscal\Federal;

use MotorFiscal\Base;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Produto;

class RetTrib extends Base
{
    /**
     * NF-e/NFC-e : W24  - vRetPIS.
     */
    protected $vRetPIS;
    
    /**
     * NF-e/NFC-e : W25  - vRetCOFINS.
     */
    protected $vRetCOFINS;
    
    /**
     * NF-e/NFC-e : W26  - vRetCSLL.
     */
    protected $vRetCSLL;
    
    /**
     * NF-e/NFC-e : W27  - vBCIRRF.
     */
    protected $vBCIRRF;
    
    /**
     * NF-e/NFC-e : W28  - vIRRF.
     */
    protected $vIRRF;
    
    /**
     * NF-e/NFC-e : W29  - vBCRetPrev.
     */
    protected $vBCRetPrev;
    
    /**
     * NF-e/NFC-e : W30  - vRetPrev.
     */
    protected $vRetPrev;
    
    
    public static function createForDocumento(DocumentoFiscal $documento)
    {
        $vRetPISServ    = 0;
        $vRetPIS        = 0;
        $vRetCOFINSServ = 0;
        $vRetCOFINS     = 0;
        $vRetCSLLServ   = 0;
        $vRetINSSServ   = 0;
        $vBaseINSSServ  = 0;
        $vRetIRServ     = 0;
        $vBaseIRServ    = 0;
        $retTrib        = null;
        
        foreach ($documento->itens() as $item) {
            if ($item->prod()->tipoItem() === Produto::SERVICO) {
                
                $vRetPISServ    += $item->imposto()->ISSQN()->vRetPIS();
                $vRetPIS        += $item->imposto()->ISSQN()->vRetPIS();
                $vRetCOFINSServ += $item->imposto()->ISSQN()->vRetCOFINS();
                $vRetCOFINS     += $item->imposto()->ISSQN()->vRetCOFINS();
                $vRetCSLLServ   += $item->imposto()->ISSQN()->vRetCSLL();
                $vRetINSSServ   += $item->imposto()->ISSQN()->vRetINSS();
                $vRetIRServ     += $item->imposto()->ISSQN()->vRetIR();
                $vBaseIRServ    += $item->imposto()->ISSQN()->vBC();
                $vBaseINSSServ  += $item->imposto()->ISSQN()->vBC();
            }
        }
        
        //Retenção de PIS, COFINS e CSLL - Contribuições
        if (($vRetPISServ + $vRetCOFINSServ + $vRetCSLLServ) <= 10) {
            $vRetPISServ    = 0;
            $vRetCOFINSServ = 0;
            $vRetCSLLServ   = 0;
        }
        
        //Retenção de INSS
        if ($vRetINSSServ <= 10) {
            $vRetINSSServ  = 0;
            $vBaseINSSServ = 0;
        }
        
        //Retenção de IR
        if ($vRetIRServ <= 10) {
            $vRetIRServ  = 0;
            $vBaseIRServ = 0;
        }
        
        $vRet = $vRetPISServ + $vRetCOFINSServ + $vRetCSLLServ + $vRetINSSServ + $vRetIRServ;
        if ($vRet > 0) {
            $retTrib             = new RetTrib();
            $retTrib->vRetPIS    = $vRetPIS;
            $retTrib->vRetCOFINS = $vRetCOFINS;
            $retTrib->vRetCSLL   = $vRetCSLLServ;
            $retTrib->vBCIRRF    = $vBaseIRServ;
            $retTrib->vIRRF      = $vRetIRServ;
            $retTrib->vBCRetPrev = $vBaseINSSServ;
            $retTrib->vRetPrev   = $vRetINSSServ;
        }
        
        return $retTrib;
    }
    
    
    /**
     * @return mixed
     */
    public function vBCIRRF()
    {
        return $this->vBCIRRF;
    }
    
    
    /**
     * @return mixed
     */
    public function vContribuicoes()
    {
        return $this->vRetPIS() + $this->vRetCOFINS() + $this->vRetCSLL();
    }
    
    
    /**
     * @return mixed
     */
    public function vRetPIS()
    {
        return $this->vRetPIS;
    }
    
    
    /**
     * @return mixed
     */
    public function vRetCOFINS()
    {
        return $this->vRetCOFINS;
    }
    
    
    /**
     * @return mixed
     */
    public function vRetCSLL()
    {
        return $this->vRetCSLL;
    }
    
    
    /**
     * @return mixed
     */
    public function vIRRF()
    {
        return $this->vIRRF;
    }
    
    
    /**
     * @return mixed
     */
    public function vBCRetPrev()
    {
        return $this->vBCRetPrev;
    }
    
    
    /**
     * @return mixed
     */
    public function vRetPrev()
    {
        return $this->vRetPrev;
    }
    
    
}
