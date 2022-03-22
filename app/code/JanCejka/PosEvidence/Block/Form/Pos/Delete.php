<?php

namespace JanCejka\PosEvidence\Block\Form\Pos;

use JanCejka\PosEvidence\Api\Data\PosInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Delete entity button.
 */
class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Delete button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            'Delete',
            'delete',
            'deleteConfirm(\''
            . __('Are you sure you want to delete this pos?')
            . '\', \'' . $this->getUrl(
                '*/*/delete',
                [PosInterface::POS_ID => $this->getPosId()]
            ) . '\')',
            [],
            20
        );
    }
}
