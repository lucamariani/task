<?php

abstract class ACurrencyConverter implements ICurrencyConverter
{
    /** @var ICurrencyWebservice $webService */
    private $webService;

    /**
     * Define our currencies
     */
    const EUR = '€';
    const GBP = '£';
    const USD = '$';

    /**
     * ACurrencyConverter constructor.
     * @param ICurrencyWebservice $webService
     */
    public function __construct(ICurrencyWebservice $webService)
    {
        $this->webService = $webService;
    }

    /**
     * These are dummy methods providing
     * a base implementation that could be override
     * by classes extending this class.
     * (there is nothing implemented)
     *
     * @param $amount
     * @param $currency
     * @param $date
     * @return float
     */
    protected function convertToEuro($amount, $currency, $date)
    {
        return 1;
    }

    protected function convertToGBP($amount, $currency, $date)
    {
        return 1;
    }

    protected function convertToUSD($amount, $currency, $date)
    {
        return 1;
    }

    /**
     * Calls the webservice to get the conversion rate
     * for these currencies in this date.
     * If the currencies are the same return the amount
     * without calling the webservice.
     *
     * @param float $amount the amount to be converted
     * @param string $fromCurrency the currency from which convert
     * @param string $toCurrency the currency to convert to
     * @param string $date the currency's day
     * @return float            the amount in converted currency
     * @throws WebserviceException
     */
    protected function getExchangeRate($amount, $fromCurrency, $toCurrency, $date)
    {
        // avoid calling web service if not strictly needed
        if(strcmp($fromCurrency, $toCurrency) == 0) return 1;
        $exchangeRate = $this->webService->getExchangeRate($fromCurrency, $toCurrency, $date);
    }

}