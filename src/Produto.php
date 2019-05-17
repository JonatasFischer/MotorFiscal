<?php

namespace MotorFiscal;

/**
 * Classe representada pelo item H01 da NF-e/NFC-e.
 *
 * @property string $identificador ID do produto de livre utilizacao.
 */
class Produto extends Base
{
    const SERVICO = 1;
    const PRODUTO = 0;

    public $TipoTributacaoIPI = 0;
    public $TipoTributacaoPISCOFINS = 0;
    public $OrigemMercadoria = 0;
    public $FormaAquisicao = 0;
    /**
     * NF-e/NFC-e :I02 - cProd.
     */
    public $cProd;
    /**
     * NF-e/NFC-e :I03 - cEAN.
     */
    public $cEAN;
    /**
     * NF-e/NFC-e :I04 - xProd.
     */
    public $xProd;
    /**
     * NF-e/NFC-e :I05 - NCM.
     */
    public $NCM;
    /**
     * NF-e/NFC-e :I05a - NVE.
     */
    public $NVE;
    /**
     * NF-e/NFC-e :I06 - EXTIPI.
     */
    public $EXTIPI;
    /**
     * NF-e/NFC-e :I08 - CFOP.
     */
    public $CFOP;
    /**
     * NF-e/NFC-e :I09 - uCom.
     */
    public $uCom = 0;
    /**
     * NF-e/NFC-e :I10 - qCom.
     */
    public $qCom = 0;

    //dados do banco de dados
    /**
     * NF-e/NFC-e :I10a - vUnCom.
     */
    public $vUnCom = 0; /*0 = Aliquota; 1 = Quantidade*/
    /**
     * NF-e/NFC-e :I05c - CEST - CÃ³digo CEST.
     */
    public $CEST; /*0 = Aliquota; 1 = Quantidade*/
    /**
     * NF-e/NFC-e :I11 - vProd.
     */
    public $vProd = 0;
    /**
     * NF-e/NFC-e :I12 - cEANTrib.
     */
    public $cEANTrib;
    /**
     * Campos com chave para pesquisa do produto no banco de dados.
     */

    //dados da NF-e
    /**
     * NF-e/NFC-e :I13 - uTrib.
     */
    public $uTrib;
    /**
     * NF-e/NFC-e :I14 - qTrib.
     */
    public $qTrib = 0;
    /**
     * NF-e/NFC-e :I14a - vUnTrib.
     */
    public $vUnTrib = 0;
    /**
     * NF-e/NFC-e :I15 - vFrete.
     */
    public $vFrete = 0;
    /**
     * NF-e/NFC-e :I16 - vSeg.
     */
    public $vSeg = 0;
    /**
     * NF-e/NFC-e :I17 - vDesc.
     */
    public $vDesc = 0.00;

    /**
     * NF-e/NFC-e :I17a - vOutro.
     */
    public $vOutro = 0;
    /**
     * NF-e/NFC-e :I17b - indTot.
     */
    public $indTot = 1;
    protected $identificador;
    protected $tipoItem = self::PRODUTO;
    
    protected $cMunFG = '';
    protected $cMun = '';
    protected $cPais = '';
    protected $cListServ = '';
    protected $cServico = '';
    protected $indISS = '';
    protected $nProcesso = '';
    protected $indIncentivo = '';
    protected $vDeducao = 0;
    protected $vDescIncond = 0;
    protected $vDescCond = 0;

    public function vDesc()
    {
        return (empty($this->vDesc)) ? 0.00 : $this->vDesc;
    }

