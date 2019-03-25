<?php

use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyConverterTest
 */
class CurrencyConverterTest extends TestCase
{

    /**
     * Converting USD to EUR must return a float
     */
    public function testConvertUSDToEuro()
    {
        $webService = new CurrencyWebservice();
        $converter = new CurrencyConverter($webService);
        $amount = 100.23;

        $this->assertIsFloat(
            $converter->convert($amount, CurrencyConverter::USD, CurrencyConverter::EUR, '19/03/2019')
        );
    }

    /**
     * Converting EUR to EUR must return the same value
     */
    public function testConvertEuroToEuro()
    {
        $webService = new CurrencyWebservice();
        $converter = new CurrencyConverter($webService);
        $amount = 100.23;

        $this->assertEquals(
            $amount,
            $converter->convert($amount, CurrencyConverter::EUR,CurrencyConverter::EUR,  '19/03/2019')
        );
    }

    /**
     * Converting HRK to EUR must raise an exception and return -1
     */
    public function testConvertKunaToEuro()
    {
        $webService = new CurrencyWebservice();
        $converter = new CurrencyConverter($webService);
        $amount = 100.23;

        $result = $converter->convert($amount, 'HKR',CurrencyConverter::EUR,  '19/03/2019');
        $this->assertEquals(-1, $result);
    }
}