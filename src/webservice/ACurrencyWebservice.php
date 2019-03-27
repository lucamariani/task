<?php

/**
 * Class ACurrencyWebservice
 * This class helps CurrencyWebservice implementations
 * implementing
 */
abstract class ACurrencyWebservice implements ICurrencyWebservice
{
    /**
     * As this is supposed to be an external system
     * here we define our currencies
     * (for convenience we use Currency class)
     */
    const EUR = Currency::EUR;
    const GBP = Currency::GBP;
    const USD = Currency::USD;

    const DATE_FORMAT = 'd/m/Y';

    /**
     * Dummy methods to show how provide
     * base implementation that can be
     * override by extending classes
     *
     * @param string $fromCurrency
     * @param string $date
     * @return int
     */
    protected function getEURExchangeRate(string $fromCurrency, string $date)
    {
        return $this->getRateBaseImplementation($fromCurrency, $date);
    }

    protected function getGBPExchangeRate(string $fromCurrency, string $date)
    {
        return $this->getRateBaseImplementation($fromCurrency, $date);
    }

    protected function getUSDExchangeRate(string $fromCurrency, string $date)
    {
        return $this->getRateBaseImplementation($fromCurrency, $date);
    }

    /**
     * This is a dummy method providing
     * a base implementation that could be override
     * by classes extending this class.
     * (there is nothing implemented)
     *
     * @param string $fromCurrency  currency that needs to be converted
     * @param string $date          date for the rate value
     * @return float                exchange rate
     */
    private function getRateBaseImplementation(string $fromCurrency, string $date)
    {
        return 1;
    }


    // COMMON UTILITIES

    /**
     * This function randomize a base rate
     * with a simple algorithm (just for testing purpose):
     *
     * get the timestamp from date
     * get the power of 10 with exp -10 of timestamp
     * if timestamp is odd add the power result to baseRate, otherwise subtract it t baseRate
     *
     * @param float $baseRate   the base rate
     * @param string $date      the date to get the rate for
     * @return float            the exchange rate
     */
    protected function randomizeRate(float $baseRate, string $date)
    {
        $currencyDate = DateTime::createFromFormat(self::DATE_FORMAT, $date);
        $ts = $currencyDate->getTimestamp();
        $odd = $ts % 2 == 0;
        $randomizedRate = ( $ts % 2 == 0 ) ? pow(10, -10) * $ts + $baseRate : pow(10, -10) * $ts - $baseRate;
        $randomizedRoundRate = abs(round($randomizedRate, 3));

        return $randomizedRoundRate;
    }

}