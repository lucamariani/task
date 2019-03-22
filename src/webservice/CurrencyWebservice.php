<?php

/**
 * Dummy web service returning random exchange rates.
 *
 */
class CurrencyWebservice implements ICurrencyWebservice
{

    /**
     * As this is supposed to be an external system
     * here we define our currencies
     */
    const EUR = '€';
    const GBP = '£';
    const USD = '$';

    const DATE_FORMAT = 'd/m/Y';

    /**
     * @todo return random value here for basic currencies like GBP USD EUR (simulates real API)
     *
     */
    public function getExchangeRate($fromCurrency, $toCurrency, $date)
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
     * and modify it randomly
     *
     * @param string $fromCurrency  the currency to which rate is requested
     * @param string $date          the date for the rate value
     * @return float                the exchange rate
     */
    private function getEURExchangeRate(string $fromCurrency, string $date)
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
                //@todo throw exception
                throw new
        }
        // return randomized rate
        return $this->randomizeRate($baseRate, $date);
    }

    private function getGBPExchangeRate(string $fromCurrency, string $date)
    {
        //@todo to be implemented in phase 2
    }

    private function getUSDExchangeRate(string $fromCurrency, string $date)
    {
        //@todo to be implemented in phase 2
    }

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
    private function randomizeRate(float $baseRate, string $date)
    {
        $currencyDate = DateTime::createFromFormat(self::DATE_FORMAT, $date);
        $ts = $currencyDate->getTimestamp();
        $odd = $ts % 2 == 0;
        $randomizedRate = ( $ts % 2 == 0 ) ? pow(10, -10) * $ts + $baseRate : pow(10, -10) * $ts - $baseRate;
        $randomizedRoundRate = abs(round($randomizedRate, 3));

        return $randomizedRoundRate;
    }
}