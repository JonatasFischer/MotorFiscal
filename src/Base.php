<?php

namespace MotorFiscal;

/**
 * Classe base para ocultar campos privados.
 */
class Base
{
    /**
     * @var array
     */
    protected $customInfo = [];
    
    /**
     * @var array
     */
    protected $externalProp = [];
    
    
    /**
     * @param $obj
     */
    public function assign($obj)
    {
        foreach ($this->externalProp as $property) {
            if (property_exists($this, $property) && property_exists($obj, $property)) {
                $this->$property = $obj->$property;
            }
        }
    }
    
    
    protected function toFloat($value)
    {
        return is_numeric($value)
            ? str_replace(',', '', $value)
            : 0;
    }
}
