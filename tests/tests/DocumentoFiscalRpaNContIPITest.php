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
class DocumentoFiscalRpaNContIPITest extends TestCase
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
		$prod                    = new Produto();
		$prod->identificador     = 1;
		$prod->TipoTributacaoIPI = 0;
		$prod->FormaAquisicao    = 1; //Adiquirida de Terceiros
		$prod->vProd             = 100;
		$prod->vDesc             = 10;
		$prod->vFrete            = 10;
		$prod->vOutro            = 10;
		$prod->vSeg              = 10;
		$this->NF->itens         = array();
		$item                    = &$this->NF->addItem($prod);
		$this->NF->totalizarDocumento();
		$this->assertEquals('00', $item->imposto->ICMS->CST, "CST");
		$this->assertEquals(null, $item->imposto->ICMS->CSOSN, "CSOSN");
		$this->assertEquals(3, $item->imposto->ICMS->modBC, "modBC");
		$this->assertEquals(null, $item->imposto->ICMS->pRedBC, "pRedBC");
		$this->assertEquals(120, $item->imposto->ICMS->vBC, "vBC");
		$this->assertEquals(null, $item->imposto->ICMS->vBC_Desonerado, "vBC_Desonerado");
		$this->assertEquals(12, $item->imposto->ICMS->pICMS, "pICMS");
		$this->assertEquals(null, $item->imposto->ICMS->pICMS_Desonerado, "pICMS_Desonerado");
		$this->assertEquals(null, $item->imposto->ICMS->pDif, "pDif");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSDif, "vICMSDif");
		$this->assertEquals('14.40', $item->imposto->ICMS->vICMS, "vICMS");
		$this->assertEquals(null, $item->imposto->ICMS->vICMS_Desonerado, "vICMS_Desonerado");
		$this->assertEquals(null, $item->imposto->ICMS->modBCST, "modBCST");
		$this->assertEquals(null, $item->imposto->ICMS->pMVAST, "pMVAST");
		$this->assertEquals(null, $item->imposto->ICMS->pRedBCST, "pRedBCST");
		$this->assertEquals(null, $item->imposto->ICMS->vBCST, "vBCST");
		$this->assertEquals('240.00', $item->imposto->ICMS->vBCST_NaoDestacado, "vBCST_NaoDestacado");
		$this->assertEquals(null, $item->imposto->ICMS->pICMSST, "pICMSST");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSST, "vICMSST");
		$this->assertEquals('26.40', $item->imposto->ICMS->vICMSST_NaoDestacado, "vICMSST_NaoDestacado");
		$this->assertEquals(null, $item->imposto->ICMS->UFST, "UFST");
		$this->assertEquals(null, $item->imposto->ICMS->pBCOp, "pBCOp");
		$this->assertEquals(null, $item->imposto->ICMS->vBCSTRet, "vBCSTRet");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSSTRet, "vICMSSTRet");
		$this->assertEquals(null, $item->imposto->ICMS->UFST, "UFST");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSDeson, "vICMSDeson");
		$this->assertEquals(null, $item->imposto->ICMS->motDesICMS, "motDesICMS");
		$this->assertEquals(null, $item->imposto->ICMS->pCredSN, "pCredSN");
		$this->assertEquals(null, $item->imposto->ICMS->vCredICMSSN, "vCredICMSSN");
		$this->assertEquals(null, $item->imposto->ICMS->vBCSTDest, "vBCSTDest");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSSTDest, "vICMSSTDest");
		$this->assertEquals("1.49", $item->imposto->PIS->vPIS, "vPIS");
		$this->assertEquals("01", $item->imposto->PIS->CST, "CST");
		$this->assertEquals("18.00", $item->imposto->vTotTrib, "vTotTrib");
		$this->assertEquals("1.65", $item->imposto->PIS->pPIS, "pPIS");
		$this->assertEquals(null, $item->imposto->IPI, "IPI Nulo");
		$this->assertEquals(null, $item->imposto->ISSQN, "ISSQN Nulo");
		
		$this->assertEquals(1, $item->nItem, "N�mero do Item");
	}
	
	
	public function testCST10IPIAliquotaZero_ICMSSTD()
	{
		$prod                    = new Produto();
		$prod->identificador     = 2;
		$prod->TipoTributacaoIPI = 0;
		$prod->FormaAquisicao    = 1; //Adiquirida de Terceiros
		$prod->vProd             = 100;
		$prod->vDesc             = 0;
		$prod->vFrete            = 0;
		$prod->vOutro            = 0;
		$prod->vSeg              = 0;
		$this->NF->itens         = array();
		$item                    = &$this->NF->addItem($prod);
		$this->NF->totalizarDocumento();
		$this->assertEquals('10', $item->imposto->ICMS->CST, "CST");
		$this->assertEquals(null, $item->imposto->ICMS->CSOSN, "CSOSN");
		$this->assertEquals(3, $item->imposto->ICMS->modBC, "modBC");
		$this->assertEquals(null, $item->imposto->ICMS->pRedBC, "pRedBC");
		$this->assertEquals(100, $item->imposto->ICMS->vBC, "vBC");
		$this->assertEquals(null, $item->imposto->ICMS->vBC_Desonerado, "vBC_Desonerado");
		$this->assertEquals(12, $item->imposto->ICMS->pICMS, "pICMS");
		$this->assertEquals(null, $item->imposto->ICMS->pICMS_Desonerado, "pICMS_Desonerado");
		$this->assertEquals(null, $item->imposto->ICMS->pDif, "pDif");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSDif, "vICMSDif");
		$this->assertEquals('12.00', $item->imposto->ICMS->vICMS, "vICMS");
		$this->assertEquals(null, $item->imposto->ICMS->vICMS_Desonerado, "vICMS_Desonerado");
		$this->assertEquals(4, $item->imposto->ICMS->modBCST, "modBCST");
		$this->assertEquals(100, $item->imposto->ICMS->pMVAST, "pMVAST");
		$this->assertEquals(null, $item->imposto->ICMS->pRedBCST, "pRedBCST");
		$this->assertEquals(200, $item->imposto->ICMS->vBCST, "vBCST");
		$this->assertEquals(null, $item->imposto->ICMS->vBCST_NaoDestacado, "vBCST_NaoDestacado");
		$this->assertEquals(17, $item->imposto->ICMS->pICMSST, "pICMSST");
		$this->assertEquals(22, $item->imposto->ICMS->vICMSST, "vICMSST");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSST_NaoDestacado, "vICMSST_NaoDestacado");
		$this->assertEquals(null, $item->imposto->ICMS->UFST, "UFST");
		$this->assertEquals(null, $item->imposto->ICMS->pBCOp, "pBCOp");
		$this->assertEquals(null, $item->imposto->ICMS->vBCSTRet, "vBCSTRet");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSSTRet, "vICMSSTRet");
		$this->assertEquals(null, $item->imposto->ICMS->UFST, "UFST");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSDeson, "vICMSDeson");
		$this->assertEquals(null, $item->imposto->ICMS->motDesICMS, "motDesICMS");
		$this->assertEquals(null, $item->imposto->ICMS->pCredSN, "pCredSN");
		$this->assertEquals(null, $item->imposto->ICMS->vCredICMSSN, "vCredICMSSN");
		$this->assertEquals(null, $item->imposto->ICMS->vBCSTDest, "vBCSTDest");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSSTDest, "vICMSSTDest");
		$this->assertEquals("1.65", $item->imposto->PIS->vPIS, "vPIS");
		$this->assertEquals("01", $item->imposto->PIS->CST, "CST");
		$this->assertEquals("20.00", $item->imposto->vTotTrib, "vTotTrib");
		$this->assertEquals("1.65", $item->imposto->PIS->pPIS, "pPIS");
		$this->assertEquals(null, $item->imposto->IPI, "IPI Nulo");
		$this->assertEquals(null, $item->imposto->ISSQN, "ISSQN Nulo");
		
		$this->assertEquals(1, $item->nItem, "N�mero do Item");
	}
	
	
	public function testCST10IPINaoContribuinte_ICMSSTD()
	{
		$prod                    = new Produto();
		$prod->identificador     = 2;
		$prod->TipoTributacaoIPI = 0;
		$prod->FormaAquisicao    = 1; //Adiquirida de Terceiros
		$prod->vProd             = 100;
		$prod->vDesc             = 0;
		$prod->vFrete            = 0;
		$prod->vOutro            = 0;
		$prod->vSeg              = 0;
		$this->NF->itens         = array();
		$item                    = &$this->NF->addItem($prod);
		$this->NF->totalizarDocumento();
		$this->assertEquals('10', $item->imposto->ICMS->CST, "CST");
		$this->assertEquals(null, $item->imposto->ICMS->CSOSN, "CSOSN");
		$this->assertEquals(3, $item->imposto->ICMS->modBC, "modBC");
		$this->assertEquals(null, $item->imposto->ICMS->pRedBC, "pRedBC");
		$this->assertEquals(100, $item->imposto->ICMS->vBC, "vBC");
		$this->assertEquals(null, $item->imposto->ICMS->vBC_Desonerado, "vBC_Desonerado");
		$this->assertEquals(12, $item->imposto->ICMS->pICMS, "pICMS");
		$this->assertEquals(null, $item->imposto->ICMS->pICMS_Desonerado, "pICMS_Desonerado");
		$this->assertEquals(null, $item->imposto->ICMS->pDif, "pDif");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSDif, "vICMSDif");
		$this->assertEquals('12.00', $item->imposto->ICMS->vICMS, "vICMS");
		$this->assertEquals(null, $item->imposto->ICMS->vICMS_Desonerado, "vICMS_Desonerado");
		$this->assertEquals(4, $item->imposto->ICMS->modBCST, "modBCST");
		$this->assertEquals(100, $item->imposto->ICMS->pMVAST, "pMVAST");
		$this->assertEquals(null, $item->imposto->ICMS->pRedBCST, "pRedBCST");
		$this->assertEquals(200, $item->imposto->ICMS->vBCST, "vBCST");
		$this->assertEquals(null, $item->imposto->ICMS->vBCST_NaoDestacado, "vBCST_NaoDestacado");
		$this->assertEquals(17, $item->imposto->ICMS->pICMSST, "pICMSST");
		$this->assertEquals(22, $item->imposto->ICMS->vICMSST, "vICMSST");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSST_NaoDestacado, "vICMSST_NaoDestacado");
		$this->assertEquals(null, $item->imposto->ICMS->UFST, "UFST");
		$this->assertEquals(null, $item->imposto->ICMS->pBCOp, "pBCOp");
		$this->assertEquals(null, $item->imposto->ICMS->vBCSTRet, "vBCSTRet");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSSTRet, "vICMSSTRet");
		$this->assertEquals(null, $item->imposto->ICMS->UFST, "UFST");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSDeson, "vICMSDeson");
		$this->assertEquals(null, $item->imposto->ICMS->motDesICMS, "motDesICMS");
		$this->assertEquals(null, $item->imposto->ICMS->pCredSN, "pCredSN");
		$this->assertEquals(null, $item->imposto->ICMS->vCredICMSSN, "vCredICMSSN");
		$this->assertEquals(null, $item->imposto->ICMS->vBCSTDest, "vBCSTDest");
		$this->assertEquals(null, $item->imposto->ICMS->vICMSSTDest, "vICMSSTDest");
		$this->assertEquals("1.65", $item->imposto->PIS->vPIS, "vPIS");
		$this->assertEquals("01", $item->imposto->PIS->CST, "CST");
		$this->assertEquals("20.00", $item->imposto->vTotTrib, "vTotTrib");
		$this->assertEquals("1.65", $item->imposto->PIS->pPIS, "pPIS");
		$this->assertEquals(null, $item->imposto->IPI, "IPI Nulo");
		$this->assertEquals(null, $item->imposto->ISSQN, "ISSQN Nulo");
		$this->assertEquals(null, $item->imposto->ISSQN, "ISSQN Nulo");
		
		$this->assertEquals(1, $item->nItem, "N�mero do Item");
	}
	
	
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp(): void
	{
		$emitente                              = new Emitente();
		$emitente->identificador               = 1;
		$emitente->ContribuinteIPI             = 0;
		$emitente->CRT                         = 3;
		$emitente->PercCreditoSimples          = 0;
		$destinatario                          = new Destinatario();
		$destinatario->identificador           = 1;
		$operacao                              = new Operacao();
		$operacao->identificador               = 1;
		$operacao->CFOPMercadoria              = 5102;
		$operacao->CFOPMercadoriaST            = 5102;
		$operacao->CFOPMercadoriaSTSubstituido = 5102;
		$operacao->CFOPProduto                 = 5409;
		$operacao->CFOPProdutoST               = 5409;
		$operacao->TipoOperacao                = 0;//=Entrada;;
		$operacao->identificacao               = 1;//=Opera��o interna;;
		$operacao->finalidade                  = 1;
		$operacao->indFinal                    = 0;
		$operacao->indPres                     = 0;
		$operacao->NaturezaOperacao            = 'Venda a consumidor final';
		$this->NF                              = new DocumentoFiscal($emitente, $destinatario, $operacao);
		$this->NF->buscaTribFunctionICMS       = function (Produto $produto,
		                                                   Operacao $operacao,
		                                                   Emitente $emitente,
		                                                   Destinatario $destinatario) {
			return Trib::ICMS($produto->identificador, $operacao->identificador, $emitente->identificador,
			                  $destinatario->identificador);
		};
		$this->NF->buscaTribFunctionIPI        = function ($produto, $operacao, $emitente, $destinatario) {
			return Trib::IPI($produto->identificador, $operacao->identificador, $emitente->identificador,
			                 $destinatario->identificador);
		};
		
		$this->NF->buscaTribFunctionPIS = function ($produto, $operacao, $emitente, $destinatario) {
			return Trib::PIS($produto->identificador, $operacao->identificador, $emitente->identificador,
			                 $destinatario->identificador);
		};
		
		$this->NF->buscaTribFunctionCOFINS = function ($produto, $operacao, $emitente, $destinatario) {
			return Trib::COFINS($produto->identificador, $operacao->identificador, $emitente->identificador,
			                    $destinatario->identificador);
		};
		
		$this->NF->objetoParametroPesquisa = true;
		$this->NF->buscaTribFunctionIBPT   = function ($produto) {
			if($produto->tipoItem == 0)
			{
				$ret              = new \stdClass();
				$ret->PercTribFed = 10;
				$ret->PercTribEst = 10;
				$ret->PercTribMun = 0;
			}
			else
			{
				$ret              = new \stdClass();
				$ret->PercTribFed = 10;
				$ret->PercTribEst = 0;
				$ret->PercTribMun = 15;
			}
			
			return $ret;
		};
		
		$this->NF->buscaTribFunctionISSQN = function ($produto) {
			$ret           = new \stdClass();
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
		};
	}
	
	
}