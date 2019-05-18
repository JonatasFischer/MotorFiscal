<?php

namespace MotorFiscal\Estadual;

use MotorFiscal\Base;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Produto;

/**
 * Class ICMSTot.
 */
class ICMSTot extends Base
{
    /**
     * NF-e/NFC-e :W03 - vBC.
     */
    protected $vBC = 0;
    
    /**
     * NF-e/NFC-e :W04 - vICMS.
     */
    protected $vICMS = 0;
    
    /**
     * NF-e/NFC-e :W04a - vICMSDeson.
     */
    protected $vICMSDeson = 0;
    
    /**
     * NF-e/NFC-e :W04c - vFCPUFDest.
     */
    protected $vFCPUFDest = 0;
    
    /**
     * NF-e/NFC-e :W04e - vICMSUFDest.
     */
    protected $vICMSUFDest = 0;
    
    /**
     * NF-e/NFC-e :W04g - vICMSUFRemet.
     */
    protected $vICMSUFRemet = 0;
    
    /**
     * NF-e/NFC-e :W05 - vBCST.
     */
    protected $vBCST = 0;
    
    /**
     * NF-e/NFC-e :W06 - vST.
     */
    protected $vST = 0;
    
    /**
     * NF-e/NFC-e :W07 - vProd.
     */
    protected $vProd = 0;
    
    /**
     * NF-e/NFC-e :W08 - vFrete.
     */
    protected $vFrete = 0;
    
    /**
     * NF-e/NFC-e :W09 - vSeg.
     */
    protected $vSeg = 0;
    
    /**
     * NF-e/NFC-e :W10 - vDesc.
     */
    protected $vDesc = 0;
    
    /**
     * NF-e/NFC-e :W11 - vII.
     */
    protected $vII = 0;
    
    /**
     * NF-e/NFC-e :W12 - vIPI.
     */
    protected $vIPI = 0;
    
    /**
     * NF-e/NFC-e :W13 - vPIS.
     */
    protected $vPIS = 0;
    
    /**
     * NF-e/NFC-e :W14 - vCOFINS.
     */
    protected $vCOFINS = 0;
    
    /**
     * NF-e/NFC-e :W15 - vOutro.
     */
    protected $vOutro = 0;
    
