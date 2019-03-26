<?php

use PHPUnit\Framework\TestCase;

class CSVDataSourceTest extends TestCase
{

    public function testParsingFile()
    {
        $ds = new CSVDataSource('data.csv', ';');
        $transactions = $ds->findTransactionsByCustomerID(2);
        $this->assertContainsOnlyInstancesOf('Transaction', $transactions);

        return $transactions;
    }
}
