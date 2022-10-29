<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class ItemCompra extends Entity
{
    
    protected $_accessible = [
        'quantidade' => true,
        'preco' => true,
        'TotalItem' => true,
        'created' => true,
        'modified' => true,
    ];

    protected $_hidden = [
        'password',
    ];
}