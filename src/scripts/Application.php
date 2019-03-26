<?php

/**
 * Class Application
 * This class manages the application startup.
 */
class Application
{
    /**
     * The customer id the we need to show
     * @var int $customerID
     */
    private $customerID;

    /**
     * The data source to use
     * @var IDataSource $dataSource
     */
    private $dataSource;

    /**
     * The web service to use
     * @var ICurrencyWebservice $currencyWebservice
     */
    private $currencyWebservice;

    /**
     * The converter to use
     * @var ICurrencyConverter $currencyConverter
     */
    private $currencyConverter;

    /**
     * The transaction manager to use
     * @var ITransactionManager $transactionManager
     */
    private $transactionManager;

    /**
     * Application constructor.
     * @param int $customerID                           The customer id the we need to show
     * @param IDataSource $dataSource                   The data source to use
     * @param ICurrencyWebservice $currencyWebservice   The web service to use
     * @param ICurrencyConverter $currencyConverter     The converter to use
     */
    public function __construct(int $customerID, IDataSource $dataSource, ICurrencyWebservice $currencyWebservice, ICurrencyConverter $currencyConverter)
    {
        $this->customerID = $customerID;
        $this->dataSource = $dataSource;
        $this->currencyWebservice = $currencyWebservice;
        $this->currencyConverter = $currencyConverter;
        // create a transaction manager
        $this->transactionManager = new TransactionManager($dataSource, $currencyConverter);
    }

    /**
     * This is the startup method.
     */
    public function execute(): void {
        $transactions = $this->transactionManager->getCustomerTransactions($this->customerID);

        // if no transactions exists for this customer exit providing a meaningful message
        if(sizeof($transactions) == 0)
        {
            echo "\r\nThere are not transactions for customer with id $this->customerID\r\n";
            exit(0);
        }

            /** @var Transaction $transaction */
        foreach ($transactions as $transaction) {
            echo $transaction->outputReport();
        }
    }

}