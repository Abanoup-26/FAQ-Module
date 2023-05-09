<?php

namespace Abanoub\FAQ\Model\ResourceModel\Faq;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class FaqCollection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     * we should pass our Model & Resource Model in init
     */
    protected $_idFieldName = 'Id';
    public function __construct()
    {

        $this->_init(\Abanoub\FAQ\Model\Faq::class, \Abanoub\FAQ\Model\ResourceModel::class);
    }
}
