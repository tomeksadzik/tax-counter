<?php

/**
 * Class TaxCounter
 */
class TaxCounter {

    /**
     * @param float $netAmount
     * @param float $percentTaxValue
     * @return float
     *
     * @throws ParameterIsNotNumericException
     */
    public function countPercentTax($netAmount, $percentTaxValue){
        if (is_numeric($netAmount)==false || is_numeric($percentTaxValue)==false){
            throw new ParameterIsNotNumericException();
        }
        return $netAmount + $netAmount*($percentTaxValue/100);
    }
}
