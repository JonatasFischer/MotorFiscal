<?php
namespace MotorFiscal;
/**
 * Classe com todas as informa��es do destinat�rio
 */
class Destinatario extends Base
{
    Public $identificador;
    /**
     * NF-e/NFC-e :E02 - CNPJ
     */
    Public $CNPJ;
    /**
     * NF-e/NFC-e :E03 - CPF
     */
    Public $CPF;
    /**
     * NF-e/NFC-e :E03a - idEstrangeiro
     */
    Public $idEstrangeiro;
    /**
     * NF-e/NFC-e :E04 - xNome
     */
    Public $xNome;
    Public $xFant;//Vari�vel auxiliar
    /**
     * NF-e/NFC-e :E06 - Logradouro
     */
    Public $xLgr;
    /**
     * NF-e/NFC-e :E07 - N�mero
     */
    Public $nro;
    /**
     * NF-e/NFC-e :E08 - Complemento
     */
    Public $xCpl;
    /**
     * NF-e/NFC-e :E09 - Bairro
     */
    Public $xBairro;
    /**
     * NF-e/NFC-e :E10 - C�digo do munic�pioMun
     */
    Public $cMun;
    /**
     * NF-e/NFC-e :E11 - Nome do munic�pio
     */
    Public $xMun;
    /**
     * NF-e/NFC-e :E12 - Sigla da UF
     */
    Public $UF;
    /**
     * NF-e/NFC-e :E13 - C�digo do CEP
     */
    Public $CEP;
    /**
     * NF-e/NFC-e :E14 - C�digo do Pa�s
     */
    Public $cPais;
    /**
     * NF-e/NFC-e :E15 - Nome do Pa�s
     */
    Public $xPais;
    /**
     * NF-e/NFC-e :E16 - Telefone
     */
    Public $fone;
    /**
     * NF-e/NFC-e :E16a - indIEDest
     */
    Public $indIEDest;
    /**
     * NF-e/NFC-e :E17 - IE
     */
    Public $IE;
    /**
     * NF-e/NFC-e :E18 - IEST
     */
    Public $IEST;
    /**
     * NF-e/NFC-e :E18a - IM
     */
    Public $IM;
    /**
     * NF-e/NFC-e :E19 - email
     */
    Public $email;


    Public $tipo_cadastro;
    Public $id_estado;
    Public $id_cidade;
}