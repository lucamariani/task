<?php

interface IDataSource
{
    /**
     * @param int $customerID
     * @return Transaction[]
     */
    public function findTransactionsByCustomerID(int $customerID): array;
}