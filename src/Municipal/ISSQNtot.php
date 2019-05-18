<?php
/**
 * Created by PhpStorm.
 * User: jonat
 * Date: 28/03/2019
 * Time: 06:05.
 */

namespace MotorFiscal\Municipal;

use MotorFiscal\Base;
use MotorFiscal\DocumentoFiscal;
use MotorFiscal\Produto;

class ISSQNtot extends Base
{
    /**
     *
     * NF-e/NFC-e : W18 - vServ - Valor total dos Serviços sob não-incidência ou não tributados pelo ICMS
     */
    protected $vServ;
    
    /**
     * NF-e/NFC-e : W19 - vBC - Valor total Base de Cálculo do ISS
     */
    protected $vBC;
    
    /**
     * NF-e/NFC-e : W20 - vISS - Valor total do ISS
     */
    protected $vISS;
    
    /**
     * NF-e/NFC-e : W21 - Valor total do PIS sobre serviços
     */
    protected $vPIS;
    
    /**
     * NF-e/NFC-e : W22 - Valor total da COFINS sobre serviços
     */
    protected $vCOFINS;
    
    /**
     * NF-e/NFC-e : W22a - Data da prestação do serviço
     *
     * @var date
     */
    protected $dCompet;
    
    
    /**
     * NF-e/NFC-e : W22b - Valor total dedução para redução da Base de Cálculo
     */
    protected $vDeducao;
    
    /**
     * NF-e/NFC-e : W22c - Valor total outras retenções
     */
    protected $vOutro;
    
    /**
     * NF-e/NFC-e : W22d - Valor total desconto incondicionado
     */
    protected $vDescIncond;
    
    /**
     * NF-e/NFC-e : W22e - Valor total desconto condicionado
     */
    protected $vDescCond;
    
    /**
     * NF-e/NFC-e : W22f - Valor total retenção ISS
     */
    protected $vISSRet;
    
    /**
     * NF-e/NFC-e : W22g - Código do Regime Especial de Tributação
     */
    protected $cRegTrib;
    
    
    public static function createForDocumento(DocumentoFiscal $documento)
    {
        $vBaseIRServ    = 0;
        $vRetISSServ    = 0;
        $vISSQNServ     = 0;
        $vTotPisServ    = 0;
        $vTotCofinsServ = 0;
        $vTotDeducao    = 0;
        $vTotDescIncond = 0;
        $vTotDescCond   = 0;
        $vTotOutroServ  = 0;
        $ISSQNtot       = null;
        
        foreach ($documento->itens() as $item) {
            if ($item->prod()->tipoItem() === Produto::SERVICO) {
                $vBaseIRServ    += $item->imposto()->ISSQN()->vBC();
                $vRetISSServ    += $item->imposto()->ISSQN()->vISSRet();
                $vISSQNServ     += $item->imposto()->ISSQN()->vISSQN();
                $vTotPisServ    += $item->imposto()->PIS()->vPIS();
                $vTotCofinsServ += $item->imposto()->COFINS()->vCOFINS();
                $vTotDeducao    += $item->imposto()->ISSQN()->vDeducao();
                $vTotDescIncond += $item->imposto()->ISSQN()->vDescIncond();
                $vTotDescCond   += $item->imposto()->ISSQN()->vDescCond();
                
                if ($documento->retTrib()) {
                    if ($documento->retTrib()->vContribuicoes()) {
                        $vTotOutroServ += $item->imposto()->ISSQN()->vRetPIS() + $item->imposto()->ISSQN()->vRetCOFINS()
                                          + $item->imposto()->ISSQN()->vRetCSLL();
                    }
                    
                    if ($documento->retTrib()->vIRRF()) {
                        $vTotOutroServ += $item->imposto()->ISSQN()->vRetIR();
                    }
                    
                    if ($documento->retTrib()->vRetPrev()) {
                        $vTotOutroServ += $item->imposto()->ISSQN()->vRetINSS();
                    }
                }
            }
        }
        
        if ($vISSQNServ > 0) {
            $ISSQNtot              = new ISSQNtot();
            $ISSQNtot->vServ       = $vBaseIRServ;
            $ISSQNtot->vBC         = $vBaseIRServ;
            $ISSQNtot->vISS        = $vISSQNServ;
            $ISSQNtot->vPIS        = $vTotPisServ;
            $ISSQNtot->vCOFINS     = $vTotCofinsServ;
            $ISSQNtot->vDeducao    = $vTotDeducao;
            $ISSQNtot->vOutro      = $vTotOutroServ;
            $ISSQNtot->vDescIncond = $vTotDescIncond;
            $ISSQNtot->vDescCond   = $vTotDescCond;
            $ISSQNtot->vISSRet     = $vRetISSServ;
        }
        
        return $ISSQNtot;
    }
    
    
    /**
     * @return \MotorFiscal\Municipal\date
     */
    public function dCompet()
    {
        return $this->dCompet;
    }
    
    
    /**
     * @return mixed
     */
    public function cRegTrib()
    {
        return $this->cRegTrib;
    }
    
    
    /**
     * @return mixed
     */
    public function vServ()
    {
        return $this->vServ;
    }
    
    
    /**
     * @return mixed
     */
    public function vBC()
    {
        return $this->vBC;
    }
    
    
    /**
     * @return mixed
     */
    public function vISS()
    {
        return $this->vISS;
    }
    
    
    /**
     * @return mixed
     */
    public function vPIS()
    {
        return $this->vPIS;
    }
    
    
    /**
     * @return mixed
     */
    public function vCOFINS()
    {
        return $this->vCOFINS;
    }
    
    
    /**
     * @return mixed
     */
    public function vDeducao()
    {
        return $this->vDeducao;
    }
    
    
    /**
     * @return mixed
     */
    public function vOutro()
    {
        return $this->vOutro;
    }
    
    
    /**
     * @return mixed
     */
    public function vDescIncond()
    {
        return $this->vDescIncond;
    }
    
    
    /**
     * @return mixed
     */
    public function vDescCond()
    {
        return $this->vDescCond;
    }
    
    
    /**
     * @return mixed
     */
    public function vISSRet()
    {
        return $this->vISSRet;
    }
    
    
}
