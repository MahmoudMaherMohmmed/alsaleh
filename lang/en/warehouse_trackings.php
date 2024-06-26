<?php

return [
    'plural' => 'Warehouse trackings',
    'singular' => 'Warehouse tracking',
    'empty' => 'There are no warehouse trackings',
    'select' => 'Select warehouse tracking',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List warehouse trackings',
        'show' => 'Show warehouse tracking',
        'create' => 'Create new warehouse tracking',
        'new' => 'New',
        'edit' => 'Edit warehouse tracking',
        'delete' => 'Delete warehouse tracking',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The warehouse tracking has been created successfully',
        'updated' => 'The warehouse tracking has been updated successfully',
        'deleted' => 'The warehouse tracking has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'user' => 'User',
        'product' => 'Product',
        'quantity' => 'Quantity',
        'type' => 'Type',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the warehouse tracking ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'type' => [
        'RETURNED' => 'Returned',
        'NEW' => 'New',
    ]
];
