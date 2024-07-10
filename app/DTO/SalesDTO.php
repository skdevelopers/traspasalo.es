<?php

namespace App\DTO;

/**
 * Class SalesDTO
 *
 * Data Transfer Object (DTO) for the Sale model.
 *
 * @package App\DTO
 */
class SalesDTO
{
    /**
     * @var int The ID of the sales record.
     */
    public int $id;

    /**
     * @var string The date of the sales.
     */
    public string $date;

    /**
     * @var int The ID of the user/customer involved in the sales.
     */
    public int $userId; // Changed from partyName

    /**
     * @var int The ID of the product sold.
     */
    public int $productId;

    /**
     * @var int The quantity sold.
     */
    public int $quantity;

    /**
     * @var float The rate per unit.
     */
    public float $rate;

    /**
     * @var float The percentage.
     */
    public float $percent;

    /**
     * @var float The total amount.
     */
    public float $amount;

    /**
     * @var float The previous balance.
     */
    public float $previousBalance;

    /**
     * SalesDTO constructor.
     *
     * @param int $id
     * @param string $date
     * @param int $userId
     * @param int $productId
     * @param int $quantity
     * @param float $rate
     * @param float $percent
     * @param float $amount
     * @param float $previousBalance
     */
    public function __construct(
        int $id,
        string $date,
        int $userId,
        int $productId,
        int $quantity,
        float $rate,
        float $percent,
        float $amount,
        float $previousBalance
    ) {
        $this->id = $id;
        $this->date = $date;
        $this->userId = $userId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->rate = $rate;
        $this->percent = $percent;
        $this->amount = $amount;
        $this->previousBalance = $previousBalance;
    }
}
