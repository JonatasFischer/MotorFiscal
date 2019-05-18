<?php

namespace MotorFiscal;

class IdentificacaoNFe extends Base
{
    /**
     * NF-e/NFC-e :B02 - cUF - Código da UF do emitente do Documento Fiscal.
     */
    protected $cUF;
    
    /**
     * NF-e/NFC-e :B03 - cNF - Código Numérico que compõe a Chave de Acesso.
     */
    protected $cNF;
    
    /**
     * NF-e/NFC-e :B04 - natOp - Descrição da Natureza da Operação.
     */
    protected $natOp;
    
    /**
     * NF-e/NFC-e :B05 - indPag - Indicador da forma de pagamento.
     */
    protected $indPag;
    
    /**
     * NF-e/NFC-e :B06 - mod - Código do Modelo do Documento Fiscal.
     */
    protected $mod;
    
    /**
     * NF-e/NFC-e :B07 - serie - Série do Documento Fiscal.
     */
    protected $serie;
    
    /**
     * NF-e/NFC-e :B08 - nNF - Número do Documento Fiscal.
     */
    protected $nNF;
    
    /**
     * NF-e/NFC-e :B09 - dhEmi - Data e hora de emissão do Documento Fiscal.
     */
    protected $dhEmi;
    
    /**
     * NF-e/NFC-e :B10 - dhSaiEnt - Data e hora de Saída ou da Entrada da Mercadoria/Produto.
     */
    protected $dhSaiEnt;
    
    /**
     * NF-e/NFC-e :B11 - tpNF - Tipo de Operação.
     */
    protected $tpNF;
    
    /**
     * NF-e/NFC-e :B11a - idDest - Identificador de local de destino da operação.
     */
    protected $idDest;
    
    /**
     * NF-e/NFC-e :B12 - cMunFG - Código do Município de Ocorrência do Fato Gerador.
     */
    protected $cMunFG;
    
    /**
     * NF-e/NFC-e :B21 - tpImp - Formato de Impressão do DANFE.
     */
    protected $tpImp;
    
    /**
     * NF-e/NFC-e :B22 - tpEmis - Tipo de Emissão da NF-e.
     */
    protected $tpEmis;
    
    /**
     * NF-e/NFC-e :B23 - cDV - Dígito Verificador da Chave de Acesso da NF-e.
     */
    protected $cDV;
    
    /**
     * NF-e/NFC-e :B24 - tpAmb - Identificação do Ambiente.
     */
    protected $tpAmb;
    
    /**
     * NF-e/NFC-e :B25 - finNFe - Finalidade de emissão da NF-e.
     */
    protected $finNFe;
    
    /**
     * NF-e/NFC-e :B25a - indFinal - Indica operação com Consumidor final.
     */
    protected $indFinal;
    
    /**
     * NF-e/NFC-e :B25b - indPres - Indicador de presença do comprador no estabelecimento comercial no momento da
     * operação.
     */
    protected $indPres;
    
