<?php

return [
    'plural' => 'Sales',
    'singular' => 'Sale',
    'empty' => 'There are no sales',
    'select' => 'Select sale',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List sales',
        'show' => 'Show sale',
        'create' => 'Create new sale',
        'new' => 'New',
        'edit' => 'Edit sale',
        'delete' => 'Delete sale',
        'save' => 'Save',
        'filter' => 'Filter',
        'latest' => 'Latest sales',
    ],
    'messages' => [
        'created' => 'The sale has been created successfully',
        'updated' => 'The sale has been updated successfully',
        'deleted' => 'The sale has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
        'your_account_not_assigned_salesman' => 'Sorry, your account was not assigned as a salesman, at the time of the sale',
    ],
    'attributes' => [
        'id' => 'ID',
        'customer_id' => 'Customer',
        'customer_name' => 'Customer name',
        'customer_phone' => 'Customer phone',
        'customer_phone_2' => 'Customer phone',
        'customer_address' => 'Customer address',
        'customer_lat' => 'Customer latitude',
        'customer_lng' => 'Customer Longitude',
        'customer_address_voice' => 'Customer address voice',
        'product_id' => 'Product',
        'price' => 'Price',
        'date' => 'Date',
        'type' => 'Type',
        'car_id' => 'Car',
        'salesman_id' => 'Salesman',
        'salesman_profit_percentage' => 'Salesman profit percentage',
        'salesman_profit' => 'Salesman profit',
        'salesman_assistant_id' => 'Salesman assistant',
        'salesman_assistant_profit_percentage' => 'Salesman assistant profit percentage',
        'salesman_assistant_profit' => 'Salesman assistant profit',
        'created_at' => 'The Date Of Join',
        'status' => 'Status',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the sale ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'type' => [
        'INSTALLMENT' => 'Installment',
        'CASH' => 'Cash',
    ],
    'status' => [
        'RETURNED' => 'Returned',
        'INSTALLMENTS_BEING_PAID' => 'Installments being paid',
        'COMPLETED' => 'Completed',
    ]
];
