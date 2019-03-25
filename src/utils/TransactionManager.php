<?php

class TransactionManager extends ATransactionManager
{

    /**
     * TransactionManager constructor.
     */
    public function __construct(IDataSource $dataSource, ICurrencyConverter $currencyConverter)
    {
        parent::__construct($dataSource, $currencyConverter);
    }

    /**
     * @param int $customerID
     * @return Transaction[]
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
            $transaction->setValue($eurValue);
            $customerTransactions[] = $transaction;
        }

        return $customerTransactions;
    }
}