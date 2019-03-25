<?php

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter extends ACurrencyConverter
{

    /**
     * CurrencyConverter constructor.
     * @param ICurrencyWebservice $webService
     */
    public function __construct(ICurrencyWebservice $webService)
    {
        parent::__construct($webService);
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
            $rate = $this->getExchangeRate($amount, $currency, self::EUR, $date);
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
            case (self::EUR):
                return $this->convertToEuro($amount, $fromCurrency, $date);
                break;
            case (self::GBP):
                return $this->convertToGBP($amount, $fromCurrency, $date);
                break;
            case (self::USD):
                return $this->convertToUSD($amount, $fromCurrency, $date);
                break;
        }
    }
}