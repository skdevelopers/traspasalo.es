<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class BusinessDTO extends DataTransferObject
{
    public int $category_id;
    public string $business_title;
    public string $description;
    public string $check_in;
    public string $check_out;
    public string $age_restriction;
    public string $pets_permission;
    public string $location;
    public array $features;
    public array $images;
}
