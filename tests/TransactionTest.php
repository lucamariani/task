<?php

use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{

    public function testGetValueAmount()
    {
        $transaction = new Transaction(1,'01/01/2019', 'E15');
        $amount = $transaction->getValueAmount();
        $this->assertEquals(15, $amount);
    }

    public function testGetCurrencySymbol()
    {
        $transaction = new Transaction(1,'01/01/2019', 'E15');
        $symbol = $transaction->getCurrencySymbol();
        $this->assertEquals('E', $symbol);
    }
}