    /**
     * NF-e/NFC-e :W16a - vTotTrib.
     */
    protected $vTotTrib = 0;
    
    
    public static function createForDocument(DocumentoFiscal $documento)
    {
        $ICMSTot = new ICMSTot();
        foreach ($documento->itens() as $item) {
            if ($item->prod()->tipoItem() === Produto::PRODUTO) {
                $ICMSTot->vBC        += $item->imposto()->ICMS()->vBC();
                $ICMSTot->vICMS      += $item->imposto()->ICMS()->vICMS();
                $ICMSTot->vICMSDeson += $item->imposto()->ICMS()->vICMSDeson();
                $ICMSTot->vBCST      += $item->imposto()->ICMS()->vBCST();
                $ICMSTot->vST        += $item->imposto()->ICMS()->vICMSST();
                $ICMSTot->vProd      += $item->prod()->vProd();
                $ICMSTot->vFrete     += $item->prod()->vFrete();
                $ICMSTot->vSeg       += $item->prod()->vSeg();
                $ICMSTot->vDesc      += $item->prod()->vDesc();
                $ICMSTot->vOutro     += $item->prod()->vOutro();
                $ICMSTot->vII        += 0;
                
                if ($item->imposto()->vTotTrib()) {
                    $ICMSTot->vTotTrib += $item->imposto()->vTotTrib();
                }
                
                $ICMSTot->vCOFINS += $item->imposto()->COFINS()->vCOFINS();
                
                //Totalização da partilha do ICMS
                
                if ($item->imposto()->ICMSUFDest()) {
                    $ICMSTot->vFCPUFDest   += $item->imposto()->ICMSUFDest()->vFCPUFDest();
                    $ICMSTot->vICMSUFDest  += $item->imposto()->ICMSUFDest()->vICMSUFDest();
                    $ICMSTot->vICMSUFRemet += $item->imposto()->ICMSUFDest()->vICMSUFRemet();
                }
            }
        }
        
        return $ICMSTot;
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
     * @return ICMSTot
     */
    public function setVBC($vBC)
    {
        $this->vBC = $vBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMS()
    {
        return $this->vICMS;
    }
    
    
    /**
     * @param mixed $vICMS
     *
     * @return ICMSTot
     */
    public function setVICMS($vICMS)
    {
        $this->vICMS = $vICMS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSDeson()
    {
        return $this->vICMSDeson;
    }
    
    
    /**
     * @param mixed $vICMSDeson
     *
     * @return ICMSTot
     */
    public function setVICMSDeson($vICMSDeson)
    {
        $this->vICMSDeson = $vICMSDeson;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vFCPUFDest()
    {
        return $this->vFCPUFDest
            ? : 0;
    }
    
    
    /**
     * @param mixed $vFCPUFDest
     *
     * @return ICMSTot
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
        return $this->vICMSUFDest
            ? : 0;
    }
    
    
    /**
     * @param mixed $vICMSUFDest
     *
     * @return ICMSTot
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
        return $this->vICMSUFRemet
            ? : 0;
    }
    
    
    /**
     * @param mixed $vICMSUFRemet
     *
     * @return ICMSTot
     */
    public function setVICMSUFRemet($vICMSUFRemet)
    {
        $this->vICMSUFRemet = $vICMSUFRemet;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vBCST()
    {
        return $this->vBCST;
    }
    
    
    /**
     * @param mixed $vBCST
     *
     * @return ICMSTot
     */
    public function setVBCST($vBCST)
    {
        $this->vBCST = $vBCST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vST()
    {
        return $this->vST;
    }
    
    
    /**
     * @param mixed $vST
     *
     * @return ICMSTot
     */
    public function setVST($vST)
    {
        $this->vST = $vST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vProd()
    {
        return $this->vProd;
    }
    
    
    /**
     * @param mixed $vProd
     *
     * @return ICMSTot
     */
    public function setVProd($vProd)
    {
        $this->vProd = $vProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vFrete()
    {
        return $this->vFrete;
    }
    
    
    /**
     * @param mixed $vFrete
     *
     * @return ICMSTot
     */
    public function setVFrete($vFrete)
    {
        $this->vFrete = $vFrete;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vSeg()
    {
        return $this->vSeg;
    }
    
    
    /**
     * @param mixed $vSeg
     *
     * @return ICMSTot
     */
    public function setVSeg($vSeg)
    {
        $this->vSeg = $vSeg;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vDesc()
    {
        return $this->vDesc;
    }
    
    
    /**
     * @param mixed $vDesc
     *
     * @return ICMSTot
     */
    public function setVDesc($vDesc)
    {
        $this->vDesc = $vDesc;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vII()
    {
        return $this->vII;
    }
    
    
    /**
     * @param mixed $vII
     *
     * @return ICMSTot
     */
    public function setVII($vII)
    {
        $this->vII = $vII;
        
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
     * @return ICMSTot
     */
    public function setVIPI($vIPI)
    {
        $this->vIPI = $vIPI;
        
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
     * @return ICMSTot
     */
    public function setVPIS($vPIS)
    {
        $this->vPIS = $vPIS;
        
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
     * @return ICMSTot
     */
    public function setVCOFINS($vCOFINS)
    {
        $this->vCOFINS = $vCOFINS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vOutro()
    {
        return $this->vOutro;
    }
    
    
    /**
     * @param mixed $vOutro
     *
     * @return ICMSTot
     */
    public function setVOutro($vOutro)
    {
        $this->vOutro = $vOutro;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vNF()
    {
        return $this->vProd - $this->vDesc - $this->vICMSDeson + $this->vST + $this->vFrete + $this->vSeg
               + $this->vOutro + $this->vII + $this->vIPI;
    }
    
    
    /**
     * @param mixed $vNF
     *
     * @return ICMSTot
     */
    public function setVNF($vNF)
    {
        $this->vNF = $vNF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vTotTrib()
    {
        return $this->vTotTrib;
    }
    
    
    /**
     * @param mixed $vTotTrib
     *
     * @return ICMSTot
     */
    public function setVTotTrib($vTotTrib)
    {
        $this->vTotTrib = $vTotTrib;
        
        return $this;
    }
}
