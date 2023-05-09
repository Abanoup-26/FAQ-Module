<?php

namespace Abanoub\FAQ\Block\Adminhtml;


use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\Data\Form\FormKey;



class Faqadmin extends Template
{
    protected $_faqModel;
    protected $urlBuilder;
    protected $_formKey;
    protected $_data;


    public function __construct(
        Context $context,
        UrlInterface $urlBuilder,
        FormKey $formKey,
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->_formKey = $formKey;
        parent::__construct($context);
    }

    // to put url to
    public function getFormAction()
    {
        return $this->urlBuilder->getUrl('*/*/save');
    }
    // to get key to the form
    public function getFormKey()
    {
        return $this->_formKey->getFormKey();
    }

 
}
