<?php

use MotorFiscal\Destinatario;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Emitente;
use MotorFiscal\Federal\PIS;
use MotorFiscal\ItemFiscal;
use MotorFiscal\Operacao;
use MotorFiscal\Produto;
use PHPUnit\Framework\TestCase;

class PISTest extends TestCase
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
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config              = new stdClass();
            $config->CST         = '01';
            $config->AliquotaPis = 7.6;
            $config->qTrib       = 0;
            $config->ValorPIS    = 0;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($pis->CST(), '01');
        $this->assertEquals($pis->pPIS(), 7.6);
        $this->assertEquals($pis->vBC(), 1000);
        $this->assertEquals($pis->vPIS(), 76);
    }
    
    
    public function testCST02()
    {
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config              = new stdClass();
            $config->CST         = '02';
            $config->AliquotaPis = 7.6;
            $config->qTrib       = 0;
            $config->ValorPIS    = 0;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($pis->CST(), '02');
        $this->assertEquals($pis->pPIS(), 7.6);
        $this->assertEquals($pis->vBC(), 1000);
        $this->assertEquals($pis->vPIS(), 76);
    }
    
    
    public function testCST03()
    {
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config              = new stdClass();
            $config->CST         = '03';
            $config->AliquotaPis = 7.6;
            $config->qTrib       = 0;
            $config->ValorPIS    = 100;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->produto->method('qTrib')->willReturn(2);
        $this->item->method('prod')->willReturn($this->produto);
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals('03', $pis->CST());
        $this->assertEquals(null, $pis->pPIS());
        $this->assertEquals(null, $pis->vBC());
        $this->assertEquals(200, $pis->vPIS());
        $this->assertEquals(2, $pis->qBCProd());
        $this->assertEquals(100, $pis->vAliqProd());
    }
    
    
    public function testCST04()
    {
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config      = new stdClass();
            $config->CST = '04';
            
            return $config;
        });
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($pis->CST(), '04');
    }
    
    
    public function testCST05()
    {
        $this->noPisValueTest('05');
    }
    
    
    private function noPisValueTest($cst)
    {
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function ($prod, $oper, $emit, $dest) use ($cst) {
            $config      = new stdClass();
            $config->CST = $cst;
            
            return $config;
        });
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($pis->CST(), $cst);
        $this->assertEquals(null, $pis->pPIS());
        $this->assertEquals(null, $pis->vBC());
        $this->assertEquals(null, $pis->vPIS());
        $this->assertEquals(null, $pis->qBCProd());
        $this->assertEquals(null, $pis->vAliqProd());
    }
    
    
    public function testCST06()
    {
        $this->noPisValueTest('06');
    }
    
    
    public function testCST07()
    {
        $this->noPisValueTest('07');
    }
    
    
    public function testCST08()
    {
        $this->noPisValueTest('08');
    }
    
    
    public function testCST09()
    {
        $this->noPisValueTest('09');
    }
    
    
    public function testCST99Quantidade()
    {
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config                          = new stdClass();
            $config->CST                     = '99';
            $config->AliquotaPis             = 7.6;
            $config->qTrib                   = 0;
            $config->ValorPIS                = 100;
            $config->TipoTributacaoPISCOFINS = 1;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->produto->method('qTrib')->willReturn(2);
        $this->item->method('prod')->willReturn($this->produto);
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals('99', $pis->CST());
        $this->assertEquals(null, $pis->pPIS());
        $this->assertEquals(null, $pis->vBC());
        $this->assertEquals(200, $pis->vPIS());
        $this->assertEquals(2, $pis->qBCProd());
        $this->assertEquals(100, $pis->vAliqProd());
    }
    
    
    public function testCST99Percentual()
    {
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function ($prod, $oper, $emit, $dest) {
            $config                          = new stdClass();
            $config->CST                     = '99';
            $config->AliquotaPis             = 7.6;
            $config->qTrib                   = 0;
            $config->ValorPIS                = 0;
            $config->TipoTributacaoPISCOFINS = 0;
            
            return $config;
        });
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
        $this->assertEquals($pis->CST(), '99');
        $this->assertEquals($pis->pPIS(), 7.6);
        $this->assertEquals($pis->vBC(), 1000);
        $this->assertEquals($pis->vPIS(), 76);
    }
    
    
    public function testUnitializedCallback()
    {
        
        $this->produto->method('vProd')->willReturn(1000);
        $this->item->method('prod')->willReturn($this->produto);
        $this->item->method('Operacao')->willReturn($this->operacao);
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('buscaTribFunctionPIS nao inicializada');
        $pis = PIS::createFromItemAndDocumento($this->documento, $this->item);
    }
    
    
    public function testCallbackIdentificador()
    {
        $dest = $this->createMock(Destinatario::class);
        $emit = $this->createMock(Emitente::class);
        $this->item->method('prod')->willReturn($this->produto);
        $this->item->method('Operacao')->willReturn($this->operacao);
        $this->documento->method('dest')->willReturn($dest);
        $this->documento->method('emit')->willReturn($emit);
        
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function (
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
        
        PIS::createFromItemAndDocumento($this->documento, $this->item);
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
        
        $this->documento->method('buscaTribFunctionPIS')->willReturn(function (
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
        
        PIS::createFromItemAndDocumento($this->documento, $this->item);
    }
}