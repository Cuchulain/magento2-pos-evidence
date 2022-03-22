<?php

namespace JanCejka\PosEvidence\Api\Data;

interface PosInterface
{
    /**
     * String constants for property names
     */
    const POS_ID = "pos_id";
    const NAME = "name";
    const ADDRESS = "address";
    const IS_AVAILABLE = "is_available";

    /**
     * Getter for PosId.
     *
     * @return int|null
     */
    public function getPosId(): ?int;

    /**
     * Setter for PosId.
     *
     * @param int|null $posId
     *
     * @return void
     */
    public function setPosId(?int $posId): void;

    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Setter for Name.
     *
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void;

    /**
     * Getter for Address.
     *
     * @return string|null
     */
    public function getAddress(): ?string;

    /**
     * Setter for Address.
     *
     * @param string|null $address
     *
     * @return void
     */
    public function setAddress(?string $address): void;

    /**
     * Getter for IsAvailable.
     *
     * @return bool|null
     */
    public function getIsAvailable(): ?bool;

    /**
     * Setter for IsAvailable.
     *
     * @param bool|null $isAvailable
     *
     * @return void
     */
    public function setIsAvailable(?bool $isAvailable): void;
}
