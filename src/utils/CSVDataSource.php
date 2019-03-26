<?php

class CSVDataSource extends ADataSource
{
    /**
     * The CSV file path
     * @var string $filePath
     */
    private $filePath;

    /**
     * The CSV delimiter
     * @var string $delimiter
     */
    private $delimiter;

    /**
     * Skip reading first row if true
     * @var bool $skipFirstRow
     */
    private $skipFirstRow;

    /**
     * Control skipping first row
     * @var int $offset
     */
    private $offset;

    /**
     * CSVDataSource constructor.
     * @param string $filePath      csv file full path
     * @param string $delimiter     csv delimiter
     * @param bool $skipFirstRow    skip first row on true
     */
    public function __construct(string $filePath, string $delimiter = ",", bool $skipFirstRow = true)
    {
        $this->filePath = $filePath;
        $this->delimiter = $delimiter;
        $this->offset = ($skipFirstRow ? 1 : 0);
    }

    /**
     * @param int $customerID
     * @return Transaction[]
     */
    public function findTransactionsByCustomerID(int $customerID): array
    {
        /** @var Transaction[] $customerTransactions */
        $customerTransactions = array();
        $file = new SplFileObject($this->filePath);
        $file->setCsvControl($this->delimiter);
        $file->setFlags(\SplFileObject::READ_CSV);
        $it = new LimitIterator($file, $this->offset);

        foreach( $it as $row ) {
            if($row[0] == $customerID)
            {
                $customerTransactions[] = new Transaction($row[0],$row[1],$row[2]);
            }
        }

        return $customerTransactions;
    }

}