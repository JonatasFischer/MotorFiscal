<?php

namespace MotorFiscal;

require_once "class.motor.base.php";

class IdentificacaoNFe extends Base
{

    /**
     * NF-e/NFC-e :B02 - cUF - C�digo da UF do emitente do Documento Fiscal
     */
    Public $cUF;

    /**
     * NF-e/NFC-e :B03 - cNF - C�digo Num�rico que comp�e a Chave de Acesso
     */
    Public $cNF;

    /**
     * NF-e/NFC-e :B04 - natOp - Descri��o da Natureza da Opera��o
     */
    Public $natOp;

    /**
     * NF-e/NFC-e :B05 - indPag - Indicador da forma de pagamento
     */
    Public $indPag;

    /**
     * NF-e/NFC-e :B06 - mod - C�digo do Modelo do Documento Fiscal
     */
    Public $mod;

    /**
     * NF-e/NFC-e :B07 - serie - S�rie do Documento Fiscal
     */
    Public $serie;

    /**
     * NF-e/NFC-e :B08 - nNF - N�mero do Documento Fiscal
     */
    Public $nNF;

    /**
     * NF-e/NFC-e :B09 - dhEmi - Data e hora de emiss�o do Documento Fiscal
     */
    Public $dhEmi;

    /**
     * NF-e/NFC-e :B10 - dhSaiEnt - Data e hora de Sa�da ou da Entrada da Mercadoria/Produto
     */
    Public $dhSaiEnt;

    /**
     * NF-e/NFC-e :B11 - tpNF - Tipo de Opera��o
     */
    Public $tpNF;

    /**
     * NF-e/NFC-e :B11a - idDest - Identificador de local de destino da opera��o
     */
    Public $idDest;

    /**
     * NF-e/NFC-e :B12 - cMunFG - C�digo do Munic�pio de Ocorr�ncia do Fato Gerador
     */
    Public $cMunFG;

    /**
     * NF-e/NFC-e :B21 - tpImp - Formato de Impress�o do DANFE
     */
    Public $tpImp;

    /**
     * NF-e/NFC-e :B22 - tpEmis - Tipo de Emiss�o da NF-e
     */
    Public $tpEmis;

    /**
     * NF-e/NFC-e :B23 - cDV - D�gito Verificador da Chave de Acesso da NF-e
     */
    Public $cDV;

    /**
     * NF-e/NFC-e :B24 - tpAmb - Identifica��o do Ambiente
     */
    Public $tpAmb;

    /**
     * NF-e/NFC-e :B25 - finNFe - Finalidade de emiss�o da NF-e
     */
    Public $finNFe;

    /**
     * NF-e/NFC-e :B25a - indFinal - Indica opera��o com Consumidor final
     */
    Public $indFinal;

    /**
     * NF-e/NFC-e :B25b - indPres - Indicador de presen�a do comprador no estabelecimento comercial no momento da opera��o
     */
    Public $indPres;

    /**
     * NF-e/NFC-e :B26 - procEmi - Processo de emiss�o da NF-e
     */
    Public $procEmi;

}
