<?php

namespace Brain\Games\Cli\DTO;

class Game
{
    public const MIN_NUMBER = 1;
    public const MAX_NUMBER = 100;
    public const MAX_ROUNDS = 3;

    protected int $currentRound = 0;

    protected string $description;

    protected string $question;

    protected string $correctAnswer;

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getCorrectAnswer(): string
    {
        return $this->correctAnswer;
    }

    /**
     * @param string $correctAnswer
     */
    public function setCorrectAnswer(string $correctAnswer): void
    {
        $this->correctAnswer = $correctAnswer;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCurrentRound(): int
    {
        return $this->currentRound;
    }

    /**
     * @param int $currentRound
     */
    public function setCurrentRound(int $currentRound): void
    {
        $this->currentRound = $currentRound;
    }
}
