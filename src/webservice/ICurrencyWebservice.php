<?php

interface ICurrencyWebservice
{
    /**
     * Return the exchange rate from two currencies
     * for a particular day
     *
     * @param string $fromCurrency  currency that needs to be converted
     * @param string $toCurrency    currency that needs to be converted to
     * @param string $date          exchange rate date
     * @return float                exchange rate
     * @throws WebserviceException  if no rate is available for this currency
     */
    function getExchangeRate($fromCurrency, $toCurrency, $date) : float;
}