<?php

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter
{

    private $webService;

    /**
     * Define our currencies
     */
    const EUR = '€';
    const GBP = '£';
    const USD = '$';

    /**
     * CurrencyConverter constructor.
     * @param ICurrencyWebservice $webService
     */
    public function __construct(ICurrencyWebservice $webService)
    {
        $this->webService = $webService;
    }

    /**
     * Convert currencies to Euro.
     *
     * @param float $amount     the amount to be converted
     * @param string $currency  the currency from which convert to Euro
     * @param string $date      the currency's day
     * @return float            the amount of Euro
     */
    public function convertToEuro($amount, $currency, $date)
    {
        return $this->convert($amount, $currency, self::EUR, $date);
    }

    /**
     * Calls the webservice to convert currencies.
     * If the currencies are the same return the amount
     * without calling the webservice.
     *
     * @param float $amount     the amount to be converted
     * @param string $fromCurrency     the currency from which convert
     * @param string $toCurrency       the currency to convert to
     * @param string $date             the currency's day
     * @return float            the amount in converted currency
     */
    private function convert($amount, $fromCurrency, $toCurrency, $date)
    {
        // avoid calling web service if not strictly needed
        if(strcmp($fromCurrency, $toCurrency) == 0) return $amount;
        return $this->webService->getExchangeRate($fromCurrency, $toCurrency, $date);
    }
}