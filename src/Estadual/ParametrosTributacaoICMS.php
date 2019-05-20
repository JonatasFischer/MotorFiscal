<?php

namespace MotorFiscal\Estadual;

use Exception;

class ParametrosTributacaoICMS
{
    private $names = ['CSOSN', 'CST'];
    
    private $modalidadeBaseICMS;
    
    private $CSOSN;
    
    private $CST;
    
    private $incluirIPIBaseICMS;
    
    private $percMVAProprio;
    
    private $incluirFreteBaseICMS;
    
    private $percRedICMS;
    
    private $percDiferimento;
    
    private $destacarICMSDes;
    
    private $motivoDesICMS;
    
    private $valorBaseICMS;
    
    private $destacarICMS;
    
    private $aliquotaICMS;
    
    private $aliquotaICMSST;
    
    private $modalidadeBaseICMSST;
    
    private $percMVAAjustadoST;
    
    private $destacarICMSST;
    
    private $percIcmsUFDest;
    
    private $percFCPUFDest;
    
    private $percRedICMSST;
    
    private $baseCalcICMSST;
    
    
    public function __construct($parametros)
    {
        foreach ($parametros as $name => $value) {
            if (!in_array($name, $this->names, false)) {
                $name = lcfirst($name);
            }
            
            if (property_exists($this, $name)) {
                $this->$name = $value;
            } else {
                throw new Exception('Invalid property name: private $' . $name . ';');
            }
        }
    }
    
    
    /**
     * @return mixed
     */
    public function baseCalcICMSST()
    {
        return $this->baseCalcICMSST;
    }
    
    
    /**
     * @return mixed
     */
    public function percRedICMSST()
    {
        return $this->percRedICMSST;
    }
    
    
    /**
     * @return mixed
     */
    public function modalidadeBaseICMS()
    {
        return $this->modalidadeBaseICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function CSOSN()
    {
        return $this->CSOSN;
    }
    
    
    /**
     * @return mixed
     */
    public function CST()
    {
        return $this->CST;
    }
    
    
    /**
     * @return mixed
     */
    public function incluirIPIBaseICMS()
    {
        return $this->incluirIPIBaseICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function percMVAProprio()
    {
        return $this->percMVAProprio;
    }
    
    
    /**
     * @return mixed
     */
    public function incluirFreteBaseICMS()
    {
        return $this->incluirFreteBaseICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function percRedICMS()
    {
        return $this->percRedICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function percDiferimento()
    {
        return $this->percDiferimento;
    }
    
    
    /**
     * @return mixed
     */
    public function destacarICMSDes()
    {
        return $this->destacarICMSDes;
    }
    
    
    /**
     * @return mixed
     */
    public function motivoDesICMS()
    {
        return $this->motivoDesICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function valorBaseICMS()
    {
        return $this->valorBaseICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function destacarICMS()
    {
        return $this->destacarICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function aliquotaICMS()
    {
        return $this->aliquotaICMS;
    }
    
    
    /**
     * @return mixed
     */
    public function aliquotaICMSST()
    {
        return $this->aliquotaICMSST;
    }
    
    
    /**
     * @return mixed
     */
    public function modalidadeBaseICMSST()
    {
        return $this->modalidadeBaseICMSST;
    }
    
    
    /**
     * @return mixed
     */
    public function percMVAAjustadoST()
    {
        return $this->percMVAAjustadoST;
    }
    
    
    /**
     * @return mixed
     */
    public function destacarICMSST()
    {
        return $this->destacarICMSST;
    }
    
    
    /**
     * @return mixed
     */
    public function percIcmsUFDest()
    {
        return $this->percIcmsUFDest;
    }
    
    
    /**
     * @return mixed
     */
    public function percFCPUFDest()
    {
        return $this->percFCPUFDest;
    }
    
}