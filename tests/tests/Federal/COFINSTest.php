<?php

use MotorFiscal\Destinatario;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Emitente;
use MotorFiscal\Federal\COFINS;
use MotorFiscal\ItemFiscal;
use MotorFiscal\Operacao;
use MotorFiscal\Produto;
use PHPUnit\Framework\TestCase;

class COFINSTest extends TestCase
{
    /**
     * @var \MotorFiscal\DocumentoFiscal|\PHPUnit\Framework\MockObject\MockObject
     */
    private $documento;
    
    /**
     * @var \MotorFiscal\Produto | PHPUnit\Framework\MockObject
     */
    private $produto;
    
    /**
     * @var \MotorFiscal\ItemFiscal | \PHPUnit\Framework\MockObject\MockObject
     */
    private $item;
    
    /**
     * @var \MotorFiscal\Operacao | \PHPUnit\Framework\MockObject\MockObject
     */
    private $operacao;
    
    
    public function setUp()
    {
        $this->documento = $this->createMock(DocumentoFiscal::class);
        $this->produto   = $this->createMock(Produto::class);
        $this->item      = $this->createMock(ItemFiscal::class);
        $this->operacao  = $this->createMock(Operacao::class);
    }
    
    
    public function testCST01()
    {
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config                 = new stdClass();
            $config->CST            = '01';
            $config->AliquotaCofins = 7.6;
            $config->qTrib          = 0;
            $config->ValorCOFINS    = 0;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($cofins->CST(), '01');
        $this->assertEquals($cofins->pCOFINS(), 7.6);
        $this->assertEquals($cofins->vBC(), 1000);
        $this->assertEquals($cofins->vCOFINS(), 76);
    }
    
    
    public function testCST02()
    {
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config                 = new stdClass();
            $config->CST            = '02';
            $config->AliquotaCofins = 7.6;
            $config->qTrib          = 0;
            $config->ValorCOFINS    = 0;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($cofins->CST(), '02');
        $this->assertEquals($cofins->pCOFINS(), 7.6);
        $this->assertEquals($cofins->vBC(), 1000);
        $this->assertEquals($cofins->vCOFINS(), 76);
    }
    
    
    public function testCST03()
    {
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config                 = new stdClass();
            $config->CST            = '03';
            $config->AliquotaCofins = 7.6;
            $config->qTrib          = 0;
            $config->ValorCOFINS    = 100;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->produto->method('qTrib')->willReturn(2);
        $this->item->method('prod')->willReturn($this->produto);
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals('03', $cofins->CST());
        $this->assertEquals(null, $cofins->pCOFINS());
        $this->assertEquals(null, $cofins->vBC());
        $this->assertEquals(200, $cofins->vCOFINS());
        $this->assertEquals(2, $cofins->qBCProd());
        $this->assertEquals(100, $cofins->vAliqProd());
    }
    
    
    public function testCST04()
    {
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config      = new stdClass();
            $config->CST = '04';
            
            return $config;
        });
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($cofins->CST(), '04');
    }
    
    
    public function testCST05()
    {
        $this->noCofinsValueTest('05');
    }
    
    
    private function noCofinsValueTest($cst)
    {
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function ($prod, $oper, $emit, $dest) use ($cst
        ) {
            $config      = new stdClass();
            $config->CST = $cst;
            
            return $config;
        });
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($cofins->CST(), $cst);
        $this->assertEquals(null, $cofins->pCOFINS());
        $this->assertEquals(null, $cofins->vBC());
        $this->assertEquals(null, $cofins->vCOFINS());
        $this->assertEquals(null, $cofins->qBCProd());
        $this->assertEquals(null, $cofins->vAliqProd());
    }
    
    
    public function testCST06()
    {
        $this->noCofinsValueTest('06');
    }
    
    
    public function testCST07()
    {
        $this->noCofinsValueTest('07');
    }
    
    
    public function testCST08()
    {
        $this->noCofinsValueTest('08');
    }
    
    
    public function testCST09()
    {
        $this->noCofinsValueTest('09');
    }
    
    
    public function testCST99Quantidade()
    {
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config                          = new stdClass();
            $config->CST                     = '99';
            $config->AliquotaCofins          = 7.6;
            $config->qTrib                   = 0;
            $config->ValorCOFINS             = 100;
            $config->TipoTributacaoPISCOFINS = 1;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->produto->method('qTrib')->willReturn(2);
        $this->item->method('prod')->willReturn($this->produto);
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals('99', $cofins->CST());
        $this->assertEquals(null, $cofins->pCOFINS());
        $this->assertEquals(null, $cofins->vBC());
        $this->assertEquals(200, $cofins->vCOFINS());
        $this->assertEquals(2, $cofins->qBCProd());
        $this->assertEquals(100, $cofins->vAliqProd());
    }
    
    
    public function testCST99Percentual()
    {
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config                          = new stdClass();
            $config->CST                     = '99';
            $config->AliquotaCofins          = 7.6;
            $config->qTrib                   = 0;
            $config->ValorCOFINS             = 0;
            $config->TipoTributacaoPISCOFINS = 0;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($cofins->CST(), '99');
        $this->assertEquals($cofins->pCOFINS(), 7.6);
        $this->assertEquals($cofins->vBC(), 1000);
        $this->assertEquals($cofins->vCOFINS(), 76);
    }
    
    
    public function testUnitializedCallback()
    {
        
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $this->item->method('Operacao')->willReturn($this->operacao);
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('buscaTribFunctionCOFINS nao inicializada');
        $cofins = COFINS::createFromItemAndDocumento($this->documento, $this->item);
    }
    
    
    public function testCallbackIdentificador()
    {
        $dest = $this->createMock(Destinatario::class);
        $emit = $this->createMock(Emitente::class);
        $this->item->method('prod')->willReturn($this->produto);
        $this->item->method('Operacao')->willReturn($this->operacao);
        $this->documento->method('dest')->willReturn($dest);
        $this->documento->method('emit')->willReturn($emit);
        
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function (
            Produto $prod,
            Operacao $oper,
            Emitente $emite,
            Destinatario $desti
        ) use ($dest, $emit) {
            $this->assertEquals($prod, $this->produto);
            $this->assertEquals($oper, $this->operacao);
            $this->assertEquals($desti, $dest);
            $this->assertEquals($emite, $emit);
            
            $config      = new stdClass();
            $config->CST = '04';
            
            return $config;
        });
        
        COFINS::createFromItemAndDocumento($this->documento, $this->item);
    }
    
    
    public function testCallbackElementos()
    {
        $dest = $this->createMock(Destinatario::class);
        $dest->method('identificador')->willReturn('1');
        $this->documento->method('dest')->willReturn($dest);
        
        $emit = $this->createMock(Emitente::class);
        $emit->method('identificador')->willReturn('1');
        $this->documento->method('emit')->willReturn($emit);
        
        $this->item->method('prod')->willReturn($this->produto);
        $this->item->method('Operacao')->willReturn($this->operacao);
        
        $this->produto->method('identificador')->willReturn('1');
        $this->operacao->method('identificador')->willReturn('1');
        
        $this->documento->method('tipoParametroPesquisa')->willReturn(DocumentoFiscal::IDENTIFICADOR);
        
        $this->documento->method('buscaTribFunctionCOFINS')->willReturn(function (
            string $prod,
            string $oper,
            string $emite,
            string $desti
        ) use ($dest, $emit) {
            $this->assertEquals($prod, '1');
            $this->assertEquals($oper, '1');
            $this->assertEquals($desti, '1');
            $this->assertEquals($emite, '1');
            
            $config      = new stdClass();
            $config->CST = '04';
            
            return $config;
        });
        
        COFINS::createFromItemAndDocumento($this->documento, $this->item);
    }
}