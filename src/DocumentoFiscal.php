<?php

namespace MotorFiscal;

use Closure;
use MotorFiscal\Estadual\ICMSTot;
use MotorFiscal\Estadual\ICMSUFDest;
use MotorFiscal\Estadual\ParametrosTributacaoICMS;
use MotorFiscal\Federal\COFINS;
use MotorFiscal\Federal\PIS;
use MotorFiscal\Federal\RetTrib;
use MotorFiscal\Municipal\ISSQN;
use MotorFiscal\Municipal\ISSQNtot;

/**
 * Class DocumentoFiscal.
 */
class DocumentoFiscal extends Base
{
    const OBJETO        = 1;
    const IDENTIFICADOR = 2;
    
    /**
     * @var \MotorFiscal\Estadual\ICMSTot
     */
    protected $ICMSTot;
    
    /**
     * @var ISSQNtot
     */
    protected $ISSQNtot;
    
    /**
     * @var \MotorFiscal\Federal\RetTrib
     */
    protected $retTrib;
    
    /**
     * @var \MotorFiscal\Emitente
     */
    protected $emit;
    
    /**
     * @var \MotorFiscal\Destinatario
     */
    protected $dest;
    
    /**
     * @var \MotorFiscal\IdentificacaoNFe
     */
    protected $ide;
    
    /**
     * @var \Closure
     */
    protected $buscaTribFunction;
    
    /**
     * @var \Closure
     */
    protected $buscaTribFunctionIBPT;
    
    /**
     * @var \Closure
     */
    protected $buscaTribFunctionIPI;
    
    /**
     * @var \Closure
     */
    protected $buscaTribFunctionICMS;
    
    /**
     * @var \Closure
     */
    protected $buscaTribFunctionPIS;
    
    /**
     * @var \Closure
     */
    protected $buscaTribFunctionCOFINS;
    
    /**
     * @var \Closure
     */
    protected $buscaTribFunctionISSQN;
    
    /**
     * @var \MotorFiscal\ItemFiscal[]
     */
    protected $itens = [];
    
    /**
     * @var \MotorFiscal\Operacao
     */
    protected $operacao;
    
