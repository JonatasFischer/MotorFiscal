<?php

namespace MotorFiscal;

class Operacao extends Base
{
    protected $identificador;
    
    protected $CFOPMercadoria;
    
    protected $NaturezaOperacao;
    
    protected $CFOPMercadoriaST;
    
    protected $CFOPMercadoriaSTSubstituido;
    
    protected $CFOPProduto;
    
    protected $CFOPProdutoST;
    
    protected $TipoOperacao;
    
    protected $identificacao;
    
    protected $finalidade;
    
    protected $indFinal;
    
    protected $indPres;
    
    
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
     * @return Operacao
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CFOPMercadoria()
    {
        return $this->CFOPMercadoria;
    }
    
    
    /**
     * @param mixed $CFOPMercadoria
     *
     * @return Operacao
     */
    public function setCFOPMercadoria($CFOPMercadoria)
    {
        $this->CFOPMercadoria = $CFOPMercadoria;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function NaturezaOperacao()
    {
        return $this->NaturezaOperacao;
    }
    
    
    /**
     * @param mixed $NaturezaOperacao
     *
     * @return Operacao
     */
    public function setNaturezaOperacao($NaturezaOperacao)
    {
        $this->NaturezaOperacao = $NaturezaOperacao;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CFOPMercadoriaST()
    {
        return $this->CFOPMercadoriaST;
    }
    
    
    /**
     * @param mixed $CFOPMercadoriaST
     *
     * @return Operacao
     */
    public function setCFOPMercadoriaST($CFOPMercadoriaST)
    {
        $this->CFOPMercadoriaST = $CFOPMercadoriaST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CFOPMercadoriaSTSubstituido()
    {
        return $this->CFOPMercadoriaSTSubstituido;
    }
    
    
    /**
     * @param mixed $CFOPMercadoriaSTSubstituido
     *
     * @return Operacao
     */
    public function setCFOPMercadoriaSTSubstituido($CFOPMercadoriaSTSubstituido)
    {
        $this->CFOPMercadoriaSTSubstituido = $CFOPMercadoriaSTSubstituido;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CFOPProduto()
    {
        return $this->CFOPProduto;
    }
    
    
    /**
     * @param mixed $CFOPProduto
     *
     * @return Operacao
     */
    public function setCFOPProduto($CFOPProduto)
    {
        $this->CFOPProduto = $CFOPProduto;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CFOPProdutoST()
    {
        return $this->CFOPProdutoST;
    }
    
    
    /**
     * @param mixed $CFOPProdutoST
     *
     * @return Operacao
     */
    public function setCFOPProdutoST($CFOPProdutoST)
    {
        $this->CFOPProdutoST = $CFOPProdutoST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function TipoOperacao()
    {
        return $this->TipoOperacao;
    } /*Descrição*/
    
    /**
     * @param mixed $TipoOperacao
     *
     * @return Operacao
     */
    public function setTipoOperacao($TipoOperacao)
    {
        $this->TipoOperacao = $TipoOperacao;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function identificacao()
    {
        return $this->identificacao;
    }
    
    
    /**
     * @param mixed $identificacao
     *
     * @return Operacao
     */
    public function setIdentificacao($identificacao)
    {
        $this->identificacao = $identificacao;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function finalidade()
    {
        return $this->finalidade;
    }
    
    
    /**
     * @param mixed $finalidade
     *
     * @return Operacao
     */
    public function setFinalidade($finalidade)
    {
        $this->finalidade = $finalidade;
        
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
     * @return Operacao
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
     * @return Operacao
     */
    public function setIndPres($indPres)
    {
        $this->indPres = $indPres;
        
        return $this;
    }
    
    
    public function isDevolucao($cfop)
    {
        $cfop_devolucao = [
            '1202',
            '1203',
            '1204',
            '1208',
            '1209',
            '1410',
            '1411',
            '1503',
            '1504',
            '1505',
            '1506',
            '1553',
            '1660',
            '1661',
            '1662',
            '1918',
            '1919',
            '2201',
            '2202',
            '2203',
            '2204',
            '2208',
            '2209',
            '2410',
            '2411',
            '2503',
            '2504',
            '2505',
            '2506',
            '2553',
            '2660',
            '2661',
            '2662',
            '2918',
            '2919',
            '3201',
            '3202',
            '3211',
            '3503',
            '3553',
            '5201',
            '5202',
            '5208',
            '5209',
            '5210',
            '5410',
            '5411',
            '5412',
            '5413',
            '5503',
            '5553',
            '5555',
            '5556',
            '5660',
            '5661',
            '5662',
            '5918',
            '5919',
            '5921',
            '6201',
            '6202',
            '6208',
            '6209',
            '6210',
            '6410',
            '6411',
            '6412',
            '6413',
            '6503',
            '6553',
            '6555',
            '6556',
            '6660',
            '6661',
            '6662',
            '6918',
            '6919',
            '6921',
            '7201',
            '7202',
            '1201',
            '7210',
            '7211',
            '7553',
            '7556',
        ];
        $cfop           = trim(str_replace('.', '', $cfop));
        
        return in_array($cfop, $cfop_devolucao);
    }
    
    /*
     * Campos com chave para pesquisa do produto no banco de dados.
     */
}
