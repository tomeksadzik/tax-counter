<?php

/**
 * Class TaxCounterTest
 */
class TaxCounterTest extends PHPUnit_Framework_TestCase{

    /** @var TaxCounter */
    protected $taxCounter;

    protected function setUp()
    {
        $this->taxCounter = new TaxCounter();
    }


    /**
     * @return array
     */
    public function validValuesForValidCountPercentTax(){
        return [
            [100,10,110],
            ["100","10","110"],
            ['1.0',"10",1.1],
            [10.0,1.0,10.1],
            [100,200,300],
            [-10,-10,-9],
            [-10,20,-12],
            [10,-50,5],
            [0,0,0]
        ];
    }

    /**
     * @param float $netAmount
     * @param float $percentTaxValue
     * @param float $expectedResult
     *
     * @dataProvider validValuesForValidCountPercentTax
     */
    public function testValidCountPercentTax($netAmount, $percentTaxValue, $expectedResult){
        $result = $this->taxCounter->countPercentTax($netAmount, $percentTaxValue);

        $this->assertEquals($result, $expectedResult);
    }

    /**
     * @return array
     */
    public function invalidValuesForValidCountPercentTax(){
        return [
            [10.0,'10,1'],
            ['aa',1],
            ['10a',"null"],
            [null,10],
            [3,null],
            [null,null]
        ];
    }

    /**
     * @param float $netAmount
     * @param float $percentTaxValue
     *
     * @expectedException ParameterIsNotNumericException
     *
     * @dataProvider invalidValuesForValidCountPercentTax
     */
    public function testCountPercentTaxException($netAmount, $percentTaxValue){
        $this->taxCounter->countPercentTax($netAmount, $percentTaxValue);
    }
}
