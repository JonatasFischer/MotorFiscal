<?php

namespace MotorFiscal\Estadual;

use MotorFiscal\Base;
use MotorFiscal\Exception;
use MotorFiscal\ItemFiscal;

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
    
    
    /**
     * @param \MotorFiscal\ItemFiscal                        $item
     * @param \MotorFiscal\Estadual\ParametrosTributacaoICMS $tributacaoICMS
     *
     * @return \MotorFiscal\Estadual\ICMSUFDest
     * @throws \MotorFiscal\Exception
     */
    public static function createfrom(
        ItemFiscal $item,
        ParametrosTributacaoICMS $tributacaoICMS
    ) {
        
        $ICMSUFDest = new self();
        
        if (!$tributacaoICMS->PercIcmsUFDest()) {
            throw new Exception('Deve ser informada a alíquota de ICMS interestadual para operações com partilha de ICMS');
        }
        
        //Calculo da Partilha do ICMS
        $ICMSUFDest->setVBCUFDest($item->imposto()->ICMS()->vICMSFicto());
        $ICMSUFDest->setPFCPUFDest($tributacaoICMS->PercFCPUFDest());
        $ICMSUFDest->setPICMSUFDest($tributacaoICMS->PercIcmsUFDest());
        $ICMSUFDest->setPICMSInter($tributacaoICMS->AliquotaICMS());
        $ICMSUFDest->setPICMSInterPart($ICMSUFDest->getDiferencialAliquota(date('Y')));
        $ICMSUFDest->setvFCPUFDest($ICMSUFDest->vBCUFDest() * $ICMSUFDest->pFCPUFDest() / 100);
        
        $diferencial_icms = ceil(round(($ICMSUFDest->vBCUFDest() * $ICMSUFDest->pICMSUFDest() / 100)
                                       - ($ICMSUFDest->vBCUFDest() * $ICMSUFDest->pICMSInter() / 100)));
        
        if ($diferencial_icms < 0) {
            $diferencial_icms = 0;
        }
        
        $ICMSUFDest->setVICMSUFDest(ceil(round($diferencial_icms * $ICMSUFDest->pICMSInterPart() / 100)));
        $ICMSUFDest->setVICMSUFRemet($diferencial_icms - $ICMSUFDest->vICMSUFDest());
    
        return $ICMSUFDest;
    }
    
    
    /**
     * @param $year
     *
     * @return int
     */
    private function getDiferencialAliquota($year)
    {
        switch ($year) {
            case 2016:
                $result = 40;
                break;
            case 2017:
                $result = 60;
                break;
            case 2018:
                $result = 80;
                break;
            default:
                $result = 100;
                break;
        }
        
        return $result;
    }
}
