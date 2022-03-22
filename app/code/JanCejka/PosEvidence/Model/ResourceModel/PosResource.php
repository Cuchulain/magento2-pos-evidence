<?php

namespace JanCejka\PosEvidence\Model\ResourceModel;

use JanCejka\PosEvidence\Api\Data\PosInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PosResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'pos_entity_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('pos_entity', PosInterface::POS_ID);
        $this->_useIsObjectNew = true;
    }
}
