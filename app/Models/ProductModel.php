<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table         = 'products';
    protected $primaryKey    = 'id';
    protected $returnType    = 'object';
    protected $allowedFields = ['name', 'description', 'price', 'stock'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'name'        => 'required|string|max_length[255]',
        'description' => 'permit_empty|string',
        'price'       => 'required|numeric|greater_than_equal_to[0]',
        'stock'       => 'required|is_natural',
    ];
}