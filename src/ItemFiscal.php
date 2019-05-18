<?php

namespace MotorFiscal;

use MotorFiscal\Estadual\ICMSTot;

/**
 * Classe representada pelo item H01 da NF-e/NFC-e.
 */
class ItemFiscal extends Base
{
    // 0 = Produto; 1 = Serviço
    /**
     * NF-e/NFC-e :H02 - nItem.
     */
    protected $nItem;
    
    /**
     * NF-e/NFC-e :W02 - ICMSTot.
     *
     * @var ICMSTot
     */
    protected $ICMSTot;
    
    /**
     * Operação do Item da Nota Fiscal.
     */
    protected $Operacao;
    
    /**
     * NF-e/NFC-e :I01 - prod.
     *
     * @var Produto
     */
    private $prod;
    
    /**
     * NF-e/NFC-e :M01 - imposto.
     *
     * @var \MotorFiscal\Imposto
     */
    private $imposto;
    
    
    private function __construct()
    {
    }
    
    
    public static function criarItemFiscal(Produto $produto, Operacao $operacao, DocumentoFiscal $documento)
    {
        $item           = new self();
        $item->Operacao = $operacao;
        $item->prod     = $produto;
        $item->imposto  = Imposto::createImposto($documento, $produto);
        
        if ($produto->tipoItem() === Produto::PRODUTO) {
            if ($item->prod()->FormaAquisicao() === 1) {
                /* I08 */
                $item->prod()->setCFOP($item->Operacao()->CFOPMercadoria());
            } else {
                /* I08 */
                $item->prod()->setCFOP($operacao->CFOPProduto());
            }
        }
        
        return $item;
    }
    
    
    /**
     * @return \MotorFiscal\Produto
     */
    public function prod()
    {
        return $this->prod;
    }
    
    
    /**
     * @param \MotorFiscal\Produto $prod
     *
     * @return ItemFiscal
     */
    public function setProd($prod)
    {
        $this->prod = $prod;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Operacao
     */
    public function Operacao()
    {
        return $this->Operacao;
    }
    
    
    /**
     * @param mixed $Operacao
     *
     * @return ItemFiscal
     */
    public function setOperacao(Operacao $Operacao)
    {
        $this->Operacao = $Operacao;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Imposto
     */
    public function imposto()
    {
        return $this->imposto;
    }
    
    
    /**
     * @param \MotorFiscal\Imposto $imposto
     *
     * @return ItemFiscal
     */
    public function setImposto($imposto)
    {
        $this->imposto = $imposto;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function nItem()
    {
        return $this->nItem;
    }
    
    
    /**
     * @param mixed $nItem
     *
     * @return ItemFiscal
     */
    public function setNItem($nItem)
    {
        $this->nItem = $nItem;
        
        return $this;
    }
    
    
    /**
     * @return \MotorFiscal\Estadual\ICMSTot
     */
    public function ICMSTot()
    {
        return $this->ICMSTot;
    }
    
    
    /**
     * @param \MotorFiscal\Estadual\ICMSTot $ICMSTot
     *
     * @return ItemFiscal
     */
    public function setICMSTot($ICMSTot)
    {
        $this->ICMSTot = $ICMSTot;
        
        return $this;
    }
    
}