    /**
     * NF-e/NFC-e :B26 - procEmi - Processo de emissão da NF-e.
     */
    protected $procEmi;
    
    
    public static function createIdentificadorNFe(Operacao $operacao)
    {
        $ide = new self();
        $ide->setTpNF($operacao->TipoOperacao());
        $ide->setIdDest($operacao->identificacao());
        $ide->setFinNFe($operacao->finalidade());
        $ide->setIndFinal($operacao->indFinal());
        $ide->setIndPres($operacao->indPres());
        $ide->setNatOp($operacao->NaturezaOperacao());
        
        return $ide;
    }
    
    
    /**
     * @return mixed
     */
    public function cUF()
    {
        return $this->cUF;
    }
    
    
    /**
     * @param mixed $cUF
     *
     * @return IdentificacaoNFe
     */
    public function setCUF($cUF)
    {
        $this->cUF = $cUF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cNF()
    {
        return $this->cNF;
    }
    
    
    /**
     * @param mixed $cNF
     *
     * @return IdentificacaoNFe
     */
    public function setCNF($cNF)
    {
        $this->cNF = $cNF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function natOp()
    {
        return $this->natOp;
    }
    
    
    /**
     * @param mixed $natOp
     *
     * @return IdentificacaoNFe
     */
    public function setNatOp($natOp)
    {
        $this->natOp = $natOp;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function indPag()
    {
        return $this->indPag;
    }
    
    
    /**
     * @param mixed $indPag
     *
     * @return IdentificacaoNFe
     */
    public function setIndPag($indPag)
    {
        $this->indPag = $indPag;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function mod()
    {
        return $this->mod;
    }
    
    
    /**
     * @param mixed $mod
     *
     * @return IdentificacaoNFe
     */
    public function setMod($mod)
    {
        $this->mod = $mod;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function serie()
    {
        return $this->serie;
    }
    
    
    /**
     * @param mixed $serie
     *
     * @return IdentificacaoNFe
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function nNF()
    {
        return $this->nNF;
    }
    
    
    /**
     * @param mixed $nNF
     *
     * @return IdentificacaoNFe
     */
    public function setNNF($nNF)
    {
        $this->nNF = $nNF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function dhEmi()
    {
        return $this->dhEmi;
    }
    
    
    /**
     * @param mixed $dhEmi
     *
     * @return IdentificacaoNFe
     */
    public function setDhEmi($dhEmi)
    {
        $this->dhEmi = $dhEmi;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function dhSaiEnt()
    {
        return $this->dhSaiEnt;
    }
    
    
    /**
     * @param mixed $dhSaiEnt
     *
     * @return IdentificacaoNFe
     */
    public function setDhSaiEnt($dhSaiEnt)
    {
        $this->dhSaiEnt = $dhSaiEnt;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function tpNF()
    {
        return $this->tpNF;
    }
    
    
    /**
     * @param mixed $tpNF
     *
     * @return IdentificacaoNFe
     */
    public function setTpNF($tpNF)
    {
        $this->tpNF = $tpNF;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function idDest()
    {
        return $this->idDest;
    }
    
    
    /**
     * @param mixed $idDest
     *
     * @return IdentificacaoNFe
     */
    public function setIdDest($idDest)
    {
        $this->idDest = $idDest;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cMunFG()
    {
        return $this->cMunFG;
    }
    
    
    /**
     * @param mixed $cMunFG
     *
     * @return IdentificacaoNFe
     */
    public function setCMunFG($cMunFG)
    {
        $this->cMunFG = $cMunFG;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function tpImp()
    {
        return $this->tpImp;
    }
    
    
    /**
     * @param mixed $tpImp
     *
     * @return IdentificacaoNFe
     */
    public function setTpImp($tpImp)
    {
        $this->tpImp = $tpImp;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function tpEmis()
    {
        return $this->tpEmis;
    }
    
    
    /**
     * @param mixed $tpEmis
     *
     * @return IdentificacaoNFe
     */
    public function setTpEmis($tpEmis)
    {
        $this->tpEmis = $tpEmis;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cDV()
    {
        return $this->cDV;
    }
    
    
    /**
     * @param mixed $cDV
     *
     * @return IdentificacaoNFe
     */
    public function setCDV($cDV)
    {
        $this->cDV = $cDV;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function tpAmb()
    {
        return $this->tpAmb;
    }
    
    
    /**
     * @param mixed $tpAmb
     *
     * @return IdentificacaoNFe
     */
    public function setTpAmb($tpAmb)
    {
        $this->tpAmb = $tpAmb;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function finNFe()
    {
        return $this->finNFe;
    }
    
    
    /**
     * @param mixed $finNFe
     *
     * @return IdentificacaoNFe
     */
    public function setFinNFe($finNFe)
    {
        $this->finNFe = $finNFe;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function indFinal()
    {
        return $this->indFinal;
    }
    
    
    /**
     * @param mixed $indFinal
     *
     * @return IdentificacaoNFe
     */
    public function setIndFinal($indFinal)
    {
        $this->indFinal = $indFinal;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function indPres()
    {
        return $this->indPres;
    }
    
    
    /**
     * @param mixed $indPres
     *
     * @return IdentificacaoNFe
     */
    public function setIndPres($indPres)
    {
        $this->indPres = $indPres;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function procEmi()
    {
        return $this->procEmi;
    }
    
    
    /**
     * @param mixed $procEmi
     *
     * @return IdentificacaoNFe
     */
    public function setProcEmi($procEmi)
    {
        $this->procEmi = $procEmi;
        
        return $this;
    }
}
