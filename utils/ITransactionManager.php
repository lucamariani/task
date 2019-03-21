<?php

interface ITransactionManager
{
    public function getCustomerTransactions(int $customerID);
}