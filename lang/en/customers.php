<?php

return [
    'plural' => 'Customers',
    'singular' => 'Customer',
    'empty' => 'There are no customers',
    'select' => 'Select customer',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List customers',
        'show' => 'Show customer',
        'create' => 'Create new customer',
        'new' => 'New',
        'edit' => 'Edit customer',
        'delete' => 'Delete customer',
        'save' => 'Save',
        'filter' => 'Filter',
        'latest' => 'Latest customers',
    ],
    'messages' => [
        'created' => 'The customer has been created successfully',
        'updated' => 'The customer has been updated successfully',
        'deleted' => 'The customer has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'name' => 'Name',
        'phone' => 'Phone',
        'phone_2' => 'Phone',
        'address' => 'Address',
        'lat' => 'Latitude',
        'lng' => 'longitude',
        'created_at' => 'The Date Of Join',
        'status' => 'Status',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the customer ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'In active',
    ]
];
