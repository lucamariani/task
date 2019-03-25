<?php

interface ICurrencyConverter
{
    /**
     * Convert a currency in another currency
     * for a specific exchange rate's date
     *
     * @param float     $amount         amount to be converted
     * @param string    $fromCurrency   currency that needs to be converted
     * @param string    $toCurrency     currency that needs to be converted to
     * @param string    $date           exchange rate date
     * @return float
     */
    public function convert(float $amount, string $fromCurrency, string $toCurrency, string $date) : float;
}