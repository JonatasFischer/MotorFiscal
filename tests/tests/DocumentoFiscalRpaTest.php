<?php

use MotorFiscal\Destinatario;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Emitente;
use MotorFiscal\Operacao;
use MotorFiscal\Produto;
use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-12 at 13:57:15.
 */
class DocumentoFiscalRpaTest extends TestCase
{
    /**
     * @var \MotorFiscal\DocumentoFiscal
     */
    protected $NF;
    
    /**
     * @var ICMS
     */
    protected $object;
    
    
    public function testCST00IPI_ICMSSTND()
    {
        $prod = new Produto();
        $prod->setIdentificador(1);
        $prod->setTipoTributacaoIPI(0);
        $prod->setFormaAquisicao(1); //Adiquirida de Terceiros
        $prod->setVProd(100);
        $prod->setVDesc(10);
        $prod->setVFrete(10);
        $prod->setVOutro(10);
        $prod->setVSeg(10);
        $item = &$this->NF->addItem($prod);
        $this->NF->totalizarDocumento();
        $this->assertEquals('00', $item->imposto()->ICMS()->CST(), 'CST');
        $this->assertEquals(null, $item->imposto()->ICMS()->CSOSN(), 'CSOSN');
        $this->assertEquals(3, $item->imposto()->ICMS()->modBC(), 'modBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBC(), 'pRedBC');
        $this->assertEquals(120, $item->imposto()->ICMS()->vBC(), 'vBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBC_Desonerado(), 'vBC_Desonerado');
        $this->assertEquals(12, $item->imposto()->ICMS()->pICMS(), 'pICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMS_Desonerado(), 'pICMS_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pDif(), 'pDif');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDif(), 'vICMSDif');
        $this->assertEquals('14.40', $item->imposto()->ICMS()->vICMS(), 'vICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDesonerado(), 'vICMS_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->modBCST(), 'modBCST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pMVAST(), 'pMVAST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBCST(), 'pRedBCST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCST(), 'vBCST');
        $this->assertEquals(258, $item->imposto()->ICMS()->vBCSTNaoDestacado(), 'vBCST_NaoDestacado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMSST(), 'pICMSST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSST(), 'vICMSST');
        $this->assertEquals('29.46', $item->imposto()->ICMS()->vICMSSTNaoDestacado(), 'vICMSSTNaoDestacado');
        $this->assertEquals(null, $item->imposto()->ICMS()->UFST(), 'UFST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pBCOp(), 'pBCOp');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTRet(), 'vBCSTRet');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTRet(), 'vICMSSTRet');
        $this->assertEquals(null, $item->imposto()->ICMS()->UFST(), 'UFST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDeson(), 'vICMSDeson');
        $this->assertEquals(null, $item->imposto()->ICMS()->motDesICMS(), 'motDesICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pCredSN(), 'pCredSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->vCredICMSSN(), 'vCredICMSSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTDest(), 'vBCSTDest');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTDest(), 'vICMSSTDest');
        $this->assertEquals('1.49', $item->imposto()->PIS()->vPIS(), 'vPIS');
        $this->assertEquals('01', $item->imposto()->PIS()->CST(), 'CST');
        $this->assertEquals('18.00', $item->imposto()->vTotTrib(), 'vTotTrib');
        $this->assertEquals('1.65', $item->imposto()->PIS()->pPIS(), 'pPIS');
        $this->assertEquals(999, $item->imposto()->IPI()->clEnq(), 'clEnq');
        $this->assertEquals(999, $item->imposto()->IPI()->CNPJProd(), 'CNPJProd');
        $this->assertEquals(999, $item->imposto()->IPI()->cSelo(), 'cSelo');
        $this->assertEquals(999, $item->imposto()->IPI()->qSelo(), 'qSelo');
        $this->assertEquals(999, $item->imposto()->IPI()->cEnq(), 'cEnq');
        $this->assertEquals(null, $item->imposto()->ISSQN(), 'ISSQN Nulo');
    
        $this->assertEquals(1, $item->nItem(), 'N�mero do Item');
    }
    
    
    public function testCST10IPIAliquotaZero_ICMSSTD()
    {
        $prod = new Produto();
        $prod->setIdentificador(2);
        $prod->setTipoTributacaoIPI(0);
        $prod->setFormaAquisicao(1); //Adiquirida de Terceiros
        $prod->setVProd(100);
        $prod->setVDesc(0);
        $prod->setVFrete(0);
        $prod->setVOutro(0);
        $prod->setVSeg(0);
        $item = &$this->NF->addItem($prod);
        $this->NF->totalizarDocumento();
        $this->assertEquals('10', $item->imposto()->ICMS()->CST(), 'CST');
        $this->assertEquals(null, $item->imposto()->ICMS()->CSOSN(), 'CSOSN');
        $this->assertEquals(3, $item->imposto()->ICMS()->modBC(), 'modBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBC(), 'pRedBC');
        $this->assertEquals(100, $item->imposto()->ICMS()->vBC(), 'vBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBC_Desonerado(), 'vBC_Desonerado');
        $this->assertEquals(12, $item->imposto()->ICMS()->pICMS(), 'pICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMS_Desonerado(), 'pICMS_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pDif(), 'pDif');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDif(), 'vICMSDif');
        $this->assertEquals('12.00', $item->imposto()->ICMS()->vICMS(), 'vICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDesonerado(), 'vICMS_Desonerado');
        $this->assertEquals(4, $item->imposto()->ICMS()->modBCST(), 'modBCST');
        $this->assertEquals(100, $item->imposto()->ICMS()->pMVAST(), 'pMVAST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBCST(), 'pRedBCST');
        $this->assertEquals(200, $item->imposto()->ICMS()->vBCST(), 'vBCST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTNaoDestacado(), 'vBCST_NaoDestacado');
        $this->assertEquals(17, $item->imposto()->ICMS()->pICMSST(), 'pICMSST');
        $this->assertEquals(22, $item->imposto()->ICMS()->vICMSST(), 'vICMSST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTNaoDestacado(), 'vICMSSTNaoDestacado');
        $this->assertEquals(null, $item->imposto()->ICMS()->UFST(), 'UFST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pBCOp(), 'pBCOp');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTRet(), 'vBCSTRet');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTRet(), 'vICMSSTRet');
        $this->assertEquals(null, $item->imposto()->ICMS()->UFST(), 'UFST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDeson(), 'vICMSDeson');
        $this->assertEquals(null, $item->imposto()->ICMS()->motDesICMS(), 'motDesICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pCredSN(), 'pCredSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->vCredICMSSN(), 'vCredICMSSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTDest(), 'vBCSTDest');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTDest(), 'vICMSSTDest');
        $this->assertEquals('1.65', $item->imposto()->PIS()->vPIS(), 'vPIS');
        $this->assertEquals('01', $item->imposto()->PIS()->CST(), 'CST');
        $this->assertEquals('20.00', $item->imposto()->vTotTrib(), 'vTotTrib');
        $this->assertEquals('1.65', $item->imposto()->PIS()->pPIS(), 'pPIS');
        $this->assertEquals(999, $item->imposto()->IPI()->clEnq(), 'clEnq');
        $this->assertEquals(999, $item->imposto()->IPI()->CNPJProd(), 'CNPJProd');
        $this->assertEquals(999, $item->imposto()->IPI()->cSelo(), 'cSelo');
        $this->assertEquals(999, $item->imposto()->IPI()->qSelo(), 'qSelo');
        $this->assertEquals(999, $item->imposto()->IPI()->cEnq(), 'cEnq');
        $this->assertEquals(null, $item->imposto()->ISSQN(), 'ISSQN Nulo');
    
        $this->assertEquals(1, $item->nItem(), 'N�mero do Item');
    }
    
    
    public function testCST10IPINaoContribuinte_ICMSSTD()
    {
        $prod = new Produto();
        $prod->setIdentificador(2);
        $prod->setTipoTributacaoIPI(0);
        $prod->setFormaAquisicao(1); //Adiquirida de Terceiros
        $prod->setVProd(100);
        $prod->setVDesc(0);
        $prod->setVFrete(0);
        $prod->setVOutro(0);
        $prod->setVSeg(0);
        
        $item = &$this->NF->addItem($prod);
        $this->NF->totalizarDocumento();
        $this->assertEquals('10', $item->imposto()->ICMS()->CST(), 'CST');
        $this->assertEquals(null, $item->imposto()->ICMS()->CSOSN(), 'CSOSN');
        $this->assertEquals(3, $item->imposto()->ICMS()->modBC(), 'modBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBC(), 'pRedBC');
        $this->assertEquals(100, $item->imposto()->ICMS()->vBC(), 'vBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBC_Desonerado(), 'vBC_Desonerado');
        $this->assertEquals(12, $item->imposto()->ICMS()->pICMS(), 'pICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMS_Desonerado(), 'pICMS_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pDif(), 'pDif');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDif(), 'vICMSDif');
        $this->assertEquals('12.00', $item->imposto()->ICMS()->vICMS(), 'vICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDesonerado(), 'vICMS_Desonerado');
        $this->assertEquals(4, $item->imposto()->ICMS()->modBCST(), 'modBCST');
        $this->assertEquals(100, $item->imposto()->ICMS()->pMVAST(), 'pMVAST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBCST(), 'pRedBCST');
        $this->assertEquals(200, $item->imposto()->ICMS()->vBCST(), 'vBCST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTNaoDestacado(), 'vBCST_NaoDestacado');
        $this->assertEquals(17, $item->imposto()->ICMS()->pICMSST(), 'pICMSST');
        $this->assertEquals(22, $item->imposto()->ICMS()->vICMSST(), 'vICMSST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTNaoDestacado(), 'vICMSSTNaoDestacado');
        $this->assertEquals(null, $item->imposto()->ICMS()->UFST(), 'UFST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pBCOp(), 'pBCOp');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTRet(), 'vBCSTRet');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTRet(), 'vICMSSTRet');
        $this->assertEquals(null, $item->imposto()->ICMS()->UFST(), 'UFST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDeson(), 'vICMSDeson');
        $this->assertEquals(null, $item->imposto()->ICMS()->motDesICMS(), 'motDesICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pCredSN(), 'pCredSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->vCredICMSSN(), 'vCredICMSSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTDest(), 'vBCSTDest');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTDest(), 'vICMSSTDest');
        $this->assertEquals('1.65', $item->imposto()->PIS()->vPIS(), 'vPIS');
        $this->assertEquals('01', $item->imposto()->PIS()->CST(), 'CST');
        $this->assertEquals('20.00', $item->imposto()->vTotTrib(), 'vTotTrib');
        $this->assertEquals('1.65', $item->imposto()->PIS()->pPIS(), 'pPIS');
        $this->assertEquals(999, $item->imposto()->IPI()->clEnq(), 'clEnq');
        $this->assertEquals(999, $item->imposto()->IPI()->CNPJProd(), 'CNPJProd');
        $this->assertEquals(999, $item->imposto()->IPI()->cSelo(), 'cSelo');
        $this->assertEquals(999, $item->imposto()->IPI()->qSelo(), 'qSelo');
        $this->assertEquals(999, $item->imposto()->IPI()->cEnq(), 'cEnq');
        $this->assertEquals(null, $item->imposto()->ISSQN(), 'ISSQN Nulo');
    
        $this->assertEquals(1, $item->nItem(), 'N�mero do Item');
    }
    
    
    public function testNFSe()
    {
        $prod = new Produto();
        $prod->setIdentificador(1);
        $prod->setTipoTributacaoIPI(0);
        $prod->setVProd(10000);
        $prod->setTipoItem(1); //item de servi�o
        $prod->setCMunFG('9999999'); //item de servi�o
        $prod->setCMun(111111); //item de servi�o
        $prod->setCListServ(1); //item de servi�o
        $prod->setCServico(1); //item de servi�o
        $prod->setIndISS('2'); //item de servi�o
        $prod->setNProcesso(99999999); //item de servi�o
        $prod->setCPais(99999999); //item de servi�o
        $prod->setIndIncentivo(1); //item de servi�o
        
        $item = &$this->NF->addItem($prod);
        $this->NF->totalizarDocumento();
        $this->assertEquals(null, $item->imposto()->ICMS(), 'ICMS Nulo');
        $this->assertEquals(null, $item->imposto()->IPI(), 'IPI Nulo');
        $this->assertEquals(10000, $item->imposto()->ISSQN()->vBC(), 'Base de Calculo');
        $this->assertEquals(15, $item->imposto()->ISSQN()->vAliq(), 'Aliquota ISSQN');
        $this->assertEquals(1500, $item->imposto()->ISSQN()->vISSQN(), 'Valor ISSQN');
        $this->assertEquals(1500, $item->imposto()->ISSQN()->vISSQN(), 'Valor ISSQN');
        $this->assertNotEquals(null, $item->imposto()->ISSQN(), 'ISSQN Nulo');
        $this->assertEquals(65, $item->imposto()->ISSQN()->vRetPIS(), 'Reten��o de PIS');
        $this->assertEquals(300, $item->imposto()->ISSQN()->vRetCOFINS(), 'Reten��o de COFINS');
        $this->assertEquals(150, $item->imposto()->ISSQN()->vRetIR(), 'Reten��o de IR');
        $this->assertEquals(100, $item->imposto()->ISSQN()->vRetCSLL(), 'Reten��o de CSLL');
        $this->assertEquals(1100, $item->imposto()->ISSQN()->vRetINSS(), 'Reten��o de INSS');
        $this->assertEquals(1715, $item->imposto()->ISSQN()->vOutro(), 'Outras reten��es');
        $this->assertEquals(1500, $item->imposto()->ISSQN()->vISSRet(), 'Reten��o de ISS');
        $this->assertEquals(10000, $this->NF->ISSQNtot()->vServ(), 'Total do vServ  do grupo ISSQNtot');
        $this->assertEquals(10000, $this->NF->ISSQNtot()->vBC(), 'Total do vBC  do grupo ISSQNtot');
        $this->assertEquals(1500, $this->NF->ISSQNtot()->vISS(), 'Total do vISS  do grupo ISSQNtot');
        $this->assertEquals(165, $this->NF->ISSQNtot()->vPIS(), 'Total do vPIS  do grupo ISSQNtot');
        $this->assertEquals(760, $this->NF->ISSQNtot()->vCOFINS(), 'Total do vCOFINS  do grupo ISSQNtot');
        $this->assertEquals(0, $this->NF->ISSQNtot()->vDeducao(), 'Total do vDeducao  do grupo ISSQNtot');
        $this->assertEquals(1715, $this->NF->ISSQNtot()->vOutro(), 'Total do vOutro  do grupo ISSQNtot');
        $this->assertEquals(0, $this->NF->ISSQNtot()->vDescIncond(), 'Total do vDescIncond  do grupo ISSQNtot');
        $this->assertEquals(0, $this->NF->ISSQNtot()->vDescCond(), 'Total do vDescCond  do grupo ISSQNtot');
        $this->assertEquals(65, $this->NF->retTrib()->vRetPIS(), 'Total do vRetPIS do grupo ISSQNtot');
        $this->assertEquals(300, $this->NF->retTrib()->vRetCOFINS(), 'Total do vRetCOFINS do grupo retTrib');
        $this->assertEquals(100, $this->NF->retTrib()->vRetCSLL(), 'Total do vRetCSLL do grupo retTrib');
        $this->assertEquals(10000, $this->NF->retTrib()->vBCIRRF(), 'Total do vBCIRRF do grupo retTrib');
        $this->assertEquals(150, $this->NF->retTrib()->vIRRF(), 'Total do vIRRF do grupo retTrib');
        $this->assertEquals(10000, $this->NF->retTrib()->vBCRetPrev(), 'Total do vBCRetPrev do grupo retTrib');
        $this->assertEquals(1100, $this->NF->retTrib()->vRetPrev(), 'Total do vRetPrev do grupo retTrib');
        $this->assertEquals(1, $item->nItem(), 'N�mero do Item');
        //$this->assertEquals(1, $this->NF->,"Valor da NF");
    }
    
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $emitente = new Emitente();
        $emitente->setIdentificador(1);
        $emitente->setContribuinteIPI(1);
        $emitente->setCRT(3);
        $emitente->setPercCreditoSimples(0);
        $destinatario = new Destinatario();
        $destinatario->setIdentificador(1);
        $operacao = new Operacao();
        $operacao->setIdentificador(1);
        $operacao->setCFOPMercadoria(5102);
        $operacao->setCFOPMercadoriaST(5102);
        $operacao->setCFOPMercadoriaSTSubstituido(5102);
        $operacao->setCFOPProduto(5409);
        $operacao->setCFOPProdutoST(5409);
        $operacao->setTipoOperacao(0); //=Entrada;;
        $operacao->setIdentificacao(1); //=Opera��o interna;;
        $operacao->setFinalidade(1);
        $operacao->setIndFinal(0);
        $operacao->setIndPres(0);
        $operacao->setNaturezaOperacao('Venda a consumidor final');
        $this->NF = new DocumentoFiscal($emitente, $destinatario, $operacao);
        $this->NF->setTipoParametroPesquisa(true);
    
        $this->NF->setBuscaTribFunctionICMS(function (
            Produto $produto,
            Operacao $operacao,
            Emitente $emitente,
            Destinatario $destinatario
        ) {
            return Trib::ICMS($produto->identificador(), $operacao->identificador(), $emitente->identificador(),
                $destinatario->identificador());
        });
        $this->NF->setBuscaTribFunctionIPI(function (
            Produto $produto,
            Operacao $operacao,
            Emitente $emitente,
            Destinatario $destinatario
        ) {
            return Trib::IPI($produto->identificador(), $operacao->identificador(), $emitente->identificador(),
                $destinatario->identificador());
        });
    
        $this->NF->setBuscaTribFunctionPIS(function (
            Produto $produto,
            Operacao $operacao,
            Emitente $emitente,
            Destinatario $destinatario
        ) {
            return Trib::PIS($produto->identificador(), $operacao->identificador(), $emitente->identificador(),
                $destinatario->identificador());
        });
    
        $this->NF->setBuscaTribFunctionCOFINS(function (
            Produto $produto,
            Operacao $operacao,
            Emitente $emitente,
            Destinatario $destinatario
        ) {
            return Trib::COFINS($produto->identificador(), $operacao->identificador(), $emitente->identificador(),
                $destinatario->identificador());
        });
    
        $this->NF->setBuscaTribFunctionIBPT(function (Produto $produto) {
            if ($produto->tipoItem() === 0) {
                $ret              = new stdClass();
                $ret->PercTribFed = 10;
                $ret->PercTribEst = 10;
                $ret->PercTribMun = 0;
            } else {
                $ret              = new stdClass();
                $ret->PercTribFed = 10;
                $ret->PercTribEst = 0;
                $ret->PercTribMun = 15;
    
                return $ret;
            }
        
            return $ret;
        });
    
        $this->NF->setBuscaTribFunctionISSQN(function ($produto) {
            $ret           = new stdClass();
            $ret->Aliquota = 15;
            //Reten��o de ISS
            $ret->ISSRetemPF       = true;
            $ret->ISSValorMinRetPF = 100;
            $ret->ISSRetemPJ       = true;
            $ret->ISSValorMinRetPJ = 1000;
            //Reten��o de IR
            $ret->IRRetem   = true;
            $ret->IRRetPerc = 1.5;
            //reten��o CSLL
            $ret->CSLLRetem   = true;
            $ret->CSLLRetPerc = 1;
            //reten��o INSS
            $ret->INSSRetem   = true;
            $ret->INSSRetPerc = 11;
            //reten��o COFINS/PIS
            $ret->PISCOFINSRetem = true;
            $ret->PISRetPerc     = 0.65;
            $ret->COFINSRetPerc  = 3;
            $ret->vMinRetImpFed  = 10;
            
            return $ret;
        });
    }
}
