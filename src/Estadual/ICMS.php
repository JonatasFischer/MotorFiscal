<?php

namespace MotorFiscal\Estadual;

use MotorFiscal\Base;

/**
 * Classe com todas as informações para escrituração do ICMS.
 *
 * @property double vICMS_Ficto Valor do ICMS que não sera destacado na nota fiscal. Calculado apenas para auxiliar no
 *           calculo de outros valores
 */
class ICMS extends Base
{
    /**
     * @var float
     */
    protected $vICMS_Ficto = 0;
    
    /**
     * NF-e/NFC-e :N11 - Orig.
     *
     * @var integer
     */
    private $orig;
    
    /**
     * NF-e/NFC-e :N12 - CST.
     *
     * @var string
     */
    private $CST;
    
    /**
     * NF-e/NFC-e :N12a - CSOSN.
     *
     * @var integer
     */
    private $CSOSN;
    
    /**
     * NF-e/NFC-e :N13 - modBC.
     */
    private $modBC;
    
    /**
     * NF-e/NFC-e :N14 - pRedBC.
     */
    private $pRedBC;
    
    /**
     * NF-e/NFC-e :N15 - vBC.
     */
    private $vBC;
    
    /**
     * @var
     */
    private $vBC_Desonerado;
    
    /**
     * NF-e/NFC-e :N16 - pICMS.
     */
    private $pICMS;
    
    /**
     * @var
     */
    private $pICMS_Desonerado;
    
    /**
     * NF-e/NFC-e :N16a - vICMSOp.
     */
    private $vICMSOp;
    
    /**
     * NF-e/NFC-e :N16b - pDif.
     */
    private $pDif;
    
    /**
     * NF-e/NFC-e :N16c - vICMSDif.
     */
    private $vICMSDif;
    
    /**
     * NF-e/NFC-e :N17 - vICMS.
     */
    private $vICMS;
    
    private $vICMS_Desonerado;
    
    /**
     * NF-e/NFC-e :N18 - modBCST.
     */
    
    private $modBCST;
    
    /**
     * NF-e/NFC-e :N19 - pMVAST.
     */
    
    private $pMVAST;
    
    /**
     * NF-e/NFC-e :N20 - pRedBCST.
     */
    
    private $pRedBCST;
    
    /**
     * NF-e/NFC-e :N21 - vBCST.
     */
    
    private $vBCST;
    
    private $vBCST_NaoDestacado;
    
    /**
     * NF-e/NFC-e :N22 - pICMSST.
     */
    private $pICMSST;
    
    /**
     * NF-e/NFC-e :N23 - vICMSST.
     */
    private $vICMSST;
    
    /**
     * @var double
     */
    private $vICMSSTNaoDestacado;
    
    /**
     * NF-e/NFC-e :N24 - UFST.
     */
    private $UFST;
    
    /**
     * NF-e/NFC-e :N25 - pBCOp.
     */
    
    private $pBCOp;
    
    /**
     * NF-e/NFC-e :N26 - vBCSTRet.
     */
    private $vBCSTRet;
    
    /**
     * NF-e/NFC-e :N27 - vICMSSTRet.
     */
    private $vICMSSTRet;
    
    /**
     * NF-e/NFC-e :N27a - vICMSDeson.
     */
    private $vICMSDeson;
    
    /**
     * NF-e/NFC-e :N28 - motDesICMS.
     */
    private $motDesICMS;
    
    /**
     * NF-e/NFC-e :N29 - pCredSN.
     */
    private $pCredSN;
    
    /**
     * NF-e/NFC-e :N30 - vCredICMSSN.
     */
    private $vCredICMSSN;
    
    /**
     * NF-e/NFC-e :N31 - vBCSTDest.
     */
    private $vBCSTDest;
    
