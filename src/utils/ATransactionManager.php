<?php

abstract class ATransactionManager implements ITransactionManager
{
    /** @var IDataSource $dataSource */
    protected $dataSource;

    /**
     * ATransactionManager constructor.
     * @param IDataSource $dataSource
     */
    public function __construct(IDataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }
}