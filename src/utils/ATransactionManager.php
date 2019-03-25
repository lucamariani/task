<?php

abstract class ATransactionManager implements ITransactionManager
{
    /** @var IDataSource $dataSource */
    protected $dataSource;

    /** @var ICurrencyConverter $converter */
    protected $currencyConverter;

    /**
     * ATransactionManager constructor.
     * @param IDataSource $dataSource
     * @param ICurrencyConverter $currencyConverter
     */
    public function __construct(IDataSource $dataSource, ICurrencyConverter $currencyConverter)
    {
        $this->dataSource = $dataSource;
        $this->currencyConverter = $currencyConverter;
    }

    /**
     * Get the currency for a transaction's value.
     * The value is the first character of value string.
     *
     * @param $value    value from which get the currency
     * @return string   value's currency
     */
    protected function getCurrencyFromValue($value)
    {
        return "";
    }
}