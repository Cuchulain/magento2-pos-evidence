<?php

namespace JanCejka\PosEvidence\Model\ResourceModel\PosModel;

use JanCejka\PosEvidence\Model\PosModel;
use JanCejka\PosEvidence\Model\ResourceModel\PosResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class PosCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'pos_entity_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(PosModel::class, PosResource::class);
    }
}
