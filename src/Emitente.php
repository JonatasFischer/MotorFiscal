<?php

namespace MotorFiscal;

/**
 * Classe com todas as infromações do destinatario.
 */
class Emitente extends Base
{
    protected $percCreditoSimples;
    
    protected $identificador;
    
    protected $contribuinteIPI;
    
    /**
     * NF-e/NFC-e :C02 - CNPJ.
     */
    protected $CNPJ;
    
    /**
     * NF-e/NFC-e :C02a - CPF.
     */
    protected $CPF;
    
    /**
     * NF-e/NFC-e :C03 - xNome.
     */
    protected $xNome;
    
    /**
     * NF-e/NFC-e :C04 - xFant.
     */
    protected $xFant;
    
    /**
     * NF-e/NFC-e : C06 - xLgr.
     */
    protected $xLgr;
    
    /**
     * NF-e/NFC-e : C07 - nro.
     */
    protected $nro;
    
    /**
     * NF-e/NFC-e : C08 - xCpl.
     */
    protected $xCpl;
    
    /**
     * NF-e/NFC-e : C09 - xBairro.
     */
    protected $xBairro;
    
    /**
     * NF-e/NFC-e : C10 - cMun.
     */
    protected $cMun;
    
    /**
     * NF-e/NFC-e : C11 - xMun.
     */
    protected $xMun;
    
    /**
     * NF-e/NFC-e : C12 - UF.
     */
    protected $UF;
    
    /**
     * NF-e/NFC-e : C13 - CEP.
     */
    protected $CEP;
    
    /**
     * NF-e/NFC-e : C14 - cPais.
     */
    protected $cPais;
    
    /**
     * NF-e/NFC-e : C15 - xPais.
     */
    protected $xPais;
    
    /**
     * NF-e/NFC-e : C16 - fone.
     */
    protected $fone;
    
    /**
     * NF-e/NFC-e : C17 - IE.
     */
    protected $IE;
    
    /**
     * NF-e/NFC-e : C18 - IEST.
     */
    protected $IEST;
    
    /**
     * NF-e/NFC-e : C19 - IM.
     */
    protected $IM;
    
    /**
     * NF-e/NFC-e : C20 - CNAE.
     */
    protected $CNAE;
    
    /**
     * NF-e/NFC-e : C21 - CRT.
     */
    protected $CRT;
    
    protected $num_versao_ibpt;
    
    protected $id_estado;
    
