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
        'cash_price' => 'Cash price',
        'quantity' => 'Quantity',
        'image' => 'Image',
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
];
