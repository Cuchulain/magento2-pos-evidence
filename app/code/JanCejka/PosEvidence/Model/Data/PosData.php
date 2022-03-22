<?php

namespace JanCejka\PosEvidence\Model\Data;

use JanCejka\PosEvidence\Api\Data\PosInterface;
use Magento\Framework\DataObject;

class PosData extends DataObject implements PosInterface
{
    /**
     * @inheritDoc
     */
    public function getPosId(): ?int
    {
        return $this->getData(self::POS_ID) === null ? null
            : (int)$this->getData(self::POS_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPosId(?int $posId): void
    {
        $this->setData(self::POS_ID, $posId);
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(?string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getAddress(): ?string
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setAddress(?string $address): void
    {
        $this->setData(self::ADDRESS, $address);
    }

    /**
     * @inheritDoc
     */
    public function getIsAvailable(): ?bool
    {
        return $this->getData(self::IS_AVAILABLE) === null ? null
            : (bool)$this->getData(self::IS_AVAILABLE);
    }

    /**
     * @inheritDoc
     */
    public function setIsAvailable(?bool $isAvailable): void
    {
        $this->setData(self::IS_AVAILABLE, $isAvailable);
    }
}
