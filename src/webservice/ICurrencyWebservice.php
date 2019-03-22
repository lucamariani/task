<?php

interface ICurrencyWebservice
{
    /**
     * Return the exchange rate from two currencies
     * for a particular day
     *
     * @param string $fromCurrency
     * @param string $toCurrency
     * @param string $date
     * @return float
     */
    function getExchangeRate($fromCurrency, $toCurrency, $date);
}