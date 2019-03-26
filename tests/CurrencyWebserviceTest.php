<?php

use PHPUnit\Framework\TestCase;

class CurrencyWebserviceTest extends TestCase
{

    public function testGetEURExchangeRate(): void
    {
        $currencyWebservice = new CurrencyWebservice();

        $this->assertIsFloat(
            $currencyWebservice->getExchangeRate(Currency::GBP, Currency::EUR, '02/03/2019')
        );
    }

    public function testGetEURExchangeRateException(): void
    {
        $this->expectException(WebserviceException::class);

        $currencyWebservice = new CurrencyWebservice();
        $currencyWebservice->getExchangeRate("@", Currency::EUR, '02/03/2019');
    }
}