    protected $tipoParametroPesquisa = false;
    
    
    public function __construct(
        Emitente $emitente,
        Destinatario $destinatario,
        Operacao $operacao,
        $usarObjetos = false
    ) {
        $this->setEmit($emitente);
        $this->setDest($destinatario);
        $this->setOperacao($operacao);
        
        $this->ide = IdentificacaoNFe::createIdentificadorNFe($operacao);
        
        $this->setTipoParametroPesquisa($usarObjetos
            ? self::OBJETO
            : self::IDENTIFICADOR);
    }
    
    
    /**
     * @return \MotorFiscal\Estadual\ICMSTot
     */
    public function ICMSTot()
    {
        return $this->ICMSTot;
    }
    
    
    /**
     * @return \MotorFiscal\Municipal\ISSQNtot
     */
    public function ISSQNtot()
    {
        return $this->ISSQNtot;
    }
    
    
    /**
     * @return \Closure
     */
    public function buscaTribFunction()
    {
        return $this->buscaTribFunction;
    }
    
    
    /**
     * @param $buscaTribFunction
     *
     * @return $this
     */
    public function setBuscaTribFunction(Closure $buscaTribFunction)
    {
        $this->buscaTribFunction = $buscaTribFunction;
        
        return $this;
    }
    
    
    /**
     * @return \Closure
     */
    public function buscaTribFunctionIBPT()
    {
        return $this->buscaTribFunctionIBPT;
    }
    
    
    public function setBuscaTribFunctionIBPT(Closure $buscaTribFunctionIBPT)
    {
        $this->buscaTribFunctionIBPT = $buscaTribFunctionIBPT;
        
        return $this;
    }
    
    
    /**
     * @return \Closure
     */
    public function buscaTribFunctionIPI()
    {
        return $this->buscaTribFunctionIPI;
    }
    
    
    /**
     * @param \Closure $buscaTribFunctionIPI
     *
     * @return $this
     */
    public function setBuscaTribFunctionIPI(Closure $buscaTribFunctionIPI)
    {
        $this->buscaTribFunctionIPI = $buscaTribFunctionIPI;
        
        return $this;
    }
    
    
    /**
     * @return \Closure
     */
    public function buscaTribFunctionICMS()
    {
        return $this->buscaTribFunctionICMS;
    }
    
    
    /**
     * @param mixed $buscaTribFunctionICMS
     *
     * @return DocumentoFiscal
     */
    public function setBuscaTribFunctionICMS(Closure $buscaTribFunctionICMS)
    {
        $this->buscaTribFunctionICMS = $buscaTribFunctionICMS;
        
        return $this;
    }
    
    
    /**
     * @return \Closure
     */
    public function buscaTribFunctionPIS()
    {
        return $this->buscaTribFunctionPIS;
    }
    
    
    /**
     * @param mixed $buscaTribFunctionPIS
     *
     * @return DocumentoFiscal
     */
    public function setBuscaTribFunctionPIS(Closure $buscaTribFunctionPIS)
    {
        $this->buscaTribFunctionPIS = $buscaTribFunctionPIS;
        
        return $this;
    }
    
    
    /**
     * @return \Closure
     */
    public function buscaTribFunctionCOFINS()
    {
        return $this->buscaTribFunctionCOFINS;
    }
    
    
    /**
     * @param mixed $buscaTribFunctionCOFINS
     *
     * @return DocumentoFiscal
     */
    public function setBuscaTribFunctionCOFINS(Closure $buscaTribFunctionCOFINS)
    {
        $this->buscaTribFunctionCOFINS = $buscaTribFunctionCOFINS;
        
        return $this;
    }
    
    
    /**
     * @return \Closure
     */
    public function buscaTribFunctionISSQN()
    {
        return $this->buscaTribFunctionISSQN;
    }
    
    
    /**
     * @param mixed $buscaTribFunctionISSQN
     *
     * @return DocumentoFiscal
     */
    public function setBuscaTribFunctionISSQN(Closure $buscaTribFunctionISSQN)
    {
        $this->buscaTribFunctionISSQN = $buscaTribFunctionISSQN;
        
        return $this;
    }
    
    
    /**
     * @return bool|int
     */
    public function tipoParametroPesquisa()
    {
        return $this->tipoParametroPesquisa;
    }
    
    
    /**
     * @param bool|int $tipoParametroPesquisa
     *
     * @return DocumentoFiscal
     */
    public function setTipoParametroPesquisa($tipoParametroPesquisa)
    {
        $this->tipoParametroPesquisa = $tipoParametroPesquisa;
        
        return $this;
    }
    
    
    /**
     * @param \MotorFiscal\Produto       $produto
     * @param \MotorFiscal\Operacao|null $operacao
     *
     * @return \MotorFiscal\ItemFiscal
     * @throws \MotorFiscal\Exception
     */
    public function &addItem(Produto $produto, Operacao $operacao = null)
    {
        /* se não informar uma operação específica ao adicionar um item usar a operação da nota */
        if ($operacao === null) {
            $operacao = $this->operacao();
        }
        
        $this->validate($produto, $operacao);
        $item = ItemFiscal::criarItemFiscal($produto, $operacao, $this);
        
        if ($produto->tipoItem() === Produto::PRODUTO) {
            $item = $this->calcularTributacaoProdutos($item);
        } elseif ($produto->tipoItem() === Produto::SERVICO) {
            $this->calcularTributacaoServicos($item);
        }
        
        $item->imposto()->setPIS(PIS::createFromItemAndDocumento($this, $item));
        $item->imposto()->setCOFINS(COFINS::createFromItemAndDocumento($this, $item));
        
        $item = $this->calcularTributacaoFinal($item);
        
        $item->setNItem(count($this->itens) + 1);
        $this->itens[] = $item;
        
        /* Retorno apenan para fins de consulta */
        
        return $item;
    }
    
    
    /**
     * @return \MotorFiscal\Operacao
     */
    public function operacao()
    {
        return $this->operacao;
    }
    
    
    /**
     * @param \MotorFiscal\Operacao $operacao
     *
     * @return DocumentoFiscal
     */
    public function setOperacao($operacao)
    {
        $this->operacao = $operacao;
        
        return $this;
    }
    
    
    /**
     * @param \MotorFiscal\Produto  $produto
     * @param \MotorFiscal\Operacao $operacao
     *
     * @throws \MotorFiscal\Exception
     */
    private function validate(Produto $produto, Operacao $operacao)
    {
        
        /* Algumas validações */
        if (empty($this->emit)) {
            throw new Exception('Informe o Emitente da nota fiscal antes de adicionar um produto');
        }
        if ($this->emit()->ContribuinteIPI() === null) {
            throw new Exception('Informe se o Emitente é contribuinte do IPI');
        }
        
        if (empty($this->dest)) {
            throw new Exception('Informe o Destinatário da nota fiscal antes de adicionar um produto');
        }
        if (empty($this->operacao)) {
            throw new Exception('Informe a Operacao da nota fiscal antes de adicionar um produto');
        }
        
        if ($produto->tipoItem() === Produto::SERVICO) {
            if ($produto->cMunFG() === '') {
                throw new Exception("Deve ser informado o código do município do fato gerador do ISS na classe MotorFiscal\Produto para itens de serviço. Atual '"
                                    . $produto->cMunFG() . "'");
            }
            
            if ($produto->cMun() === '') {
                throw new Exception('Deve ser informado o código do município da incidência do ISS na classe MotorFiscal\Produto para itens de serviço');
            }
            
            if ($produto->cListServ() === '') {
                throw new Exception('Deve ser informado o código do serviço (ABRASF) do ISS na classe MotorFiscal\Produto para itens de serviço');
            }
            
            if ($produto->cServico() === '') {
                throw new Exception('Deve ser informado o código do serviço(Município) do ISS na classe MotorFiscal\Produto para itens de serviço');
            }
            
            if ($produto->cPais() === '' && $produto->cMunFG() === '9999999') {
                throw new Exception('Deve ser informado o código do pais para serviços internacionais na classe MotorFiscal\Produto para itens de serviço');
            }
            
            if ($produto->indISS() === '') {
                throw new Exception('Deve ser informado a exigibilidade do ISS (1 = Sim, 2 = Não) MotorFiscal\Produto para itens de serviço');
            }
            
            if ($produto->indISS() == 2 && $produto->nProcesso() === '') {
                throw new Exception('Deve ser informado número do processo de inexigibilidade do ISSQN na classe MotorFiscal\Produto para itens de serviço');
            }
            
            if ($produto->indIncentivo() === '') {
                throw new Exception('Deve ser informado a existência de incentivo fiscal(1=Sim, 2=Não) na classe MotorFiscal\Produto para itens de serviço');
            }
        }
    }
    
    
    /**
     * @return \MotorFiscal\Emitente
     */
    public function emit()
    {
        return $this->emit;
    }
    
    
    /**
     * @param \MotorFiscal\Emitente $emit
     *
     * @return DocumentoFiscal
     */
    public function setEmit($emit)
    {
        $this->emit = $emit;
        
        return $this;
    }
    
    
    /**
     * @param \MotorFiscal\ItemFiscal $item
     *
     * @return \MotorFiscal\ItemFiscal
     * @throws \MotorFiscal\Exception
     */
    protected function calcularTributacaoProdutos(ItemFiscal $item)
    {
        $item = $this->calcularTributacaoIPI($item);
        /* ============================= Calculo da Tributacao do ICMS =================== */
        
        $tributacaoICMS = $this->getTribICMS($item->prod(), $item->Operacao());
        
        $item->imposto()->ICMS()->assign($tributacaoICMS);
        
        if ($this->emit()->CRT() === 1) {/* Simples Nacional */
            /* N12a */
            $item->imposto()->ICMS()->setCSOSN($tributacaoICMS->CSOSN());
            /* Base/valor ficto do ICMS para fins de substituição tributária */
            $vBC_ICMS_FICTO = $item->prod()->vProd() - $item->prod()->vDesc() + $item->prod()->vFrete() + $item->prod()
                                                                                                               ->vOutro()
                              + $item->prod()->vSeg();
            
            $item->imposto()->ICMS()->setVICMSFicto(round($vBC_ICMS_FICTO * $tributacaoICMS->AliquotaICMS() / 100, 2));
            
            /* Calcula valor de crédito do ICMS */
            $vBC_ICMS_CredSN = $item->prod()->vProd() - $item->prod()->vDesc() + $item->prod()->vSeg() + $item->prod()
                                                                                                              ->vOutro();
            
            if ($tributacaoICMS->IncluirIPIBaseICMS() && $this->emit()->ContribuinteIPI()) {
                $vBC_ICMS_CredSN += is_numeric($item->imposto()->IPI()->vIPI())
                    ? $item->imposto()->IPI()->vIPI()
                    : 0;
            }
            
            if ($tributacaoICMS->IncluirFreteBaseICMS() && is_numeric($item->prod()->vFrete())) {
                $vBC_ICMS_CredSN += $item->prod()->vFrete();
            }
            
            switch ($item->imposto()->ICMS()->CSOSN()) {
                case '101':
                case '201':
                    if ($this->emit()->PercCreditoSimples()) {
                        /* N29 */
                        $item->imposto()->ICMS()->setPCredSN($this->emit()->PercCreditoSimples());
                        /* N30 */
                        $item->imposto()->ICMS()->setVCredICMSSN((round($item->imposto()->ICMS()->pCredSN()
                                                                        * $vBC_ICMS_CredSN / 100, 2) * 100) / 100);
                    }
                    break;
                case '900':
                    if ($item->Operacao()->isDevolucao($item->prod()->CFOP())) {
                        $item = $this->calcularTributacaoIntegral($item, $tributacaoICMS);
                    } elseif ($this->emit()->PercCreditoSimples() > 0 && $tributacaoICMS->DestacarICMS() == 1) {
                        /* N29 */
                        $item->imposto()->ICMS()->setPCredSN($this->emit()->PercCreditoSimples());
                        /* N30 */
                        $item->imposto()->ICMS()->setVCredICMSSN(ceil(round($item->imposto()->ICMS()->pCredSN()
                                                                            * $vBC_ICMS_CredSN / 100, 2) * 100) / 100);
                    }
                    break;
            }
        } else {
            /* N12a */
            $item->imposto()->ICMS()->setCST($tributacaoICMS->CST());
            
            /* Calcula valor de crédito do ICMS */
            switch ($item->imposto()->ICMS()->CST()) {
                case '00':
                case '10':
                case '20':
                case '30':
                case '40':
                case '41':
                case '50':
                case '51':
                case '70':
                case '90':
                    $this->calcularTributacaoIntegral($item, $tributacaoICMS, $item->prod());
                    
                    break;
            }
        }
        
        $item = $this->calcularPartilhaICMS($tributacaoICMS, $item);
        
        /* Calcula do ICMS-ST */
        $CST_ST = $item->imposto()->ICMS()->CST()
            ? : $item->imposto()->ICMS()->CSOSN();
        switch ($CST_ST) {
            case '101':
            case '102':
            case '201':
            case '202':
            case '900':
            case '00':
            case '10':
            case '20':
            case '30':
            case '70':
            case '90':
                
                // ======= Se existe informacao válida de ICMS ST ==========================
                
                if ($tributacaoICMS->ModalidadeBaseICMSST() >= 0) {
                    
                    /* N18 */
                    $item->imposto()->ICMS()->setModBCST($tributacaoICMS->ModalidadeBaseICMSST());
                    /* N20 */
                    $item->imposto()->ICMS()->setPRedBCST($tributacaoICMS->PercRedICMSST()
                        ? : 0);
                    /* N22 */
                    $item->imposto()->ICMS()->setPICMSST($tributacaoICMS->AliquotaICMSST());
                    
                    /* Margem Valor Agregado (%) */
                    if ($item->imposto()->ICMS()->modBCST() == 4) {
                        /* Percentual MVA Ajustado */
                        /* N19 */
                        $item->imposto()->ICMS()->setPMVAST($tributacaoICMS->PercMVAAjustadoST());
                        
                        /* ============= Base do ICMS-ST ================= */
                        $vBC_ICMS_ST = $item->prod()->vProd() - $item->prod()->vDesc() + $item->prod()->vFrete()
                                       + $item->prod()->vSeg() + $item->prod()->vOutro();
                        /* Incluindo IPI na base do ICMS-ST */
                        //se o Emitente é contribuinte do IPI
                        if ($this->emit()->ContribuinteIPI()) {
                            $vBC_ICMS_ST += $item->imposto()->IPI()->vIPI()
                                ? : 0;
                        }
                        
                        $vBC_ICMS_ST = round($vBC_ICMS_ST * (100 + $item->imposto()->ICMS()->pMVAST()) / 100, 2);
                        if ($item->imposto()->ICMS()->pRedBCST() > 0) {
                            $vBC_ICMS_ST = round($vBC_ICMS_ST * (100 - $item->imposto()->ICMS()->pRedBCST()) / 100, 2);
                        }
                        
                        /* N21 */
                        $item->imposto()->ICMS()->setVBCST(number_format($vBC_ICMS_ST, 2, '.', ''));
                    } else {
                        /* N21 */
                        $item->imposto()->ICMS()->setVBCST($tributacaoICMS->BaseCalcICMSST());
                    }
                    
                    /* N23 */
                    $item->imposto()->ICMS()->setVICMSST(round($item->imposto()->ICMS()->vBCST()
                                                               * $tributacaoICMS->AliquotaICMSST() / 100, 2)
                                                         - $item->imposto()->ICMS()->vICMSFicto(), 2, '.', '');
                    
                    if (!$tributacaoICMS->DestacarICMSST()) {
                        
                        /* Salva os valores do ICMS-ST Nao destacado */
                        /* N21 */
                        $item->imposto()->ICMS()->setVBCSTNaoDestacado($item->imposto()->ICMS()->vBCST());
                        /* N23 */
                        $item->imposto()->ICMS()->setVICMSSTNaoDestacado($item->imposto()->ICMS()->vICMSST());
                        
                        /* N18 */
                        $item->imposto()->ICMS()->setModBCST(null);
                        /* N19 */
                        $item->imposto()->ICMS()->setPMVAST(null);
                        /* N20 */
                        $item->imposto()->ICMS()->setPRedBCST(null);
                        /* N21 */
                        $item->imposto()->ICMS()->setVBCST(null);
                        /* N22 */
                        $item->imposto()->ICMS()->setPICMSST(null);
                        /* N23 */
                        $item->imposto()->ICMS()->setVICMSST(null);
                    } else {
                        if ($item->prod()->formaAquisicao() === 1) {
                            /* I08 */
                            $item->prod()->setCFOP($item->Operacao()->CFOPMercadoriaST());
                        } else {
                            /* I08 */
                            $item->prod()->setCFOP($item->Operacao()->CFOPProdutoST());
                        }
                    }
                }
                break;
            case '60':
            case '500':
                /* I08 */ $item->prod()->setCFOP($item->Operacao()->CFOPMercadoriaSTSubstituido());
                break;
        }
        
        return $item;
    }
    
    
    private function &calcularTributacaoIPI(ItemFiscal $item)
    {
        /* ================= Calcula Tributação do IPI ============================== */
        if (isset($this->buscaTribFunctionIPI) && $this->emit()->ContribuinteIPI()) {
            $tributacaoIPI = $this->getTribIPI($item->prod(), $item->Operacao());
            $item->imposto()->IPI()->assign($tributacaoIPI);
            $item->imposto()->IPI()->setCST($tributacaoIPI->CST);
            $item->imposto()->IPI()->setClEnq($tributacaoIPI->clEnq);
            $item->imposto()->IPI()->setCNPJProd($tributacaoIPI->CNPJProd);
            $item->imposto()->IPI()->setCSelo($tributacaoIPI->cSelo);
            $item->imposto()->IPI()->setQSelo($tributacaoIPI->qSelo);
            $item->imposto()->IPI()->setCEnq($tributacaoIPI->cEnq);
            
            switch ($item->imposto()->IPI()->CST()) {
                case '00':
                case '49':
                case '50':
                case '99':
                    
                    if ($item->prod()->tipoTributacaoIPI() == 0) {/* Tributado por aliquota */
                        /* O10 */
                        $item->imposto()->IPI()->setVBC($item->prod()->vProd() - $item->prod()->vDesc());
                        /* O13 */
                        $item->imposto()->IPI()->setPIPI($tributacaoIPI->Aliquota);
                        /* O14 */
                        $item->imposto()->IPI()->setVIPI(round($item->imposto()->IPI()->vBC() * $item->imposto()
                                                                                                     ->IPI()
                                                                                                     ->pIPI()) / 100,
                            2);
                    } else { /* Tributado por quantidade */
                        /* O11 */
                        $item->imposto()->IPI()->setQUnid($item->prod()->qTrib());
                        /* O12 */
                        $item->imposto()->IPI()->setVUnid($tributacaoIPI->vUnidTribIPI);
                        /* O14 */
                        $item->imposto()->IPI()->setVIPI($item->imposto()->IPI()->qUnid() * $item->imposto()
                                                                                                 ->IPI()
                                                                                                 ->vUnid());
                    }
                    break;
            }
        }
        
        return $item;
    }
    
    
    private function getTribIPI(Produto $produto, Operacao $operacao)
    {
        $callback = $this->buscaTribFunctionIPI;
        
        if (!$this->tipoParametroPesquisa === self::IDENTIFICADOR) {
            return $callback($produto->identificador(), $operacao->identificador(), $this->emit()->identificador(),
                $this->dest->identificador());
        } else {
            return $callback($produto, $operacao, $this->emit, $this->dest);
        }
    }
    
    
    /**
     * @param \MotorFiscal\Produto  $produto
     * @param \MotorFiscal\Operacao $operacao
     *
     * @return \MotorFiscal\Estadual\ParametrosTributacaoICMS
     * @throws \Exception
     */
    private function getTribICMS(Produto $produto, Operacao $operacao)
    {
        $callback = $this->buscaTribFunctionICMS;
        /* pode pesquisar a tributação do produto passando dados como parametros ou os objetos*/
        if ($this->tipoParametroPesquisa === self::IDENTIFICADOR) {
            $tributacaoICMS = $callback($produto->identificador(), $operacao->identificador(),
                $this->emit()->identificador(), $this->dest->identificador());
        } else {
            $tributacaoICMS = $callback($produto, $operacao, $this->emit, $this->dest);
        }
        
        return new ParametrosTributacaoICMS($tributacaoICMS);
    }
    
    
    private function &calcularTributacaoIntegral(ItemFiscal $item, ParametrosTributacaoICMS $tributacaoICMS)
    {
        $vBC_ICMS = 0;
        
        /* N13 */
        $item->imposto()->ICMS()->setModBC($tributacaoICMS->ModalidadeBaseICMS());
        if ($item->imposto()->ICMS()->modBC() === 3 || $item->imposto()->ICMS()->modBC() === 0) {
            $vBC_ICMS = $item->prod()->vProd() - $item->prod()->vDesc() + $item->prod()->vSeg() + $item->prod()
                                                                                                       ->vOutro();
            
            if ($tributacaoICMS->IncluirIPIBaseICMS() && $this->emit()->ContribuinteIPI()) {
                $vBC_ICMS += is_numeric($item->imposto()->IPI()->vIPI())
                    ? $item->imposto()->IPI()->vIPI()
                    : 0;
            }
            if ($tributacaoICMS->IncluirFreteBaseICMS() && is_numeric($item->prod()->vFrete())) {
                $vBC_ICMS += $item->prod()->vFrete();
            }
            //aplica MVA sobre ICMS próprio
            if ($item->imposto()->ICMS()->modBC() == 0) {
                $vBC_ICMS = $vBC_ICMS * (100 + $tributacaoICMS->PercMVAProprio()) / 100;
            }
        } elseif ($item->imposto()->ICMS()->modBC() == 1 || $item->imposto()->ICMS()->modBC() == 2) {
            $vBC_ICMS = $tributacaoICMS->ValorBaseICMS();
        }
        
        //calcula a redução da base de calculo apenas para os casos
        //que possuem redução de base de calculo.
        if ($item->imposto()->ICMS()->CST() == '20'
            || $item->imposto()->ICMS()->CST() == '51'
            || $item->imposto()->ICMS()->CST() == '70'
            || $item->imposto()->ICMS()->CST() == '90'
            || $item->imposto()->ICMS()->CSOSN() == '900') {
            /* N14 */
            $item->imposto()->ICMS()->setPRedBC($tributacaoICMS->PercRedICMS());
            $vBC_ICMS_Red = round($vBC_ICMS * (100 - $item->imposto()->ICMS()->pRedBC()) / 100, 2);
            $item->imposto()->ICMS()->setVICMSFicto(round($vBC_ICMS_Red * $tributacaoICMS->AliquotaICMS() / 100, 2));
            
            if ($tributacaoICMS->DestacarICMSDes()) {
                $vICMSNorm = round($vBC_ICMS * $tributacaoICMS->AliquotaICMS() / 100, 2);
                /* N27a */
                $item->imposto()->ICMS()->setVICMSDeson($vICMSNorm - $item->imposto()->ICMS()->vICMSFicto());
                /* N27a */
                $item->imposto()->ICMS()->setMotDesICMS($tributacaoICMS->MotivoDesICMS());
            }
            $vBC_ICMS = $vBC_ICMS_Red;
        } else {
            $item->imposto()->ICMS()->setVICMSFicto(round($vBC_ICMS * $tributacaoICMS->AliquotaICMS() / 100, 2));
        }
        
        //destaca o ICMS apenas se estiver configurado para destacar o ICMS
        if ($tributacaoICMS->DestacarICMS() == 1) {
            /* N15 */
            $item->imposto()->ICMS()->setVBC(number_format($vBC_ICMS, 2, '.', ''));
            /* N17 */
            $item->imposto()->ICMS()->setVICMS(number_format($item->imposto()->ICMS()->vICMSFicto(), 2, '.', ''));
            /* N16 */
            $item->imposto()->ICMS()->setPICMS($tributacaoICMS->AliquotaICMS());
            //Partilha do ICMS - NT 2015 - 003 - v150
            $this->calcularPartilhaICMS($tributacaoICMS, $item);
        }
        
        if ($item->imposto()->ICMS()->CST() === '51') {
            $item->imposto()->ICMS()->setVBC(ceil($vBC_ICMS * 100) / 100);
            /* N16 */
            $item->imposto()->ICMS()->setPICMS($tributacaoICMS->AliquotaICMS());
            /* N16a */
            $item->imposto()->ICMS()->setVICMS(ceil($item->imposto()->ICMS()->vICMSFicto() * 100) / 100);
            /* N16b */
            $item->imposto()->ICMS()->setPDif($tributacaoICMS->PercDiferimento());
            /* N16c */
            $item->imposto()->ICMS()->setVICMSDif($item->imposto()->ICMS()->vICMSFicto() * (100
                                                                                            - $tributacaoICMS->PercDiferimento())
                                                  / 100);
            /* N17 */
            $item->imposto()->ICMS()->setVICMS($item->imposto()->ICMS()->vICMSFicto() - $item->imposto()
                                                                                             ->ICMS()
                                                                                             ->vICMSDif());
        }
        
        return $item;
    }
    
    
    /**
     * @param \MotorFiscal\Estadual\ParametrosTributacaoICMS $tributacaoICMS
     * @param \MotorFiscal\ItemFiscal                        $item
     *
     * @return \MotorFiscal\ItemFiscal
     * @throws \MotorFiscal\Exception
     */
    private function &calcularPartilhaICMS(ParametrosTributacaoICMS $tributacaoICMS, ItemFiscal $item)
    {
        
        
        /****************************************************************
         * Conforme  liminar concedida pelo ministro Dias Toffoli       *
         * em 17 / 02 / 2016 empresas do simples nacional               *
         * não estão obrigadas a realizar a partilha do ICMS            *
         * mas deverão preencher todos os campos na nota fiscal         *
         ****************************************************************/
        
        //se for operação interestadual para consumidor final e o emitente não for simples nacional
        if ($tributacaoICMS->DestacarICMS() == 1
            && $this->emit()->UF() != $this->dest()->UF()
            && $this->ide()->indFinal() == 1) {
            
            $item->imposto()->setICMSUFDest(ICMSUFDest::createfrom($item, $tributacaoICMS));
        }
        
        return $item;
    }
    
    
    /**
     * @return \MotorFiscal\Destinatario
     */
    public function dest()
    {
        return $this->dest;
    }
    
    
    /**
     * @param \MotorFiscal\Destinatario $dest
     *
     * @return DocumentoFiscal
     */
    public function setDest($dest)
    {
        $this->dest = $dest;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\IdentificacaoNFe
     */
    public function ide()
    {
        return $this->ide;
    }
    
    
    private function &calcularTributacaoServicos(ItemFiscal $item)
    {
        if ($item->prod()->tipoItem() === Produto::SERVICO) {
            $tributacaoISSQN = $this->getTribISSQN($item->prod(), $item->Operacao());
            
            $item->imposto()->setISSQN(ISSQN::createfrom($item, $tributacaoISSQN, $this->emit()));
        }
        
        return $item;
    }
    
    
    private function getTribISSQN(Produto $produto, Operacao $operacao)
    {
        $callback = $this->buscaTribFunctionISSQN;
        if ($this->tipoParametroPesquisa === self::IDENTIFICADOR) {
            $tributacaoISSQN = $callback($produto->identificador(), $operacao->identificador(),
                $this->emit()->identificador(), $this->dest->identificador());
        } else {
            $tributacaoISSQN = $callback($produto, $operacao, $this->emit, $this->dest);
        }
        
        return $tributacaoISSQN;
    }
    
    
    private function &calcularTributacaoFinal(ItemFiscal $item)
    {
        /* ================= Calcula Percentual Tributacao ============================== */
        
        $tabelaIBPT = $this->getTabelaIBPT($item->prod());
        if ($tabelaIBPT) {
            $item->imposto()->setVTotTribFederal(number_format(($item->prod()->vProd() - $item->prod()->vDesc())
                                                               * $tabelaIBPT->PercTribFed / 100, 2, '.', ''));
            $item->imposto()->setVTotTribEstadual(number_format(($item->prod()->vProd() - $item->prod()->vDesc())
                                                                * $tabelaIBPT->PercTribEst / 100, 2, '.', ''));
            $item->imposto()->setVTotTribMunicipal(number_format(($item->prod()->vProd() - $item->prod()->vDesc())
                                                                 * $tabelaIBPT->PercTribMun / 100, 2, '.', ''));
            /* M02 */
            $item->imposto()->setVTotTrib(number_format($item->imposto()->vTotTribFederal() + $item->imposto()
                                                                                                   ->vTotTribEstadual()
                                                        + $item->imposto()->vTotTribMunicipal(), 2, '.', ''));
        }
        
        return $item;
    }
    
    
    private function getTabelaIBPT(Produto $produto)
    {
        if (!isset($this->buscaTribFunctionIBPT)) {
            return false;
        }
        
        $callback = $this->buscaTribFunctionIBPT;
        
        if ($this->tipoParametroPesquisa === self::IDENTIFICADOR) {
            $tabelaIBPT = $callback($produto->identificador(), $this->emit()->identificador(),
                $this->dest->identificador());
        } else {
            $tabelaIBPT = $callback($produto, $this->emit, $this->dest);
        }
        
        return $tabelaIBPT;
    }
    
    
    /**
     * @return \MotorFiscal\ItemFiscal[]
     */
    public function &itens()
    {
        return $this->itens;
    }
    
    
    /**
     *
     */
    public function totalizarDocumento()
    {
        $this->ICMSTot  = ICMSTot::createForDocument($this);
        $this->retTrib  = RetTrib::createForDocumento($this);
        $this->ISSQNtot = ISSQNtot::createForDocumento($this);
        $this->ajustarRetencaoServ();
    }
    
    
    /**
     *
     */
    public function ajustarRetencaoServ()
    {
        foreach ($this->itens as $key => $item) {
            if ($item->prod()->tipoItem() === Produto::SERVICO) {
                $vOutro = 0;
                if ($this->retTrib()) {
                    if ($this->retTrib()->vContribuicoes() > 0) {
                        $vOutro += $item->imposto()->ISSQN()->vRetPIS() + $item->imposto()->ISSQN()->vRetCOFINS()
                                   + $item->imposto()->ISSQN()->vRetCSLL();
                    }
                    
                    if ($this->retTrib()->vIRRF() > 0) {
                        $vOutro += $item->imposto()->ISSQN()->vRetIR();
                    }
                    
                    if ($this->retTrib()->vBCRetPrev() > 0) {
                        $vOutro += $item->imposto()->ISSQN()->vRetINSS();
                    }
                }
                $this->itens[$key]->imposto()->ISSQN()->setVOutro($vOutro);
            }
        }
    }
    
    
    /**
     * @return \MotorFiscal\Federal\RetTrib
     */
    public function retTrib()
    {
        return $this->retTrib;
    }
}
