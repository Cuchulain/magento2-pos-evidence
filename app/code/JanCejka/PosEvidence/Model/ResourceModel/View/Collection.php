<?php declare(strict_types=1);

namespace JanCejka\PosEvidence\Model\ResourceModel\View;

use JanCejka\PosEvidence\Model\PosModel;
use JanCejka\PosEvidence\Model\ResourceModel\PosResource;
use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init(PosModel::class, PosResource::class);
    }
}