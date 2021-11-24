<?php

namespace App\Models;

class Calculator
{
    /**
     * @var string
     */
    private string $ip;

    /**
     * @var \DateTime
     */
    private \DateTime $timestamp;

    /**
     * @var string
     */
    private string $operation;

    /**
     * @var float
     */
    private float $result;

    /**
     * @var int
     */
    private int $bonus;

    /**
     * @param string $ip
     * @param \DateTime $timestamp
     * @param string $operation
     * @param float $result
     * @param int $bonus
     */
    public function __construct(
        string $ip,
        \DateTime $timestamp,
        string $operation,
        float $result,
        int $bonus
    )
    {

        $this->ip = $ip;
        $this->timestamp = $timestamp;
        $this->operation = $operation;
        $this->result = $result;
        $this->bonus = $bonus;

    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp->getTimestamp();
    }

    /**
     * @return string
     */
    public function getOperation(): string
    {
        return $this->operation;
    }

    /**
     * @return float
     */
    public function getResult(): float
    {
        return $this->result;
    }

    /**
     * @return int
     */
    public function getBonus(): int
    {
        return $this->bonus;
    }

}
