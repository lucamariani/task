<?php

class TransactionManager extends ATransactionManager
{

    /**
     * TransactionManager constructor.
     */
    public function __construct(IDataSource $dataSource)
    {
        parent::__construct($dataSource);
    }

    /**
     * @param int $customerID
     * @return Transaction[]
     */
    public function getCustomerTransactions(int $customerID)
    {
        return $this->dataSource->findTransactionsByCustomerID($customerID);
    }
}