<?php

namespace JanCejka\PosEvidence\Model;

use JanCejka\PosEvidence\Model\ResourceModel\PosResource;
use Magento\Framework\Model\AbstractModel;

class PosModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'pos_entity_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(PosResource::class);
    }
}
