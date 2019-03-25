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
    public function __construct($customerID, $date, $value)
    {
        $this->customerID = $customerID;
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

    /**
     * Return the value's currency
     * @return string|null
     */
    public function getCurrencySymbol(): ?string
    {
        if($this->value)
        {
            return substr($this->value, 0, 1);
        }
        return null;
    }

    /**
     * Return the numeric value
     * @return float|null
     */
    public function getValueAmount(): ?float
    {
        if($this->value)
        {
            return floatval(substr($this->value, 1));
        }
        return null;
    }
}