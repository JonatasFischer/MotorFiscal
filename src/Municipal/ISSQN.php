<?php

namespace MotorFiscal\Municipal;

use MotorFiscal\Base;
use MotorFiscal\Emitente;
use MotorFiscal\ItemFiscal;
use MotorFiscal\Produto;

/**
 * Classe com todas as informações para escrituração do ISSQN.
 */
class ISSQN extends Base
{
    /**
     * NF-e/NFC-e : U17 - indIncentivo.
     */
    public $indIncentivo;
    
    /**
     * NF-e/NFC-e : U02 - vBC.
     */
    protected $vBC;
    
    /**
     * NF-e/NFC-e : U03 - vAliq.
     */
    protected $vAliq;
    
    /**
     * NF-e/NFC-e : U04 - vISSQN.
     */
    protected $vISSQN;
    
    /**
     * NF-e/NFC-e : U05 - cMunFG.
     */
    protected $cMunFG;
    
    /**
     * NF-e/NFC-e : U06 - cListServ.
     */
    protected $cListServ;
    
    /**
     * NF-e/NFC-e : U07 - vDeducao.
     */
    protected $vDeducao = 0;
    
    /**
     * NF-e/NFC-e : U08 - vOutro.
     */
    protected $vOutro = 0;
    
    /**
     * NF-e/NFC-e : U09 - vDescIncond.
     */
    protected $vDescIncond = 0;
    
    /**
     * NF-e/NFC-e : U10 - vDescCond.
     */
    protected $vDescCond;
    
    protected $vISSRet;
    
    /**
     * NF-e/NFC-e : U12 - indISS.
     */
    protected $indISS;
    
    /**
     * NF-e/NFC-e : U13 - cServico.
     */
    protected $cServico;
    
    /**
     * NF-e/NFC-e : U14 - cMun.
     */
    protected $cMun;
    
    /*
     * NF-e/NFC-e : U11 - vISSRet
     */
    
    /**
     * NF-e/NFC-e : U15 - cPais.
     */
    protected $cPais;
    
    /**
     * NF-e/NFC-e : U16 - nProcesso.
     */
    protected $nProcesso;
    
    protected $vRetPIS    = 0;
    
    protected $vRetCOFINS = 0;
    
    protected $vRetIR     = 0;
    
    protected $vRetCSLL   = 0;
    
