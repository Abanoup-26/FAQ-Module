<?php

namespace Abanoub\FAQ\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Abanoub\FAQ\Api\Data\FaqInterface;


/**
 * Class File
 * @package Abanoub\FAQ\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Faq extends AbstractModel implements FaqInterface, IdentityInterface
{

    /**
     * Cache tag
     * specify the ResourceModel that will be responsible for the database access for our model
     */
    const CACHE_TAG = 'Abanoub_Fresh_FAQ';

    /**
     * @var string
     */
    protected $_cacheTag = 'Abanoub_Fresh_FAQ';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'Abanoub_Fresh_FAQ';
    /**
     * Faq Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Abanoub\FAQ\Model\ResourceModel\Faq');
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getdate(self::ID);
    }
    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }


    /**
     * Get Question
     *
     * @return string|null
     */
    public function getQuestion()
    {
        return $this->getData(Self::QUESTION);
    }
    /**
     * Set Question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question)
    {

        return $this->setData(self::QUESTION, $question);
    }

    /**
     * Get Answer
     *
     * @return string|null
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Set Answer
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }


}
