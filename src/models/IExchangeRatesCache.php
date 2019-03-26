<?php

/**
 * Interface IExchangeRatesCache
 */
interface IExchangeRatesCache
{
    /**
     * Return the cached rate or null if not in cache
     *
     * @param string $fromCurrencySymbol
     * @param string $date
     * @return float|null
     */
    public function getExchangeRate(string $fromCurrencySymbol, string $toCurrencySymbol, string $date): ?float;

    /**
     * Add the rate in cache
     *
     * @param string $fromCurrencySymbol
     * @param string $toCurrencySymbol
     * @param string $date
     * @param float $rate
     */
    public function addExchangeRate(string $fromCurrencySymbol, string $toCurrencySymbol, string $date, float $rate): void;
}