<?php

namespace Abanoub\FAQ\Controller\Adminhtml\Create;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Abanoub\FAQ\Model\ResourceModel\Faq as FaqResource;

class InlineEdit extends \Magento\Backend\App\Action
{
    protected $jsonFactory;
    private   $faqResource;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        FaqResource $faqResource
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->faqResource = $faqResource;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $faqItems = $this->getRequest()->getParam('items', []);
            if (!count($faqItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($faqItems) as $modelid) {
                    $model = $this->_objectManager->create('Abanoub\FAQ\Model\Faq')->load($modelid);
                    $this->faqResource->load($model, $modelid);
                    try {
                        $faqRepo = $this->_objectManager->create('Abanoub\FAQ\Model\FaqRepository');
                        $faqRepo->updateById($modelid, array_merge($model->getData(), $faqItems[$modelid]));
                    } catch (\Exception $e) {
                        $messages[] = "[Error : {$modelid}]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