    protected $id_cidade;
    
    
    /**
     * @return mixed
     */
    public function percCreditoSimples()
    {
        return $this->percCreditoSimples;
    }
    
    
    /**
     * @param mixed $percCreditoSimples
     *
     * @return Emitente
     */
    public function setPercCreditoSimples($percCreditoSimples)
    {
        $this->percCreditoSimples = $percCreditoSimples;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function identificador()
    {
        return $this->identificador;
    }
    
    
    /**
     * @param mixed $identificador
     *
     * @return Emitente
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function contribuinteIPI()
    {
        return $this->contribuinteIPI;
    }
    
    
    /**
     * @param mixed $contribuinteIPI
     *
     * @return Emitente
     */
    public function setContribuinteIPI($contribuinteIPI)
    {
        $this->contribuinteIPI = $contribuinteIPI;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CNPJ()
    {
        return $this->CNPJ;
    }
    
    
    /**
     * @param mixed $CNPJ
     *
     * @return Emitente
     */
    public function setCNPJ($CNPJ)
    {
        $this->CNPJ = $CNPJ;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CPF()
    {
        return $this->CPF;
    }
    
    
    /**
     * @param mixed $CPF
     *
     * @return Emitente
     */
    public function setCPF($CPF)
    {
        $this->CPF = $CPF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xNome()
    {
        return $this->xNome;
    }
    
    
    /**
     * @param mixed $xNome
     *
     * @return Emitente
     */
    public function setXNome($xNome)
    {
        $this->xNome = $xNome;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xFant()
    {
        return $this->xFant;
    }
    
    
    /**
     * @param mixed $xFant
     *
     * @return Emitente
     */
    public function setXFant($xFant)
    {
        $this->xFant = $xFant;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xLgr()
    {
        return $this->xLgr;
    }
    
    
    /**
     * @param mixed $xLgr
     *
     * @return Emitente
     */
    public function setXLgr($xLgr)
    {
        $this->xLgr = $xLgr;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function nro()
    {
        return $this->nro;
    }
    
    
    /**
     * @param mixed $nro
     *
     * @return Emitente
     */
    public function setNro($nro)
    {
        $this->nro = $nro;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xCpl()
    {
        return $this->xCpl;
    }
    
    
    /**
     * @param mixed $xCpl
     *
     * @return Emitente
     */
    public function setXCpl($xCpl)
    {
        $this->xCpl = $xCpl;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xBairro()
    {
        return $this->xBairro;
    }
    
    
    /**
     * @param mixed $xBairro
     *
     * @return Emitente
     */
    public function setXBairro($xBairro)
    {
        $this->xBairro = $xBairro;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cMun()
    {
        return $this->cMun;
    }
    
    
    /**
     * @param mixed $cMun
     *
     * @return Emitente
     */
    public function setCMun($cMun)
    {
        $this->cMun = $cMun;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xMun()
    {
        return $this->xMun;
    }
    
    
    /**
     * @param mixed $xMun
     *
     * @return Emitente
     */
    public function setXMun($xMun)
    {
        $this->xMun = $xMun;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function UF()
    {
        return $this->UF;
    }
    
    
    /**
     * @param mixed $UF
     *
     * @return Emitente
     */
    public function setUF($UF)
    {
        $this->UF = $UF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CEP()
    {
        return $this->CEP;
    }
    
    
    /**
     * @param mixed $CEP
     *
     * @return Emitente
     */
    public function setCEP($CEP)
    {
        $this->CEP = $CEP;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cPais()
    {
        return $this->cPais;
    }
    
    
    /**
     * @param mixed $cPais
     *
     * @return Emitente
     */
    public function setCPais($cPais)
    {
        $this->cPais = $cPais;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xPais()
    {
        return $this->xPais;
    }
    
    
    /**
     * @param mixed $xPais
     *
     * @return Emitente
     */
    public function setXPais($xPais)
    {
        $this->xPais = $xPais;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function fone()
    {
        return $this->fone;
    }
    
    
    /**
     * @param mixed $fone
     *
     * @return Emitente
     */
    public function setFone($fone)
    {
        $this->fone = $fone;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function IE()
    {
        return $this->IE;
    }
    
    
    /**
     * @param mixed $IE
     *
     * @return Emitente
     */
    public function setIE($IE)
    {
        $this->IE = $IE;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function IEST()
    {
        return $this->IEST;
    }
    
    
    /**
     * @param mixed $IEST
     *
     * @return Emitente
     */
    public function setIEST($IEST)
    {
        $this->IEST = $IEST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function IM()
    {
        return $this->IM;
    }
    
    
    /**
     * @param mixed $IM
     *
     * @return Emitente
     */
    public function setIM($IM)
    {
        $this->IM = $IM;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CNAE()
    {
        return $this->CNAE;
    }
    
    
    /**
     * @param mixed $CNAE
     *
     * @return Emitente
     */
    public function setCNAE($CNAE)
    {
        $this->CNAE = $CNAE;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function CRT()
    {
        return $this->CRT;
    }
    
    
    /**
     * @param int $CRT
     *
     * @return Emitente
     */
    public function setCRT($CRT)
    {
        $this->CRT = trim($CRT) * 1;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function num_versao_ibpt()
    {
        return $this->num_versao_ibpt;
    }
    
    
    /**
     * @param mixed $num_versao_ibpt
     *
     * @return Emitente
     */
    public function setNumVersaoIbpt($num_versao_ibpt)
    {
        $this->num_versao_ibpt = $num_versao_ibpt;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function id_estado()
    {
        return $this->id_estado;
    }
    
    
    /**
     * @param mixed $id_estado
     *
     * @return Emitente
     */
    public function setIdEstado($id_estado)
    {
        $this->id_estado = $id_estado;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function id_cidade()
    {
        return $this->id_cidade;
    }
    
    
    /**
     * @param mixed $id_cidade
     *
     * @return Emitente
     */
    public function setIdCidade($id_cidade)
    {
        $this->id_cidade = $id_cidade;
        
        return $this;
    }
}
