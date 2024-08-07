<?php

return [
    'plural' => 'Products',
    'singular' => 'Product',
    'empty' => 'There are no products',
    'select' => 'Select product',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List products',
        'show' => 'Show product',
        'create' => 'Create new product',
        'new' => 'New',
        'edit' => 'Edit product',
        'delete' => 'Delete product',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The product has been created successfully',
        'updated' => 'The product has been updated successfully',
        'deleted' => 'The product has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'title' => 'Title',
        'description' => 'Description',
        'serial_number' => 'Serial number',
        'quantity' => 'Quantity',
        'cash_price' => 'Cash price',
        'installment_price' => 'Installment price',
        'installments_count' => 'Installment count',
        'salesman_profit' => 'Salesman profit',
        'image' => 'Image',
        'type' => 'Type',
        'status' => 'Status',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the product ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'In active',
    ],
    'type' => [
        'NEW' => 'New',
        'USED' => 'Used',
    ],
];
