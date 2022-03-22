<?php declare(strict_types=1);

namespace JanCejka\PosEvidence\Block;

use JanCejka\PosEvidence\Model\Data\PosData;
use \Magento\Framework\View\Element\Template;
use JanCejka\PosEvidence\Model\ResourceModel\View\Collection as ViewCollection;
use JanCejka\PosEvidence\Model\ResourceModel\View\CollectionFactory as ViewCollectionFactory;

class Collection extends Template
{
    /**
     * CollectionFactory
     * @var null|CollectionFactory
     */
    protected $_viewCollectionFactory = null;

    public function __construct(
        Template\Context $context,
        ViewCollectionFactory $viewCollectionFactory,
        array $data = []
    ) {
        $this->_viewCollectionFactory  = $viewCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return PosData[]
     */
    public function getCollection()
    {
        /** @var ViewCollection $viewCollection */
        $viewCollection = $this->_viewCollectionFactory ->create();
        $viewCollection->addFieldToSelect('*')->load();
        return $viewCollection->getItems();
    }
}
?>
