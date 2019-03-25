<?php

class TransactionManager extends ATransactionManager
{

    /**
     * TransactionManager constructor.
     */
    public function __construct(IDataSource $dataSource, ICurrencyConverter $currencyConverter)
    {
        parent::__construct($dataSource);
    }

    /**
     * @param int $customerID
     * @return Transaction[]
     */
    public function getCustomerTransactions(int $customerID) : array
    {
        $customerTransactions = array();
        $storedCustomerTransaction = $this->dataSource->findTransactionsByCustomerID($customerID);

        return $customerTransactions;
    }
}