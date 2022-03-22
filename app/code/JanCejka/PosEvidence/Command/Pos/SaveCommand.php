<?php

namespace JanCejka\PosEvidence\Command\Pos;

use Exception;
use JanCejka\PosEvidence\Api\Data\PosInterface;
use JanCejka\PosEvidence\Model\PosModel;
use JanCejka\PosEvidence\Model\PosModelFactory;
use JanCejka\PosEvidence\Model\ResourceModel\PosResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * Save Pos Command.
 */
class SaveCommand
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
     * Save Pos.
     *
     * @param PosInterface $pos
     *
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(PosInterface $pos): int
    {
        try {
            /** @var PosModel $model */
            $model = $this->modelFactory->create();
            $model->addData($pos->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(PosInterface::POS_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Pos. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Pos.'));
        }

        return (int)$model->getData(PosInterface::POS_ID);
    }
}
