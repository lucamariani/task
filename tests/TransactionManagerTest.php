<?php

use PHPUnit\Framework\TestCase;

class TransactionManagerTest extends TestCase
{

    private $customerid = 1;

    public function testReturnTransactionObjects()
    {
        $ds = new CSVDataSource('data.csv', ';');
        $webservice = new CurrencyWebservice();
        $converter = new CachedCurrencyConverter($webservice);
        $transactionManager = new TransactionManager($ds, $converter);
        $transactions = $transactionManager->getCustomerTransactions($this->customerid);

        $this->assertContainsOnlyInstancesOf('Transaction', $transactions);

        return $transactions;
    }

    /**
     * Test if the returned transactions are of the right customer
     * @depends testReturnTransactionObjects
     * @param Transaction[] $transactions
     */
    public function testReturnCustomerTransactions(array $transactions)
    {
        /** @var Transaction $transaction */
        foreach ($transactions as $transaction)
        {
            $this->assertEquals($this->customerid, $transaction->getCustomerID());
        }
    }

    /**
     * @depends testReturnTransactionObjects
     * @param Transaction[] $transactions
     */
    public function testReturnEuroCurrency(array $transactions)
    {
        /** @var Transaction $transaction */
        foreach ($transactions as $transaction)
        {
            $this->assertStringStartsWith(Currency::EUR, $transaction->getValue());
        }
    }
}
