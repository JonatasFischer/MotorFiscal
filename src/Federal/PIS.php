<?php

namespace MotorFiscal\Federal;

use MotorFiscal\Base;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Exception;
use MotorFiscal\ItemFiscal;

class PIS extends Base
{
    /**
     * NF-e/NFC-e :Q06 - CST.
     */
    protected $CST;
    
    /**
     * NF-e/NFC-e :Q07 - vBC.
     */
    protected $vBC;
    
    /**
     * NF-e/NFC-e :Q08 - pPIS.
     */
    protected $pPIS;
    
    /**
     * NF-e/NFC-e :Q09 - vPIS.
     */
    protected $vPIS;
    
    /**
     * NF-e/NFC-e :Q10 - qBCProd.
     */
    protected $qBCProd;
    
    /**
     * NF-e/NFC-e :Q11 - vAliqProd.
     */
    protected $vAliqProd;
    
    
    /**
     * @param \MotorFiscal\DocumentoFiscal $documento
     * @param \MotorFiscal\ItemFiscal      $item
     *
     * @return \MotorFiscal\Federal\PIS
     */
    public static function createFromItemAndDocumento(DocumentoFiscal $documento, ItemFiscal &$item)
    {
    
        $PIS = new self();
        $PIS->initialize($documento, $item);
    
        return $PIS;
    }
    
    
    /**
     * @param \MotorFiscal\DocumentoFiscal $documento
     * @param \MotorFiscal\ItemFiscal      $item
     */
    protected function initialize(DocumentoFiscal $documento, ItemFiscal &$item)
    {
        $tributacaoPIS = $this->getTribPIS($item, $documento);
        
        $this->assign($tributacaoPIS);
        switch ($tributacaoPIS->CST) {
            case '01':
            case '02':
                $this->setCST($tributacaoPIS->CST);
                $this->setpPIS($tributacaoPIS->AliquotaPis);
                $this->setVBC($item->prod()->vProd() - $item->prod()->vDesc());
                $this->setVPIS(number_format(ceil($this->vBC() * $this->pPIS()) / 100, 2, '.', ''));
                break;
            case '03':
                $this->setCST($tributacaoPIS->CST);
                $this->setQBCProd($item->prod()->qTrib());
                $this->setVAliqProd($tributacaoPIS->ValorPIS);
                $this->setVPIS($this->qBCProd() * $this->vAliqProd());
                break;
            case '04':
            case '05':
            case '06':
            case '07':
            case '08':
            case '09':
                $this->setCST($tributacaoPIS->CST);
                break;
            default:
                if ($tributacaoPIS->TipoTributacaoPISCOFINS == 0) {
                    $this->setCST($tributacaoPIS->CST);
                    $this->setPPIS($tributacaoPIS->AliquotaPis);
                    $this->setVBC($item->prod()->vProd() - $item->prod()->vDesc());
                    $this->setVPIS(ceil($this->vBC() * $this->pPIS()) / 100);
                } else {
                    $this->setCST($tributacaoPIS->CST);
                    $this->setQBCProd($item->prod()->qTrib());
                    $this->setVAliqProd($tributacaoPIS->ValorPIS);
                    $this->setVPIS($this->qBCProd() * $this->vAliqProd());
                }
        }
    }
    
    
    /**
     * @param \MotorFiscal\ItemFiscal      $item
     * @param \MotorFiscal\DocumentoFiscal $documento
     *
     * @return mixed
     * @throws \MotorFiscal\Exception
     */
    protected function getTribPIS(ItemFiscal $item, DocumentoFiscal $documento)
    {
        $callback = $documento->buscaTribFunctionPIS();
    
        if (!$callback) {
            throw new Exception('buscaTribFunctionPIS nao inicializada');
        }
        
        if ($documento->tipoParametroPesquisa() === DocumentoFiscal::IDENTIFICADOR) {
            $tributacaoPIS = $callback($item->prod()->identificador(), $item->Operacao()->identificador(),
                $documento->emit()->identificador(), $documento->dest()->identificador());
        } else {
            $tributacaoPIS = $callback($item->prod(), $item->Operacao(), $documento->emit(), $documento->dest());
        }
        
        return $tributacaoPIS;
    }
    
    
    /**
     * @return mixed
     */
    public function vBC()
    {
        return $this->vBC;
    }
    
    
    /**
     * @param mixed $vBC
     *
     * @return PIS
     */
    public function setVBC($vBC)
    {
        $this->vBC = $vBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function pPIS()
    {
        return $this->pPIS;
    }
    
    
    /**
     * @param mixed $pPIS
     *
     * @return PIS
     */
    public function setPPIS($pPIS)
    {
        $this->pPIS = $pPIS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function qBCProd()
    {
        return $this->qBCProd;
    }
    
    
    /**
     * @param mixed $qBCProd
     *
     * @return PIS
     */
    public function setQBCProd($qBCProd)
    {
        $this->qBCProd = $qBCProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vAliqProd()
    {
        return $this->vAliqProd;
    }
    
    
    /**
     * @param mixed $vAliqProd
     *
     * @return PIS
     */
    public function setVAliqProd($vAliqProd)
    {
        $this->vAliqProd = $vAliqProd;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function CST()
    {
        return $this->CST;
    }
    
    
    /**
     * @param mixed $CST
     *
     * @return PIS
     */
    public function setCST($CST)
    {
        $this->CST = $CST;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vPIS()
    {
        return $this->vPIS;
    }
    
    
    /**
     * @param mixed $vPIS
     *
     * @return PIS
     */
    public function setVPIS($vPIS)
    {
        $this->vPIS = $vPIS;
        
        return $this;
    }
}
