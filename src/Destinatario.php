<?php

namespace MotorFiscal;
/**
 * Classe com todas as informa��es do destinat�rio
 */
class Destinatario extends Base
{
	public $identificador;
	/**
	 * NF-e/NFC-e :E02 - CNPJ
	 */
	public $CNPJ;
	/**
	 * NF-e/NFC-e :E03 - CPF
	 */
	public $CPF;
	/**
	 * NF-e/NFC-e :E03a - idEstrangeiro
	 */
	public $idEstrangeiro;
	/**
	 * NF-e/NFC-e :E04 - xNome
	 */
	public $xNome;
	public $xFant;//Vari�vel auxiliar
	/**
	 * NF-e/NFC-e :E06 - Logradouro
	 */
	public $xLgr;
	/**
	 * NF-e/NFC-e :E07 - N�mero
	 */
	public $nro;
	/**
	 * NF-e/NFC-e :E08 - Complemento
	 */
	public $xCpl;
	/**
	 * NF-e/NFC-e :E09 - Bairro
	 */
	public $xBairro;
	/**
	 * NF-e/NFC-e :E10 - C�digo do munic�pioMun
	 */
	public $cMun;
	/**
	 * NF-e/NFC-e :E11 - Nome do munic�pio
	 */
	public $xMun;
	/**
	 * NF-e/NFC-e :E12 - Sigla da UF
	 */
	public $UF;
	/**
	 * NF-e/NFC-e :E13 - C�digo do CEP
	 */
	public $CEP;
	/**
	 * NF-e/NFC-e :E14 - C�digo do Pa�s
	 */
	public $cPais;
	/**
	 * NF-e/NFC-e :E15 - Nome do Pa�s
	 */
	public $xPais;
	/**
	 * NF-e/NFC-e :E16 - Telefone
	 */
	public $fone;
	/**
	 * NF-e/NFC-e :E16a - indIEDest
	 */
	public $indIEDest;
	/**
	 * NF-e/NFC-e :E17 - IE
	 */
	public $IE;
	/**
	 * NF-e/NFC-e :E18 - IEST
	 */
	public $IEST;
	/**
	 * NF-e/NFC-e :E18a - IM
	 */
	public $IM;
	/**
	 * NF-e/NFC-e :E19 - email
	 */
	public $email;
	
	
	public $tipo_cadastro;
	public $id_estado;
	public $id_cidade;
}