<?php

namespace App\DTO;


class MissionDTO {
    
    public function __construct(
       public string $titre,
       public ?string $description,
       public float $budget,
       public array $technologies,
       public ?string $type,
       public ?string $status
    )
    {}
}