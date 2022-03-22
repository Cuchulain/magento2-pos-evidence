<?php

namespace JanCejka\PosEvidence\Controller\Adminhtml\Pos;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Pos backend index (list) controller.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'JanCejka_PosEvidence::management';

    /**
     * Execute action based on request and return result.
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('JanCejka_PosEvidence::management');
        $resultPage->addBreadcrumb(__('Pos'), __('Pos'));
        $resultPage->addBreadcrumb(__('Manage Poss'), __('Manage Poss'));
        $resultPage->getConfig()->getTitle()->prepend(__('Pos List'));

        return $resultPage;
    }
}
