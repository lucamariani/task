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

}