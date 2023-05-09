<?php

namespace Abanoub\FAQ\Controller\Adminhtml\Create;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Abanoub\FAQ\Model\FaqRepository;
use Abanoub\FAQ\Model\FaqFactory as Faq;

class Save extends Action
{
    protected $_faqRepository;
    protected $_faqModel;

    public function __construct(Context $context, FaqRepository $faqRepository, Faq $faqModel)
    {
        $this->_faqRepository = $faqRepository;
        $this->_faqModel = $faqModel;
        parent::__construct($context);
    }

    /**
     * Save Faq data action
     */
    public function execute()
    {
        // Validate form inputs here {}
        // var_dump($data) to see what will be used
        $data = $this->getRequest()->getParams();
        if (!$data) {
            $this->_redirect('*/*/index');
            return;
        }

        if (!$this->isValid($data)) {

            try {
                // Set an error message
                $errorMessage = "Only alphabets , numbers and whitespace are allowed ";
                $this->messageManager->addErrorMessage($errorMessage);

                // Redirect to the form page
                $this->_redirect('*/*/newfaq');
                return;
            } catch (\Throwable $th) {
                //
            }
        } else {
            // Create a new Faq model object
            $faqmodel = $this->_faqModel->create();
            // Set Faq model data from the form input
            $faqmodel->setData($data);

            try {
                // Save the Faq data using the Faq resource model
                $this->_faqRepository->save($faqmodel);
                $this->messageManager->addSuccessMessage(__('Faq has been saved.'));
                $this->_redirect('*/*/index');
                return;
            } catch (\Exception $e) {
                // $this->messageManager->addErrorMessage(__('Something went wrong while saving the Faq.'));
                // $this->_redirect('*/*/edit', ['id' => $faqmodel->getId()]);
                // return;
            }
        }
    }
    // Form Validation
    private function isValid($Data)
    {
        $valid = false;
        // Form Validation
        $question = $Data['Question'];
        $answer = $Data['Answer'];
        // this reg exp alphabet and numbers and allow one space before ? to match
        if (preg_match("/^[a-zA-Z0-9]+(\s+[a-zA-Z0-9]+)*\s\?$/", $question) && preg_match("/^[a-zA-Z0-9]+(\s+[a-zA-Z0-9]+)*$/", $answer)) {
            $valid = true;
            // var_dump($valid);
            // die();
        } else {
            // var_dump($valid);
            // die();
            $valid = false;
        }
        return $valid;
    }
}
