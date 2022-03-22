<?php

namespace JanCejka\PosEvidence\Mapper;

use JanCejka\PosEvidence\Api\Data\PosInterface;
use JanCejka\PosEvidence\Api\Data\PosInterfaceFactory;
use JanCejka\PosEvidence\Model\PosModel;
use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Converts a collection of Pos entities to an array of data transfer objects.
 */
class PosDataMapper
{
    /**
     * @var PosInterfaceFactory
     */
    private $entityDtoFactory;

    /**
     * @param PosInterfaceFactory $entityDtoFactory
     */
    public function __construct(
        PosInterfaceFactory $entityDtoFactory
    )
    {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|PosInterface[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var PosModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var PosInterface|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
