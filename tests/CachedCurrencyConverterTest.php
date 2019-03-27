<?php

use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyConverterTest
 */
class CachedCurrencyConverterTest extends TestCase
{

    /**
     * Converting USD to EUR must return a float
     */
    public function testConvertUSDToEuro()
    {
        $webService = new CurrencyWebservice();
        $converter = new CachedCurrencyConverter($webService);
        $amount = 100.23;

        $this->assertIsFloat(
            $converter->convert($amount, Currency::USD, Currency::EUR, '19/03/2019')
        );
    }

    /**
     * Converting EUR to EUR must return the same value
     */
    public function testConvertEuroToEuro()
    {
        $webService = new CurrencyWebservice();
        $converter = new CachedCurrencyConverter($webService);
        $amount = 100.23;

        $this->assertEquals(
            $amount,
            $converter->convert($amount, Currency::EUR,Currency::EUR,  '19/03/2019')
        );
    }

    /**
     * Converting HRK to EUR must raise an exception and return -1
     */
    public function testConvertKunaToEuro()
    {
        $webService = new CurrencyWebservice();
        $converter = new CachedCurrencyConverter($webService);
        $amount = 100.23;

        $result = $converter->convert($amount, 'HKR',Currency::EUR,  '19/03/2019');
        $this->assertEquals(-1, $result);
    }
}