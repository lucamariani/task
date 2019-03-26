<?php

/**
 * Class ExchangeRatesCache
 * This class implements a simple cache for exchange rates
 * in order to prevent not needed web service calls.
 *
 * It uses a multidimensional array:
 * an outer associative array of "from currency" symbol
 * a middle associative array of "to currency" symbol
 * an inner associative array of date with rate as value
 */
class ExchangeRatesCache implements IExchangeRatesCache
{
    /** @var array $exchangeRatesCache */
    private $exchangeRatesCache;

    /**
     * ExchangeRatesCache constructor.
     */
    public function __construct()
    {
        $this->exchangeRatesCache = array();
    }

    /**
     * Return the cached rate or null if not in cache
     *
     * @param string $fromCurrencySymbol
     * @param string $date
     * @return float|null
     */
    public function getExchangeRate(string $fromCurrencySymbol, string $toCurrencySymbol, string $date): ?float
    {
        $rate = null;
        if(array_key_exists($fromCurrencySymbol, $this->exchangeRatesCache))
        {
            $toCurrencyArray = $this->exchangeRatesCache[$fromCurrencySymbol];
            if(array_key_exists($toCurrencySymbol, $toCurrencyArray))
            {
                $dateArray = $toCurrencyArray[$toCurrencySymbol];
                if(array_key_exists($date, $dateArray))
                {
                    $rate = $dateArray[$date];
                }
            }

        }

        return $rate;
    }

    /**
     * Add the rate in cache
     *
     * @param string $fromCurrencySymbol
     * @param string $toCurrencySymbol
     * @param string $date
     * @param float $rate
     */
    public function addExchangeRate(string $fromCurrencySymbol, string $toCurrencySymbol, string $date, float $rate): void
    {
        $this->exchangeRatesCache[$fromCurrencySymbol][$toCurrencySymbol][$date] = $rate;
    }
}