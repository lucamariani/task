<?php

class Customer
{
    /** @var int $id */
    private $id;

    /**
     * Return all the transactions for this customer
     *
     * @return Transaction[]
     */
    public function getTransactions()
    {
        /** @var Transaction[] $customerTransactions */
        $customerTransactions = array();
        return $customerTransactions;
    }
}
