<?php

interface ITransactionManager
{
    /**
     * @param int $customerID
     * @return Transaction[]
     */
    public function getCustomerTransactions(int $customerID);
}