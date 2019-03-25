<?php

/**
 * Class CurrencyWebservice
 *
 * This class implements a dummy webservice
 * that provide a proper implementation
 * for EUR exchange rate.
 */
class CurrencyWebservice extends ACurrencyWebservice
{

    /**
     *
     * Return random value here for basic currencies like GBP USD EUR (simulates real API)
     *
     * @param string $fromCurrency  currency that needs to be converted
     * @param string $toCurrency    currency that needs to be converted to
     * @param string $date          exchange rate date
     * @return float                exchange rate
     * @throws WebserviceException  if no rate is available for this currency
     */
    public function getExchangeRate($fromCurrency, $toCurrency, $date) : float
    {
        switch ($toCurrency) {
            case (self::EUR):
                return $this->getEURExchangeRate($fromCurrency, $date);
                break;
            case (self::GBP):
                return $this->getGBPExchangeRate($fromCurrency, $date);
                break;
            case (self::USD):
                return $this->getUSDExchangeRate($fromCurrency, $date);
                break;
        }
    }

    /**
     * This function define a base rate for these currencies
     * and modify it randomly.
     * (it overrides base implementation as defined in parent class)
     *
     * @param string $fromCurrency  currency to which rate is requested
     * @param string $date          date for the rate value
     * @return float                exchange rate
     * @throws WebserviceException  if no rate is available for this currency
     */
    protected function getEURExchangeRate(string $fromCurrency, string $date)
    {
        switch ($fromCurrency) {
            case (self::GBP):
                /** @var float $baseRate */
                $baseRate = 1.16;
                break;
            case (self::USD):
                /** @var float $baseRate */
                $baseRate = 0.88;
                break;
            default:
                //throws exception
                throw new WebserviceException("Exchange rate from $fromCurrency currency to EUR is not supported.");
        }
        // return randomized rate
        return $this->randomizeRate($baseRate, $date);
    }

}