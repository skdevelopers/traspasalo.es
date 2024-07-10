<?php

namespace App\DTO;

/**
 * Class SalesInvoiceDTO
 *
 * Data Transfer Object (DTO) for the SalesInvoice model.
 *
 * @package App\DTO
 */
class SalesInvoiceDTO
{
    /**
     * @var int|null The ID of the sales invoice.
     */
    public ?int $id;

    /**
     * @var int The ID of the user/customer.
     */
    public int $userId;

    /**
     * @var float The total amount of the sales invoice.
     */
    public float $totalAmount;

    /**
     * @var string The date of the sales invoice.
     */
    public string $invoiceDate;

    /**
     * SalesInvoiceDTO constructor.
     *
     * @param int|null $id
     * @param int $userId
     * @param float $totalAmount
     * @param string $invoiceDate
     */
    public function __construct(?int $id, int $userId, float $totalAmount, string $invoiceDate)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->totalAmount = $totalAmount;
        $this->invoiceDate = $invoiceDate;
    }
}
