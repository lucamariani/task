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
            $converter->convertToEuro($amount, CurrencyConverter::USD, '19/03/2019')
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
            $converter->convertToEuro($amount, CurrencyConverter::EUR, '19/03/2019')
        );
    }

    /**
     * Converting HRK to EUR must raise an exception
     */
    public function testConvertKunaToEuro()
    {
        $this->expectException(WebserviceException::class);

        $webService = new CurrencyWebservice();
        $converter = new CurrencyConverter($webService);
        $amount = 100.23;

        $converter->convertToEuro($amount, 'HKR', '19/03/2019');
    }
}