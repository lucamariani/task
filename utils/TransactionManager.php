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

    public function getCustomerTransactions(int $customerID)
    {
        // TODO: Implement getCustomerTransactions() method.
    }
}