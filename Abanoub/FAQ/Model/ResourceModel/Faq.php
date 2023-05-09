<?php

namespace Abanoub\FAQ\Model\ResourceModel;


class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{


    protected function _construct()
    {
        $this->_init('Fresh_FAQ', 'Id');
    }
}
