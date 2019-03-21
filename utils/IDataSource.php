<?php

interface IDataSource
{
    public function getCustomerTransactions(int $customerID);
}