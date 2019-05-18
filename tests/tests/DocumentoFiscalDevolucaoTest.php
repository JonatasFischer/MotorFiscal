<?php

use MotorFiscal\Destinatario;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Emitente;
use MotorFiscal\Operacao;
use MotorFiscal\Produto;
use PHPUnit\Framework\TestCase;

class DocumentoFiscalDevolucaoTest extends TestCase
{
    /**
     * @var \MotorFiscal\DocumentoFiscal
     */
    protected $NF;
    
    /**
     * @var ICMS
     */
    protected $object;
    
    
    public function testCSOSN101IPI_ICMSSTND()
    {
        $prod = new Produto();
        $prod->setIdentificador(1);
        $prod->setTipoTributacaoIPI(0);
        $prod->setFormaAquisicao(1);
        $prod->setVProd(100);
        $prod->setVDesc(10);
        $prod->setVFrete(10);
        $prod->setVOutro(10);
        $prod->setVSeg(10);
        
        $item = &$this->NF->addItem($prod);
    
        $this->NF->totalizarDocumento();
        $this->assertEquals(null, $item->imposto()->ICMS()->CST(), 'CST');
        $this->assertEquals(101, $item->imposto()->ICMS()->CSOSN(), 'CSOSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->modBC(), 'modBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBC(), 'pRedBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBC(), 'vBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBC_Desonerado(), 'vBC_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMS(), 'pICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMS_Desonerado(), 'pICMS_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pDif(), 'pDif');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDif(), 'vICMSDif');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMS(), 'vICMS');
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
        $this->assertEquals(5, $item->imposto()->ICMS()->pCredSN(), 'pCredSN');
        $this->assertEquals(6.0, $item->imposto()->ICMS()->vCredICMSSN(), 'vCredICMSSN');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTDest(), 'vBCSTDest');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSSTDest(), 'vICMSSTDest');
        $this->assertEquals(1, $item->nItem(), 'N�mero do Item');
    }
    
    
    public function testCSOSN900IPI()
    {
        $prod = new Produto();
        $prod->setIdentificador(3);
        $prod->setTipoTributacaoIPI(Produto::PRODUTO);
        $prod->setFormaAquisicao(1); //Adiquirida de Terceiros
        $prod->setVProd(100);
        $prod->setVDesc(0);
        $prod->setVFrete(0);
        $prod->setVOutro(0);
        $prod->setVSeg(0);
        
        $item = &$this->NF->addItem($prod);
        $this->NF->totalizarDocumento();
        $this->assertEquals(null, $item->imposto()->ICMS()->CST(), 'CST');
        $this->assertEquals(900, $item->imposto()->ICMS()->CSOSN(), 'CSOSN');
        $this->assertEquals(3, $item->imposto()->ICMS()->modBC(), 'modBC');
        $this->assertEquals(50, $item->imposto()->ICMS()->pRedBC(), 'pRedBC');
        $this->assertEquals(50, $item->imposto()->ICMS()->vBC(), 'vBC');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBC_Desonerado(), 'vBC_Desonerado');
        $this->assertEquals(12, $item->imposto()->ICMS()->pICMS(), 'pICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMS_Desonerado(), 'pICMS_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pDif(), 'pDif');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDif(), 'vICMSDif');
        $this->assertEquals(6, $item->imposto()->ICMS()->vICMS(), 'vICMS');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSDesonerado(), 'vICMS_Desonerado');
        $this->assertEquals(null, $item->imposto()->ICMS()->modBCST(), 'modBCST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pMVAST(), 'pMVAST');
        $this->assertEquals(null, $item->imposto()->ICMS()->pRedBCST(), 'pRedBCST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCST(), 'vBCST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vBCSTNaoDestacado(), 'vBCST_NaoDestacado');
        $this->assertEquals(null, $item->imposto()->ICMS()->pICMSST(), 'pICMSST');
        $this->assertEquals(null, $item->imposto()->ICMS()->vICMSST(), 'vICMSST');
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
        $this->assertEquals(1, $item->nItem(), 'Número do Item');
    }
    
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $emitente = new Emitente();
        $emitente->setIdentificador(1);
        $emitente->setCRT(1);
        $emitente->setContribuinteIPI(1);
        $emitente->setPercCreditoSimples(5);
        $destinatario = new Destinatario();
        $destinatario->setIdentificador(1);
        $operacao = new Operacao();
        $operacao->setIdentificador(1);
        $operacao->setCFOPMercadoria(1202);
        $operacao->setCFOPMercadoriaST(1202);
        $operacao->setCFOPMercadoriaSTSubstituido(1202);
        $operacao->setCFOPProduto(1202);
        $operacao->setCFOPProdutoST(1202);
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
    }
}
