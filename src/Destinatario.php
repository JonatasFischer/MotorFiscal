<?php

namespace MotorFiscal;

/**
 * Classe com todas as informações do destinatário.
 */
class Destinatario extends Base
{
    protected $identificador;
    
    /**
     * NF-e/NFC-e :E02 - CNPJ.
     */
    protected $CNPJ;
    
    /**
     * NF-e/NFC-e :E03 - CPF.
     */
    protected $CPF;
    
    /**
     * NF-e/NFC-e :E03a - idEstrangeiro.
     */
    protected $idEstrangeiro;
    
    /**
     * NF-e/NFC-e :E04 - xNome.
     */
    protected $xNome;
    
    protected $xFant; //Variável auxiliar
    
    /**
     * NF-e/NFC-e :E06 - Logradouro.
     */
    protected $xLgr;
    
    /**
     * NF-e/NFC-e :E07 - Número.
     */
    protected $nro;
    
    /**
     * NF-e/NFC-e :E08 - Complemento.
     */
    protected $xCpl;
    
    /**
     * NF-e/NFC-e :E09 - Bairro.
     */
    protected $xBairro;
    
    /**
     * NF-e/NFC-e :E10 - Código do municípioMun.
     */
    protected $cMun;
    
    /**
     * NF-e/NFC-e :E11 - Nome do município.
     */
    protected $xMun;
    
    /**
     * NF-e/NFC-e :E12 - Sigla da UF.
     */
    protected $UF;
    
    /**
     * NF-e/NFC-e :E13 - Código do CEP.
     */
    protected $CEP;
    
    /**
     * NF-e/NFC-e :E14 - Código do País.
     */
    protected $cPais;
    
    /**
     * NF-e/NFC-e :E15 - Nome do País.
     */
    protected $xPais;
    
    /**
     * NF-e/NFC-e :E16 - Telefone.
     */
    protected $fone;
    
    /**
     * NF-e/NFC-e :E16a - indIEDest.
     */
    protected $indIEDest;
    
    /**
     * NF-e/NFC-e :E17 - IE.
     */
    protected $IE;
    
    /**
     * NF-e/NFC-e :E18 - IEST.
     */
    protected $IEST;
    
    /**
     * NF-e/NFC-e :E18a - IM.
     */
    protected $IM;
    
    /**
     * NF-e/NFC-e :E19 - email.
     */
    protected $email;
    
    protected $tipo_cadastro;
    
    protected $id_estado;
    
    protected $id_cidade;
    
    
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
     * @return Destinatario
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
        
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
     * @return Destinatario
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
     * @return Destinatario
     */
    public function setCPF($CPF)
    {
        $this->CPF = $CPF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function idEstrangeiro()
    {
        return $this->idEstrangeiro;
    }
    
    
    /**
     * @param mixed $idEstrangeiro
     *
     * @return Destinatario
     */
    public function setIdEstrangeiro($idEstrangeiro)
    {
        $this->idEstrangeiro = $idEstrangeiro;
        
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
     */
    public function setFone($fone)
    {
        $this->fone = $fone;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function indIEDest()
    {
        return $this->indIEDest;
    }
    
    
    /**
     * @param mixed $indIEDest
     *
     * @return Destinatario
     */
    public function setIndIEDest($indIEDest)
    {
        $this->indIEDest = $indIEDest;
        
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
     * @return Destinatario
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
     * @return Destinatario
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
     * @return Destinatario
     */
    public function setIM($IM)
    {
        $this->IM = $IM;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
    }
    
    
    /**
     * @param mixed $email
     *
     * @return Destinatario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function tipo_cadastro()
    {
        return $this->tipo_cadastro;
    }
    
    
    /**
     * @param mixed $tipo_cadastro
     *
     * @return Destinatario
     */
    public function setTipoCadastro($tipo_cadastro)
    {
        $this->tipo_cadastro = $tipo_cadastro;
        
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
     * @return Destinatario
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
     * @return Destinatario
     */
    public function setIdCidade($id_cidade)
    {
        $this->id_cidade = $id_cidade;
        
        return $this;
    }
}
