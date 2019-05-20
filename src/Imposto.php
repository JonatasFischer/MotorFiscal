<?php

namespace MotorFiscal;

use MotorFiscal\Estadual\ICMS;
use MotorFiscal\Federal\COFINS;
use MotorFiscal\Federal\IPI;
use MotorFiscal\Federal\PIS;
use MotorFiscal\Municipal\ISSQN;

class Imposto extends Base
{
    /**
     * NF-e/NFC-e :M02 - vTotTrib.
     */
    protected $vTotTrib;
    
    /**
     * vTotTribFederal.
     */
    protected $vTotTribFederal;
    
    /**
     * vTotTribEstadual.
     */
    protected $vTotTribEstadual;
    
    /**
     * vTotTribMunicipal.
     */
    protected $vTotTribMunicipal;
    
    /**
     * NF-e/NFC-e :O01 - IPI.
     *
     * @var \MotorFiscal\Federal\IPI
     */
    private $IPI;
    
    /**
     * NF-e/NFC-e :P01 - II.
     */
    protected $II;
    
    /**
     * NF-e/NFC-e :Q01 - PIS.
     *
     * @var \MotorFiscal\Federal\PIS
     */
    protected $PIS;
    
    /**
     * NF-e/NFC-e :S01 - COFINS.
     *
     * @var \MotorFiscal\Federal\COFINS
     */
    protected $COFINS;
    
    /**
     * NF-e/NFC-e :U01 - ISSQN.
     *
     * @var \MotorFiscal\Municipal\ISSQN
     */
    protected $ISSQN;
    
    /**
     * NF-e/NFC-e :NA01 - ICMSUFDest.
     *
     * @var \MotorFiscal\Estadual\ICMSUFDest
     */
    private $ICMSUFDest;
    
    /**
     * NF-e/NFC-e :N01 - ICMS.
     *
     * @var \MotorFiscal\Estadual\ICMS
     */
    private $ICMS;
    
    
    public function __construct()
    {
        $this->ICMSUFDest = null;
    }
    
    
    public static function createImposto(DocumentoFiscal $documento, Produto $produto)
    {
        $imposto = new Imposto();
        
        if ($produto->tipoItem() === Produto::PRODUTO) {
            $imposto->ICMS = new ICMS();
            
            /* N11 */
            $imposto->ICMS()->setOrig($produto->origemMercadoria());
            
            //se o emitente é contribuinte do IPI
            if ($documento->emit()->contribuinteIPI()) {
                $imposto->IPI = new IPI();
            }
        } else {
            $imposto->ISSQN = ISSQN::createFromProduct($produto);
        }
        
        $imposto->PIS    = new PIS();
        $imposto->COFINS = new COFINS();
        
        return $imposto;
    }
    
    
    /**
     * @return \MotorFiscal\Estadual\ICMS
     */
    public function ICMS()
    {
        return $this->ICMS;
    }
    
    
    /**
     * @param \MotorFiscal\Estadual\ICMS $ICMS
     *
     * @return Imposto
     */
    public function setICMS($ICMS)
    {
        $this->ICMS = $ICMS;
        
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
     * @return Imposto
     */
    public function setVTotTrib($vTotTrib)
    {
        $this->vTotTrib = $vTotTrib;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vTotTribFederal()
    {
        return $this->vTotTribFederal;
    }
    
    
    /**
     * @param mixed $vTotTribFederal
     *
     * @return Imposto
     */
    public function setVTotTribFederal($vTotTribFederal)
    {
        $this->vTotTribFederal = $vTotTribFederal;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vTotTribEstadual()
    {
        return $this->vTotTribEstadual;
    }
    
    
    /**
     * @param mixed $vTotTribEstadual
     *
     * @return Imposto
     */
    public function setVTotTribEstadual($vTotTribEstadual)
    {
        $this->vTotTribEstadual = $vTotTribEstadual;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vTotTribMunicipal()
    {
        return $this->vTotTribMunicipal;
    }
    
    
    /**
     * @param mixed $vTotTribMunicipal
     *
     * @return Imposto
     */
    public function setVTotTribMunicipal($vTotTribMunicipal)
    {
        $this->vTotTribMunicipal = $vTotTribMunicipal;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Estadual\ICMSUFDest
     */
    public function ICMSUFDest()
    {
        return $this->ICMSUFDest;
    }
    
    
    /**
     * @param \MotorFiscal\Estadual\ICMSUFDest $ICMSUFDest
     *
     * @return Imposto
     */
    public function setICMSUFDest($ICMSUFDest)
    {
        $this->ICMSUFDest = $ICMSUFDest;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Federal\IPI
     */
    public function IPI()
    {
        return $this->IPI;
    }
    
    
    /**
     * @param \MotorFiscal\Federal\IPI $IPI
     *
     * @return Imposto
     */
    public function setIPI($IPI)
    {
        $this->IPI = $IPI;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function II()
    {
        return $this->II;
    }
    
    
    /**
     * @param mixed $II
     *
     * @return Imposto
     */
    public function setII($II)
    {
        $this->II = $II;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Federal\PIS
     */
    public function PIS()
    {
        return $this->PIS;
    }
    
    
    /**
     * @param \MotorFiscal\Federal\PIS $PIS
     *
     * @return Imposto
     */
    public function setPIS($PIS)
    {
        $this->PIS = $PIS;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Federal\COFINS
     */
    public function COFINS()
    {
        return $this->COFINS;
    }
    
    
    /**
     * @param \MotorFiscal\Federal\COFINS $COFINS
     *
     * @return Imposto
     */
    public function setCOFINS($COFINS)
    {
        $this->COFINS = $COFINS;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Municipal\ISSQN
     */
    public function ISSQN()
    {
        return $this->ISSQN;
    }
    
    
    /**
     * @param \MotorFiscal\Municipal\ISSQN $ISSQN
     *
     * @return Imposto
     */
    public function setISSQN($ISSQN)
    {
        $this->ISSQN = $ISSQN;
        
        return $this;
    }
}
