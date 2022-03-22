<?php

namespace JanCejka\PosEvidence\Command\Pos;

use Exception;
use JanCejka\PosEvidence\Api\Data\PosInterface;
use JanCejka\PosEvidence\Model\PosModel;
use JanCejka\PosEvidence\Model\PosModelFactory;
use JanCejka\PosEvidence\Model\ResourceModel\PosResource;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Delete Pos by id Command.
 */
class DeleteByIdCommand
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var PosModelFactory
     */
    private $modelFactory;

    /**
     * @var PosResource
     */
    private $resource;

    /**
     * @param LoggerInterface $logger
     * @param PosModelFactory $modelFactory
     * @param PosResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        PosModelFactory $modelFactory,
        PosResource     $resource
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * Delete Pos.
     *
     * @param int $entityId
     *
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void
    {
        try {
            /** @var PosModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, PosInterface::POS_ID);

            if (!$model->getData(PosInterface::POS_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Pos with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Pos. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Pos.'));
        }
    }
}
