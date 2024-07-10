<?php

namespace App\DTO;

/**
 * Class ProductDTO
 *
 * Data Transfer Object (DTO) for the Product model.
 *
 * @package App\DTO
 */
class ProductDTO
{
    /**
     * @var int|null The ID of the product.
     */
    public ?int $id;

    /**
     * @var int|null The ID of the category the product belongs to.
     */
    public ?int $category_id;

    /**
     * @var int|null The ID of the subcategory the product belongs to.
     */
    public ?int $subcategory_id;

    /**
     * @var string The name of the product.
     */
    public string $name;

    /**
     * @var string The description of the product.
     */
    public string $description;

    /**
     * @var int The quantity of the product.
     */
    public int $quantity;

    /**
     * @var string The unit of measurement for the product.
     */
    public string $unit;

    /**
     * @var float The unit price of the product.
     */
    public float $unit_price;

    /**
     * ProductDTO constructor.
     *
     * @param int|null $id
     * @param int|null $category_id
     * @param int|null $subcategory_id
     * @param string $name
     * @param string $description
     * @param int $quantity
     * @param string $unit
     * @param float $unit_price
     */
    public function __construct(
        ?int $id,
        ?int $category_id,
        ?int $subcategory_id,
        string $name,
        string $description,
        int $quantity,
        string $unit,
        float $unit_price
    ) {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->subcategory_id = $subcategory_id;
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->unit_price = $unit_price;
    }
}
