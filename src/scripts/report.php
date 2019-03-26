<?php

ini_set( 'default_charset', 'UTF-8' );

require __DIR__ . '/../../vendor/autoload.php';

//TODO change with the requested from CLI
$customerID = 2;

// create a data source for transactions
$dataSource = new CSVDataSource('data.csv', ";");

// simulates the configuration of a WebServices by creating an instance of CurrencyWebservice
$currencyWebService = new CurrencyWebservice();

// create a CurrencyConverter instance
$currencyConverter = new CachedCurrencyConverter($currencyWebService);

// create a TransactionManager instance and inject the created dataSource
$transactionManager = new TransactionManager($dataSource, $currencyConverter);

function writeReports($customerID, ITransactionManager $transactionManager)
{
    $transactions = $transactionManager->getCustomerTransactions($customerID);
    /** @var Transaction $transaction */
    foreach ($transactions as $transaction) {
        echo $transaction->outputReport();
    }
}

writeReports($customerID, $transactionManager);

