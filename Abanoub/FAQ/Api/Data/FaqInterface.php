<?php

namespace Abanoub\FAQ\Api\Data;

interface FaqInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID = 'Id';
    const QUESTION = 'Question';
    const ANSWER = 'Answer ';
    /**#@-*/

    // Start
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Question
     *
     * @return string|null
     */
    public function getQuestion();

    /**
     * Get Answer
     *
     * @return string|null
     */
    public function getAnswer();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Set Question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question);

    /**
     * Set Answer
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer);
}
