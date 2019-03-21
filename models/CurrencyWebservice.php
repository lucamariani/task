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

    }

    /**
     * This function define a base rate for these currencies
     * and modify it randomly
     *
     * @param $date the date for the rate value
     */
    private function getGBP2EURExchangeRate(string $date)
    {

    }

    /**
     * This function randomize a base rate
     * starting from a date
     *
     * @param float $baseRate
     * @param string $date
     */
    private function randomizeRate(float $baseRate, string $date)
    {
        $currencyDate = DateTime::createFromFormat(self::DATE_FORMAT, $date);
        $currencyDate->getTimestamp();
    }
}