<?php

namespace Abanoub\FAQ\Block;


use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Abanoub\FAQ\Model\ResourceModel\Faq\FaqCollectionFactory;

class Faq extends Template
{
    protected $_faqCollectionFactory = null;
    protected $resourceConnection;
    public function __construct(
        Context $context,
        FaqCollectionFactory $faqCollection,
        \Magento\Framework\App\ResourceConnection $resourceConnection
    ) {
        parent::__construct($context);
        $this->_faqCollectionFactory = $faqCollection;
        $this->resourceConnection = $resourceConnection;
    }
    // list all qquestions
    /**
     * @return List of FAQ[]
     */
    public function getFaq()
    {
        $faq = $this->_faqCollectionFactory->create();
        $faq->addFieldToSelect('*')->load();
        return $faq->getData();
    }

    // to allow view question by it's priority
    public function getTableData()
    {
        $tableName = $this->resourceConnection->getTableName('Fresh_FAQ');
        $select = $this->resourceConnection->getConnection()
            ->select()
            ->from($tableName)
            ->order('Priority DESC');
        $results = $this->resourceConnection->getConnection()->fetchAll($select);
        return $results;
    }
}
