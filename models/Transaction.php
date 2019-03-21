<?php

/**
 * Class Transaction
 * This class map a transaction entity
 * Here we assume that a transaction must have always
 * a customer, a date and a value.
 */
class Transaction
{
    /** @var int $customerID */
    private $customerID;
    /** @var string $date */
    private $date;
    /** @var string $value */
    private $value;

    /**
     * Transaction constructor.
     * @param int $customer
     * @param string $date
     * @param string $value
     */
    public function __construct($customer, $date, $value)
    {
        $this->customerID = $customer;
        $this->date = $date;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getCustomerID(): int
    {
        return $this->customerID;
    }

    /**
     * @param int $customerID
     */
    public function setCustomerID(int $customerID): void
    {
        $this->customerID = $customerID;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

}