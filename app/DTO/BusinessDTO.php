<?php

namespace App\DTO;

/**
 * Class BusinessDTO
 *
 * Data Transfer Object (DTO) for the Business model.
 *
 * @package App\DTO
 */
class BusinessDTO
{
    /**
     * @var int|null The ID of the business.
     */
    public ?int $id;

    /**
     * @var int The ID of the category the business belongs to.
     */
    public int $category_id;

    /**
     * @var string The title of the business.
     */
    public string $business_title;

    /**
     * @var string The description of the business.
     */
    public string $description;

    /**
     * @var string The check-in time for the business.
     */
    public string $check_in;

    /**
     * @var string The check-out time for the business.
     */
    public string $check_out;

    /**
     * @var string The age restriction for the business.
     */
    public string $age_restriction;

    /**
     * @var string The pets permission for the business.
     */
    public string $pets_permission;

    /**
     * @var string The location of the business.
     */
    public string $location;

    /**
     * @var array The features associated with the business.
     */
    public array $features;

    /**
     * @var array The images associated with the business.
     */
    public array $images;

    /**
     * BusinessDTO constructor.
     *
     * @param int|null $id
     * @param int $category_id
     * @param string $business_title
     * @param string $description
     * @param string $check_in
     * @param string $check_out
     * @param string $age_restriction
     * @param string $pets_permission
     * @param string $location
     * @param array $features
     * @param array $images
     */
    public function __construct(
        ?int $id,
        int $category_id,
        string $business_title,
        string $description,
        string $check_in,
        string $check_out,
        string $age_restriction,
        string $pets_permission,
        string $location,
        array $features,
        array $images
    ) {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->business_title = $business_title;
        $this->description = $description;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->age_restriction = $age_restriction;
        $this->pets_permission = $pets_permission;
        $this->location = $location;
        $this->features = $features;
        $this->images = $images;
    }

    /**
     * Convert the DTO to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'category_id' => $this->category_id,
            'business_title' => $this->business_title,
            'description' => $this->description,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'age_restriction' => $this->age_restriction,
            'pets_permission' => $this->pets_permission,
            'location' => $this->location,
            'features' => $this->features,
            'images' => $this->images,
        ];
    }
}
