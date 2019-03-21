<?php 

//TODO change with the requested from CLI
$customerID = 1;

$dataSource = new CSVDataSource();
$transactionManager = new TransactionManager($dataSource);

$transactionManager->getCustomerTransactions($customerID);

foreach ($customer->getTransactions() as $transaction) {

}
