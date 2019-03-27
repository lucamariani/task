<?php

class TransactionManager extends ATransactionManager
{

    /**
     * TransactionManager constructor.
     * @param IDataSource $dataSource                   the data source to use to get data
     * @param ICurrencyConverter $currencyConverter     the currency converter to use to query for exchange rate
     */
    public function __construct(IDataSource $dataSource, ICurrencyConverter $currencyConverter)
    {
        parent::__construct($dataSource, $currencyConverter);
    }

    /**
     * @param int $customerID   the customer id we want to get the transactions
     * @return Transaction[]    the customer's transactions
     */
    public function getCustomerTransactions(int $customerID) : array
    {
        /** @var Transaction[] $customerTransactions */
        $customerTransactions = array();

        /** @var Transaction[] $storedCustomerTransaction */
        $storedCustomerTransaction = $this->dataSource->findTransactionsByCustomerID($customerID);

        /** @var Transaction $transaction */
        foreach ($storedCustomerTransaction as $transaction)
        {
            $value = $transaction->getValueAmount();
            $currency = $transaction->getCurrencySymbol();
            $date = $transaction->getDate();
            $eurValue = $this->currencyConverter->convert($value, $currency, Currency::EUR, $date);
            $transaction->setValue(Currency::EUR . $eurValue);
            $customerTransactions[] = $transaction;
        }

        return $customerTransactions;
    }
}