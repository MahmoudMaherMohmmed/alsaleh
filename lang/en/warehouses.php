<?php

return [
    'plural' => 'Warehouses',
    'singular' => 'Warehouse',
    'empty' => 'There are no warehouses',
    'select' => 'Select warehouse',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List warehouse products',
        'show' => 'Show warehouse',
        'create' => 'Create new products to warehouse',
        'new' => 'New',
        'edit' => 'Edit warehouse',
        'delete' => 'Delete warehouse',
        'save' => 'Save',
        'filter' => 'Filter',
        'transfer_to_another_warehouse' => 'Transfer to another warehouse',
        'damaged' => 'Damaged',
    ],
    'messages' => [
        'created' => 'The warehouse has been created successfully',
        'updated' => 'The warehouse has been updated successfully',
        'deleted' => 'The warehouse has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
        'transferred_to_another_warehouse' => 'The warehouse product has been transferred to another warehouse successfully',
        'damaged' => 'The warehouse product has been specified as damaged successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'title' => 'Title',
        'description' => 'Description',
        'product' => 'Product',
        'quantity' => 'Quantity',
        'products' => 'Products',
        'Quantities' => 'Quantities',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the warehouse ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ]
];
