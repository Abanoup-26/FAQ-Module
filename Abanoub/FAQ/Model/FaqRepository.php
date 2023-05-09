<?php

namespace Abanoub\FAQ\Model;

use Abanoub\FAQ\Model\Faq;
use Abanoub\FAQ\Model\ResourceModel\Faq as FaqResource;
use Magento\Framework\ObjectManagerInterface;

class FaqRepository
{
    protected $faqModel;
    protected $faqResource;
    protected $_objectManager;

    public function __construct(
        Faq $faqModel,
        FaqResource $faqResource,
        ObjectManagerInterface $objectManager
    ) {
        $this->faqModel = $faqModel;
        $this->faqResource = $faqResource;
        $this->_objectManager = $objectManager;
    }
    // {{SAVE}} A ResourseModel will save new model
    public function save(Faq $faqmodel)
    {
        return $this->faqResource->save($faqmodel);
    }

    // {{DELETE}} delete the specific row by the id
    public function deleteById($faqId)
    {
        $connection = $this->faqResource->getConnection();
        $myTable = $this->faqResource->getMainTable();
        $connection->delete(
            $myTable,
            ['Id = ?' => $faqId]
        );
        return true;
    }

    /**
     * @var Id
     * @var object Data
     * to update data in the selected id
     */

    public function updateById($faqId, $newData)
    {
        $connection = $this->faqResource->getConnection();
        $myTable = $this->faqResource->getMainTable();

        // build the update data array
        $updateData = [];
        foreach ($newData as $key => $value) {
            $updateData[$key] = $value;
        }

        // perform the update
        $result = $connection->update(
            $myTable,
            $updateData,
            ['Id = ?' => $faqId]
        );

        if ($result === false) {
            return false;
        } else {
            return true;
        }
    }
}