    protected $vRetINSS   = 0;
    
    
    public static function createFromProduct(Produto $produto)
    {
        $ISSQN               = new ISSQN();
        $ISSQN->cMunFG       = $produto->cMunFG();
        $ISSQN->vDeducao     = $produto->vDeducao();
        $ISSQN->vDescIncond  = $produto->vDescIncond();
        $ISSQN->vDescCond    = $produto->vDescCond();
        $ISSQN->indISS       = $produto->indISS();
        $ISSQN->cServico     = $produto->cServico();
        $ISSQN->cMun         = $produto->cMun();
        $ISSQN->cPais        = $produto->cPais();
        $ISSQN->nProcesso    = $produto->nProcesso();
        $ISSQN->indIncentivo = $produto->indIncentivo();
        
        return $ISSQN;
    }
    
    
    public static function createFrom(ItemFiscal $item, $tributacaoISSQN, Emitente $emit)
    {
        
        
        $ISSQN = new ISSQN();
        //Calculo dos impostos
        $ISSQN->setVBC($item->prod()->vProd() - $item->prod()->vDesc() - $item->prod()->vDeducao());
        
        $ISSQN->setVAliq($tributacaoISSQN->Aliquota);
        $ISSQN->setVISSQN(number_format($ISSQN->vBC() * $ISSQN->vAliq() / 100, 2, '.', ''));
        
        if (!$tributacaoISSQN->ISSRetemPF) {
            $tributacaoISSQN->ISSValorMinRetPF = -1;
        }
        
        if (!$tributacaoISSQN->ISSRetemPJ) {
            $tributacaoISSQN->ISSValorMinRetPJ = -1;
        }
        
        $vMinRetISS = $emit->CPF()
            ? $tributacaoISSQN->ISSValorMinRetPF
            : $tributacaoISSQN->ISSValorMinRetPJ;
        if ($ISSQN->vISSQN() > $vMinRetISS && $vMinRetISS > 0) {
            $ISSQN->setVISSRet($ISSQN->vISSQN());
        }
        
        if ($tributacaoISSQN->IRRetem) {
            $ISSQN->setVRetIR(number_format($ISSQN->vBC() * $tributacaoISSQN->IRRetPerc / 100, 2, '.', ''));
        }
        if ($tributacaoISSQN->CSLLRetem) {
            $ISSQN->setVRetCSLL(number_format($ISSQN->vBC() * $tributacaoISSQN->CSLLRetPerc / 100, 2, '.', ''));
        }
        if ($tributacaoISSQN->INSSRetem) {
            $ISSQN->setVRetINSS(number_format($ISSQN->vBC() * $tributacaoISSQN->INSSRetPerc / 100, 2, '.', ''));
        }
        if ($tributacaoISSQN->PISCOFINSRetem) {
            $ISSQN->setVRetPIS(number_format($ISSQN->vBC() * $tributacaoISSQN->PISRetPerc / 100, 2, '.', ''));
            
            $ISSQN->setVRetCOFINS(number_format($ISSQN->vBC() * $tributacaoISSQN->COFINSRetPerc / 100, 2, '.', ''));
        }
        
        return $ISSQN;
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
     * @return ISSQN
     */
    public function setVBC($vBC)
    {
        $this->vBC = $vBC;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vAliq()
    {
        return $this->vAliq;
    }
    
    
    /**
     * @param mixed $vAliq
     *
     * @return ISSQN
     */
    public function setVAliq($vAliq)
    {
        $this->vAliq = $vAliq;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vISSQN()
    {
        return $this->vISSQN;
    }
    
    
    /**
     * @param mixed $vISSQN
     *
     * @return ISSQN
     */
    public function setVISSQN($vISSQN)
    {
        $this->vISSQN = $vISSQN;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cMunFG()
    {
        return $this->cMunFG;
    }
    
    
    /**
     * @param mixed $cMunFG
     *
     * @return ISSQN
     */
    public function setCMunFG($cMunFG)
    {
        $this->cMunFG = $cMunFG;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cListServ()
    {
        return $this->cListServ;
    }
    
    
    /**
     * @param mixed $cListServ
     *
     * @return ISSQN
     */
    public function setCListServ($cListServ)
    {
        $this->cListServ = $cListServ;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vDeducao()
    {
        return $this->vDeducao;
    }
    
    
    /**
     * @param mixed $vDeducao
     *
     * @return ISSQN
     */
    public function setVDeducao($vDeducao)
    {
        $this->vDeducao = $vDeducao;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vOutro()
    {
        return $this->vOutro;
    }
    
    
    /**
     * @param mixed $vOutro
     *
     * @return ISSQN
     */
    public function setVOutro($vOutro)
    {
        $this->vOutro = $vOutro;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vDescIncond()
    {
        return $this->vDescIncond;
    }
    
    
    /**
     * @param mixed $vDescIncond
     *
     * @return ISSQN
     */
    public function setVDescIncond($vDescIncond)
    {
        $this->vDescIncond = $vDescIncond;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vDescCond()
    {
        return $this->vDescCond;
    }
    
    
    /**
     * @param mixed $vDescCond
     *
     * @return ISSQN
     */
    public function setVDescCond($vDescCond)
    {
        $this->vDescCond = $vDescCond;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function vISSRet()
    {
        return $this->vISSRet;
    }
    
    
    /**
     * @param mixed $vISSRet
     *
     * @return ISSQN
     */
    public function setVISSRet($vISSRet)
    {
        $this->vISSRet = $vISSRet;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function indISS()
    {
        return $this->indISS;
    }
    
    
    /**
     * @param mixed $indISS
     *
     * @return ISSQN
     */
    public function setIndISS($indISS)
    {
        $this->indISS = $indISS;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cServico()
    {
        return $this->cServico;
    }
    
    
    /**
     * @param mixed $cServico
     *
     * @return ISSQN
     */
    public function setCServico($cServico)
    {
        $this->cServico = $cServico;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cMun()
    {
        return $this->cMun;
    }
    
    
    /**
     * @param mixed $cMun
     *
     * @return ISSQN
     */
    public function setCMun($cMun)
    {
        $this->cMun = $cMun;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function cPais()
    {
        return $this->cPais;
    }
    
    
    /**
     * @param mixed $cPais
     *
     * @return ISSQN
     */
    public function setCPais($cPais)
    {
        $this->cPais = $cPais;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function nProcesso()
    {
        return $this->nProcesso;
    }
    
    
    /**
     * @param mixed $nProcesso
     *
     * @return ISSQN
     */
    public function setNProcesso($nProcesso)
    {
        $this->nProcesso = $nProcesso;
        
        return $this;
    }
    
    
    /**
     * @return mixed
     */
    public function indIncentivo()
    {
        return $this->indIncentivo;
    }
    
    
    /**
     * @param mixed $indIncentivo
     *
     * @return ISSQN
     */
    public function setIndIncentivo($indIncentivo)
    {
        $this->indIncentivo = $indIncentivo;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function vRetPIS()
    {
        return $this->vRetPIS;
    }
    
    
    /**
     * @param int $vRetPIS
     *
     * @return ISSQN
     */
    public function setVRetPIS($vRetPIS)
    {
        $this->vRetPIS = $vRetPIS;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function vRetCOFINS()
    {
        return $this->vRetCOFINS;
    }
    
    
    /**
     * @param int $vRetCOFINS
     *
     * @return ISSQN
     */
    public function setVRetCOFINS($vRetCOFINS)
    {
        $this->vRetCOFINS = $vRetCOFINS;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function vRetIR()
    {
        return $this->vRetIR;
    }
    
    
    /**
     * @param int $vRetIR
     *
     * @return ISSQN
     */
    public function setVRetIR($vRetIR)
    {
        $this->vRetIR = $vRetIR;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function vRetCSLL()
    {
        return $this->vRetCSLL;
    }
    
    
    /**
     * @param int $vRetCSLL
     *
     * @return ISSQN
     */
    public function setVRetCSLL($vRetCSLL)
    {
        $this->vRetCSLL = $vRetCSLL;
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function vRetINSS()
    {
        return $this->vRetINSS;
    }
    
    
    /**
     * @param int $vRetINSS
     *
     * @return ISSQN
     */
    public function setVRetINSS($vRetINSS)
    {
        $this->vRetINSS = $vRetINSS;
        
        return $this;
    }
}
