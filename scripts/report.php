<?php 

//TODO change with the requested from CLI
$customerID = 1;

// create a data source for transactions
$dataSource = new CSVDataSource();

// create a TransactionManager instance and inject the created dataSource
$transactionManager = new TransactionManager($dataSource);

// simulates the configuration of a WebServices by creating an instance of CurrencyWebservice
$currencyWebService = new CurrencyWebservice();

function writeReports($customerID, ITransactionManager $transactionManager)
{
    $transactions = $transactionManager->getCustomerTransactions($customerID);
    /** @var Transaction $transaction */
    foreach ($transactions as $transaction) {

    }
}

