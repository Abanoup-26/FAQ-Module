<?php

namespace Abanoub\FAQ\Controller\Adminhtml\Create;

use Magento\Backend\App\Action\Context;
use Abanoub\FAQ\Model\FaqRepository;
use Abanoub\FAQ\Model\Faq as Faq;
use Abanoub\FAQ\Model\ResourceModel\Faq as FaqResource;



class Delete extends \Magento\Backend\App\Action
{
    protected $_faqRepository;
    protected $_faqModel;
    protected $_faqResource;

    public function __construct(Context $context, FaqRepository $faqRepository, Faq $faqModel, FaqResource $faqResource)
    {
        $this->_faqRepository = $faqRepository;
        $this->_faqModel = $faqModel;
        $this->_faqResource = $faqResource;
        parent::__construct($context);
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        try {
            // Delete the Faq data using the Faq Repository model
            $this->_faqRepository->deleteById($id);
            $this->messageManager->addSuccessMessage(__('Selected Row has been Deleted .'));
            $this->_redirect('*/*/index');
            return;
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong while saving the Faq.'));
            return;
        }
    }
}
