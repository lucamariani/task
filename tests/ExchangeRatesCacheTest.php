<?php

use PHPUnit\Framework\TestCase;

class ExchangeRatesCacheTest extends TestCase
{

    public function testAddExchangeRate()
    {
        $cache = new ExchangeRatesCache();
        $cache->addExchangeRate('EUR','USD','01/01/2019', 1);
        $result = $cache->getExchangeRate('EUR','USD','01/01/2019');
        $this->assertEquals(1, $result);

        return $cache;
    }

    public function testGetExchangeRateNull()
    {
        $cache = new ExchangeRatesCache();
        $result = $cache->getExchangeRate('EUR','USD','01/01/2019');
        $this->assertNull($result);
    }

    /**
     * @depends testAddExchangeRate
     */
    public function testGetExchangeRateNotNull(ExchangeRatesCache $cache)
    {
        $result = $cache->getExchangeRate('EUR','USD','01/01/2019');
        $this->assertEquals(1, $result);
    }
}
