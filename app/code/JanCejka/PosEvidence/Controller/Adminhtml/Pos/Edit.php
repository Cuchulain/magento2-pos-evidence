<?php

namespace JanCejka\PosEvidence\Controller\Adminhtml\Pos;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Edit Pos entity backend controller.
 */
class Edit extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'JanCejka_PosEvidence::management';

    /**
     * Edit Pos action.
     *
     * @return Page|ResultInterface
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('JanCejka_PosEvidence::management');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Pos'));

        return $resultPage;
    }
}
