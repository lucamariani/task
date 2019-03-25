<?php

class Currency
{
    const EUR = '€';
    const GBP = '£';
    const USD = '$';

    static $currencies = ['EUR' => self::EUR, 'GBP' => self::GBP, 'USD' => self::USD];

    public static function getCurrencySymbolFromName(string $name) : string
    {
        return self::$currencies[$name];
    }

    public static function getCurrencyNameFromSymbol(string $symbol) : string
    {
        return array_search($symbol, self::$currencies);
    }
}