    public function vDeducao()
    {
        return (empty($this->vDeducao)) ? 0.00 : $this->vDeducao;
    }
    
    
    /**
     * @return string
     */
    public function tipoItem()
    {
        return $this->tipoItem;
    }
    
    
    /**
     * @return string
     */
    public function identificador()
    {
        return $this->identificador;
    }
    
    
    /**
     * @param string $identificador
     *
     * @return Produto
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function TipoTributacaoIPI()
    {
        return $this->TipoTributacaoIPI;
    }
    
    
    /**
     * @param int $TipoTributacaoIPI
     *
     * @return Produto
     */
    public function setTipoTributacaoIPI($TipoTributacaoIPI)
    {
        $this->TipoTributacaoIPI = $TipoTributacaoIPI;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function TipoTributacaoPISCOFINS()
    {
        return $this->TipoTributacaoPISCOFINS;
    }
    
    
    /**
     * @param int $TipoTributacaoPISCOFINS
     *
     * @return Produto
     */
    public function setTipoTributacaoPISCOFINS($TipoTributacaoPISCOFINS)
    {
        $this->TipoTributacaoPISCOFINS = $TipoTributacaoPISCOFINS;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function OrigemMercadoria()
    {
        return $this->OrigemMercadoria;
    }
    
    
    /**
     * @param int $OrigemMercadoria
     *
     * @return Produto
     */
    public function setOrigemMercadoria($OrigemMercadoria)
    {
        $this->OrigemMercadoria = $OrigemMercadoria;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function FormaAquisicao()
    {
        return $this->FormaAquisicao;
    }
    
    
    /**
     * @param int $FormaAquisicao
     *
     * @return Produto
     */
    public function setFormaAquisicao($FormaAquisicao)
    {
        $this->FormaAquisicao = $FormaAquisicao;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cProd()
    {
        return $this->cProd;
    }
    
    
    /**
     * @param mixed $cProd
     *
     * @return Produto
     */
    public function setCProd($cProd)
    {
        $this->cProd = $cProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cEAN()
    {
        return $this->cEAN;
    }
    
    
    /**
     * @param mixed $cEAN
     *
     * @return Produto
     */
    public function setCEAN($cEAN)
    {
        $this->cEAN = $cEAN;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function xProd()
    {
        return $this->xProd;
    }
    
    
    /**
     * @param mixed $xProd
     *
     * @return Produto
     */
    public function setXProd($xProd)
    {
        $this->xProd = $xProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function NCM()
    {
        return $this->NCM;
    }
    
    
    /**
     * @param mixed $NCM
     *
     * @return Produto
     */
    public function setNCM($NCM)
    {
        $this->NCM = $NCM;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function NVE()
    {
        return $this->NVE;
    }
    
    
    /**
     * @param mixed $NVE
     *
     * @return Produto
     */
    public function setNVE($NVE)
    {
        $this->NVE = $NVE;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function EXTIPI()
    {
        return $this->EXTIPI;
    }
    
    
    /**
     * @param mixed $EXTIPI
     *
     * @return Produto
     */
    public function setEXTIPI($EXTIPI)
    {
        $this->EXTIPI = $EXTIPI;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CFOP()
    {
        return $this->CFOP;
    }
    
    
    /**
     * @param mixed $CFOP
     *
     * @return Produto
     */
    public function setCFOP($CFOP)
    {
        $this->CFOP = $CFOP;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function uCom()
    {
        return $this->uCom;
    }
    
    
    /**
     * @param mixed $uCom
     *
     * @return Produto
     */
    public function setUCom($uCom)
    {
        $this->uCom = $uCom;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function qCom()
    {
        return $this->qCom;
    }
    
    
    /**
     * @param mixed $qCom
     *
     * @return Produto
     */
    public function setQCom($qCom)
    {
        $this->qCom = $qCom;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vUnCom()
    {
        return $this->vUnCom;
    }
    
    
    /**
     * @param mixed $vUnCom
     *
     * @return Produto
     */
    public function setVUnCom($vUnCom)
    {
        $this->vUnCom = $vUnCom;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CEST()
    {
        return $this->CEST;
    }
    
    
    /**
     * @param mixed $CEST
     *
     * @return Produto
     */
    public function setCEST($CEST)
    {
        $this->CEST = $CEST;
        
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
     * @return Produto
     */
    public function setVProd($vProd)
    {
        $this->vProd = $vProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cEANTrib()
    {
        return $this->cEANTrib;
    }
    
    
    /**
     * @param mixed $cEANTrib
     *
     * @return Produto
     */
    public function setCEANTrib($cEANTrib)
    {
        $this->cEANTrib = $cEANTrib;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function uTrib()
    {
        return $this->uTrib;
    }
    
    
    /**
     * @param mixed $uTrib
     *
     * @return Produto
     */
    public function setUTrib($uTrib)
    {
        $this->uTrib = $uTrib;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function qTrib()
    {
        return $this->qTrib;
    }
    
    
    /**
     * @param mixed $qTrib
     *
     * @return Produto
     */
    public function setQTrib($qTrib)
    {
        $this->qTrib = $qTrib;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vUnTrib()
    {
        return $this->vUnTrib;
    }
    
    
    /**
     * @param mixed $vUnTrib
     *
     * @return Produto
     */
    public function setVUnTrib($vUnTrib)
    {
        $this->vUnTrib = $vUnTrib;
        
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
     * @return Produto
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
     * @return Produto
     */
    public function setVSeg($vSeg)
    {
        $this->vSeg = $vSeg;
        
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
     * @return Produto
     */
    public function setVOutro($vOutro)
    {
        $this->vOutro = $vOutro;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function indTot()
    {
        return $this->indTot;
    }
    
    
    /**
     * @param mixed $indTot
     *
     * @return Produto
     */
    public function setIndTot($indTot)
    {
        $this->indTot = $indTot;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function cMunFG()
    {
        return $this->cMunFG;
    }
    
    
    /**
     * @param string $cMunFG
     *
     * @return Produto
     */
    public function setCMunFG($cMunFG)
    {
        $this->cMunFG = $cMunFG;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function cMun()
    {
        return $this->cMun;
    }
    
    
    /**
     * @param string $cMun
     *
     * @return Produto
     */
    public function setCMun($cMun)
    {
        $this->cMun = $cMun;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function cPais()
    {
        return $this->cPais;
    }
    
    
    /**
     * @param string $cPais
     *
     * @return Produto
     */
    public function setCPais($cPais)
    {
        $this->cPais = $cPais;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function cListServ()
    {
        return $this->cListServ;
    }
    
    
    /**
     * @param string $cListServ
     *
     * @return Produto
     */
    public function setCListServ($cListServ)
    {
        $this->cListServ = $cListServ;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function cServico()
    {
        return $this->cServico;
    }
    
    
    /**
     * @param string $cServico
     *
     * @return Produto
     */
    public function setCServico($cServico)
    {
        $this->cServico = $cServico;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function indISS()
    {
        return $this->indISS;
    }
    
    
    /**
     * @param string $indISS
     *
     * @return Produto
     */
    public function setIndISS($indISS)
    {
        $this->indISS = $indISS;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function nProcesso()
    {
        return $this->nProcesso;
    }
    
    
    /**
     * @param string $nProcesso
     *
     * @return Produto
     */
    public function setNProcesso($nProcesso)
    {
        $this->nProcesso = $nProcesso;
        
        return $this;
    }
    
    
    /**
     * @return string
     */
    public function indIncentivo()
    {
        return $this->indIncentivo;
    }
    
    
    /**
     * @param string $indIncentivo
     *
     * @return Produto
     */
    public function setIndIncentivo($indIncentivo)
    {
        $this->indIncentivo = $indIncentivo;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function vDescIncond()
    {
        return $this->vDescIncond;
    }
    
    
    /**
     * @param int $vDescIncond
     *
     * @return Produto
     */
    public function setVDescIncond($vDescIncond)
    {
        $this->vDescIncond = $vDescIncond;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function vDescCond()
    {
        return $this->vDescCond;
    }
    
    
    /**
     * @param int $vDescCond
     *
     * @return Produto
     */
    public function setVDescCond($vDescCond)
    {
        $this->vDescCond = $vDescCond;
        
        return $this;
    }
    
    
    
}
