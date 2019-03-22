<?php

interface IDataSource
{
    public function findTransactionsByCustomerID(int $customerID);
}