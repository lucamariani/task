<?php

use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{

    public function testNameFromSymbol()
    {
        $currencySymbol = '$';
        $result = Currency::getCurrencyNameFromSymbol($currencySymbol);
        $this->assertEquals('USD', $result);
    }

    public function testSymbolFromName()
    {
        $currencyName = 'USD';
        $result = Currency::getCurrencySymbolFromName($currencyName);
        $this->assertEquals('$', $result);
    }
}