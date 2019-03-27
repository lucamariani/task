<?php

abstract class ACurrencyConverter implements ICurrencyConverter
{
    /** @var ICurrencyWebservice $webService */
    private $webService;
    /** @var ExchangeRatesCache $ratesCache */
    private $ratesCache;

    /**
     * ACurrencyConverter constructor.
     * Allows the use of a cache.
     *
     * @param ICurrencyWebservice   $webService
     * @param ExchangeRatesCache    $ratesCache
     */
    public function __construct(ICurrencyWebservice $webService, IExchangeRatesCache $ratesCache = null)
    {
        $this->webService = $webService;
        $this->ratesCache = $ratesCache;
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
     * @param string $fromCurrency  currency from which convert
     * @param string $toCurrency    currency to convert to
     * @param string $date          currency's day
     * @return float                exchange rate
     * @throws WebserviceException
     */
    protected function getExchangeRate($fromCurrency, $toCurrency, $date)
    {
        // avoid calling web service if not strictly needed
        if(strcmp($fromCurrency, $toCurrency) == 0) return 1;

        // use cache if configured
        if($this->ratesCache)
        {
            // get the rate from cache if available
            $rate = $this->ratesCache->getExchangeRate($fromCurrency, $toCurrency, $date);
            if(!$rate)
            {
                // get the rate from web service
                $rate = $this->webService->getExchangeRate($fromCurrency, $toCurrency, $date);
                // put the rate in cache
                $this->ratesCache->addExchangeRate($fromCurrency, $toCurrency, $date, $rate);
            }
        } else // not using cache
        {
            // get the rate from web service
            $rate = $this->webService->getExchangeRate($fromCurrency, $toCurrency, $date);
        }

        return $rate;
    }



}