    /**
     * NF-e/NFC-e :N32 - vICMSSTDest.
     */
    private $vICMSSTDest;
    
    
    /**
     * @return float
     */
    public function vICMSFicto()
    {
        return $this->vICMS_Ficto;
    }
    
    
    /**
     * @param float $vICMS_Ficto
     *
     * @return ICMS
     */
    public function setVICMSFicto($vICMS_Ficto)
    {
        $this->vICMS_Ficto = $vICMS_Ficto;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function orig()
    {
        return $this->orig;
    }
    
    
    /**
     * @param mixed $orig
     *
     * @return ICMS
     */
    public function setOrig($orig)
    {
        $this->orig = $orig;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function CST()
    {
        return $this->CST;
    }
    
    
    /**
     * @param string $CST
     *
     * @return ICMS
     */
    public function setCST($CST)
    {
        $this->CST = $CST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CSOSN()
    {
        return $this->CSOSN;
    }
    
    
    /**
     * @param mixed $CSOSN
     *
     * @return ICMS
     */
    public function setCSOSN($CSOSN)
    {
        $this->CSOSN = $CSOSN;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function modBC()
    {
        return $this->modBC;
    }
    
    
    /**
     * @param mixed $modBC
     *
     * @return ICMS
     */
    public function setModBC($modBC)
    {
        $this->modBC = $modBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pRedBC()
    {
        return $this->pRedBC;
    }
    
    
    /**
     * @param mixed $pRedBC
     *
     * @return ICMS
     */
    public function setPRedBC($pRedBC)
    {
        $this->pRedBC = $pRedBC;
        
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
     * @return ICMS
     */
    public function setVBC($vBC)
    {
        $this->vBC = $vBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vBC_Desonerado()
    {
        return $this->vBC_Desonerado;
    }
    
    
    /**
     * @param mixed $vBC_Desonerado
     *
     * @return ICMS
     */
    public function setVBCDesonerado($vBC_Desonerado)
    {
        $this->vBC_Desonerado = $vBC_Desonerado;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pICMS()
    {
        return $this->pICMS;
    }
    
    
    /**
     * @param mixed $pICMS
     *
     * @return ICMS
     */
    public function setPICMS($pICMS)
    {
        $this->pICMS = $pICMS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pICMS_Desonerado()
    {
        return $this->pICMS_Desonerado;
    }
    
    
    /**
     * @param mixed $pICMS_Desonerado
     *
     * @return ICMS
     */
    public function setPICMSDesonerado($pICMS_Desonerado)
    {
        $this->pICMS_Desonerado = $pICMS_Desonerado;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSOp()
    {
        return $this->vICMSOp;
    }
    
    
    /**
     * @param mixed $vICMSOp
     *
     * @return ICMS
     */
    public function setVICMSOp($vICMSOp)
    {
        $this->vICMSOp = $vICMSOp;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pDif()
    {
        return $this->pDif;
    }
    
    
    /**
     * @param mixed $pDif
     *
     * @return ICMS
     */
    public function setPDif($pDif)
    {
        $this->pDif = $pDif;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSDif()
    {
        return $this->vICMSDif;
    }
    
    
    /**
     * @param mixed $vICMSDif
     *
     * @return ICMS
     */
    public function setVICMSDif($vICMSDif)
    {
        $this->vICMSDif = $vICMSDif;
        
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
     * @return ICMS
     */
    public function setVICMS($vICMS)
    {
        $this->vICMS = $vICMS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSDesonerado()
    {
        return $this->vICMS_Desonerado;
    }
    
    
    /**
     * @param mixed $vICMS_Desonerado
     *
     * @return ICMS
     */
    public function setVICMSDesonerado($vICMS_Desonerado)
    {
        $this->vICMS_Desonerado = $vICMS_Desonerado;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function modBCST()
    {
        return $this->modBCST;
    }
    
    
    /**
     * @param mixed $modBCST
     *
     * @return ICMS
     */
    public function setModBCST($modBCST)
    {
        $this->modBCST = $modBCST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pMVAST()
    {
        return $this->pMVAST;
    }
    
    
    /**
     * @param mixed $pMVAST
     *
     * @return ICMS
     */
    public function setPMVAST($pMVAST)
    {
        $this->pMVAST = $pMVAST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pRedBCST()
    {
        return $this->pRedBCST;
    }
    
    
    /**
     * @param mixed $pRedBCST
     *
     * @return ICMS
     */
    public function setPRedBCST($pRedBCST)
    {
        $this->pRedBCST = $pRedBCST;
        
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
     * @return ICMS
     */
    public function setVBCST($vBCST)
    {
        $this->vBCST = $vBCST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vBCSTNaoDestacado()
    {
        return $this->vBCST_NaoDestacado;
    }
    
    
    /**
     * @param mixed $vBCST_NaoDestacado
     *
     * @return ICMS
     */
    public function setVBCSTNaoDestacado($vBCST_NaoDestacado)
    {
        $this->vBCST_NaoDestacado = $vBCST_NaoDestacado;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pICMSST()
    {
        return $this->pICMSST;
    }
    
    
    /**
     * @param mixed $pICMSST
     *
     * @return ICMS
     */
    public function setPICMSST($pICMSST)
    {
        $this->pICMSST = $pICMSST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSST()
    {
        return $this->vICMSST;
    }
    
    
    /**
     * @param mixed $vICMSST
     *
     * @return ICMS
     */
    public function setVICMSST($vICMSST)
    {
        $this->vICMSST = $vICMSST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSSTNaoDestacado()
    {
        return $this->vICMSSTNaoDestacado;
    }
    
    
    /**
     * @param mixed $vICMSSTNaoDestacado
     *
     * @return ICMS
     */
    public function setVICMSSTNaoDestacado($vICMSSTNaoDestacado)
    {
        $this->vICMSSTNaoDestacado = $vICMSSTNaoDestacado;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function UFST()
    {
        return $this->UFST;
    }
    
    
    /**
     * @param mixed $UFST
     *
     * @return ICMS
     */
    public function setUFST($UFST)
    {
        $this->UFST = $UFST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pBCOp()
    {
        return $this->pBCOp;
    }
    
    
    /**
     * @param mixed $pBCOp
     *
     * @return ICMS
     */
    public function setPBCOp($pBCOp)
    {
        $this->pBCOp = $pBCOp;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vBCSTRet()
    {
        return $this->vBCSTRet;
    }
    
    
    /**
     * @param mixed $vBCSTRet
     *
     * @return ICMS
     */
    public function setVBCSTRet($vBCSTRet)
    {
        $this->vBCSTRet = $vBCSTRet;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSSTRet()
    {
        return $this->vICMSSTRet;
    }
    
    
    /**
     * @param mixed $vICMSSTRet
     *
     * @return ICMS
     */
    public function setVICMSSTRet($vICMSSTRet)
    {
        $this->vICMSSTRet = $vICMSSTRet;
        
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
     * @return ICMS
     */
    public function setVICMSDeson($vICMSDeson)
    {
        $this->vICMSDeson = $vICMSDeson;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function motDesICMS()
    {
        return $this->motDesICMS;
    }
    
    
    /**
     * @param mixed $motDesICMS
     *
     * @return ICMS
     */
    public function setMotDesICMS($motDesICMS)
    {
        $this->motDesICMS = $motDesICMS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pCredSN()
    {
        return $this->pCredSN;
    }
    
    
    /**
     * @param mixed $pCredSN
     *
     * @return ICMS
     */
    public function setPCredSN($pCredSN)
    {
        $this->pCredSN = $pCredSN;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vCredICMSSN()
    {
        return $this->vCredICMSSN;
    }
    
    
    /**
     * @param mixed $vCredICMSSN
     *
     * @return ICMS
     */
    public function setVCredICMSSN($vCredICMSSN)
    {
        $this->vCredICMSSN = $vCredICMSSN;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vBCSTDest()
    {
        return $this->vBCSTDest;
    }
    
    
    /**
     * @param mixed $vBCSTDest
     *
     * @return ICMS
     */
    public function setVBCSTDest($vBCSTDest)
    {
        $this->vBCSTDest = $vBCSTDest;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vICMSSTDest()
    {
        return $this->vICMSSTDest;
    }
    
    
    /**
     * @param mixed $vICMSSTDest
     *
     * @return ICMS
     */
    public function setVICMSSTDest($vICMSSTDest)
    {
        $this->vICMSSTDest = $vICMSSTDest;
        
        return $this;
    }
}
