<?php

use PHPUnit\Framework\TestCase;

class CurrencyWebserviceTest extends TestCase
{

    public function testGetEURExchangeRate(): void
    {
        $currencyWebservice = new CurrencyWebservice();

        $this->assertIsFloat(
            $currencyWebservice->getExchangeRate(CurrencyWebservice::GBP, CurrencyWebservice::EUR, '02/03/2019')
        );
    }

    public function testGetEURExchangeRateException(): void
    {
        $this->expectException(WebserviceException::class);

        $currencyWebservice = new CurrencyWebservice();
        $currencyWebservice->getExchangeRate("@", CurrencyWebservice::EUR, '02/03/2019');
    }
}