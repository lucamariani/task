<?php

/**
 * Class CachedCurrencyConverter
 * Convert currency using WebService and cache system
 */
class CachedCurrencyConverter extends ACurrencyConverter
{

    /**
     * CurrencyConverter constructor.
     * @param ICurrencyWebservice $webService
     */
    public function __construct(ICurrencyWebservice $webService)
    {
        // instantiate the cache to be used
        $cache = new ExchangeRatesCache();
        parent::__construct($webService, $cache);
    }



    /**
     * Convert currencies to Euro.
     * Override parent method.
     *
     * @param float $amount     the amount to be converted
     * @param string $currency  the currency from which convert to Euro
     * @param string $date      the currency's day
     * @return float            the amount of Euro | -1 if exception occurs
     */
    protected function convertToEuro($amount, $currency, $date)
    {
        try {
            $rate = $this->getExchangeRate($currency, Currency::EUR, $date);
        } catch (WebserviceException $wex) {
            // log the exception (as we haven't used a logging system just output the exception in output stream)
            echo "An exception occurred while converting currency to EUR.\r\n";
            echo $wex->getMessage();
            // return -1
            return -1;
        }
        return $amount * $rate;
    }


    /**
     * Convert a currency in another currency
     * for a specific exchenge rate's date
     *
     *
     * @param float     $amount         amount to be converted
     * @param string    $fromCurrency   currency that needs to be converted
     * @param string    $toCurrency     currency that needs to be converted to
     * @param string    $date           exchange rate date
     * @return float
     */
    public function convert(float $amount, string $fromCurrency, string $toCurrency, string $date): float
    {
        switch ($toCurrency) {
            case (Currency::EUR):
                return $this->convertToEuro($amount, $fromCurrency, $date);
                break;
            case (Currency::GBP):
                return $this->convertToGBP($amount, $fromCurrency, $date);
                break;
            case (Currency::USD):
                return $this->convertToUSD($amount, $fromCurrency, $date);
                break;
        }

    }
}