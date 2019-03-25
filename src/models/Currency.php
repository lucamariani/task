<?php

class Currency
{
    static $currencies = ['EUR' => '€', 'GBP' => '£', 'USD' => '$'];

    public static function getCurrencySymbolFromName(string $name) : string
    {
        return self::$currencies[$name];
    }

    public static function getCurrencyNameFromSymbol(string $symbol) : string
    {
        return array_search($symbol, self::$currencies);
    }
}