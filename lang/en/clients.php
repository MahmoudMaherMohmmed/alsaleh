<?php

return [
    'plural' => 'Clients',
    'singular' => 'Client',
    'empty' => 'There are no clients',
    'select' => 'Select client',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List clients',
        'show' => 'Show client',
        'create' => 'Create new client',
        'new' => 'New',
        'edit' => 'Edit client',
        'delete' => 'Delete client',
        'save' => 'Save',
        'filter' => 'Filter',
        'latest' => 'Latest clients',
    ],
    'messages' => [
        'created' => 'The client has been created successfully',
        'updated' => 'The client has been updated successfully',
        'deleted' => 'The client has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'name' => 'Name',
        'phone' => 'Phone',
        'email' => 'Email',
        'created_at' => 'The Date Of Join',
        'old_password' => 'Old Password',
        'new_password' => 'New Password',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'avatar' => 'Avatar',
        'image' => 'Image',
        'type' => 'Type',
        'status' => 'Status',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the client ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'In active',
    ],
    'report_filters_status' => [
        'ENABLE' => 'Enable',
        'DISABLE' => 'Disable',
    ],
    'type' => [
        'SALES_MAN' => 'Salesman'
    ],

    'custom_messages' => [
        'phone' => [
            'unique' => 'Phone has already been taken.',
        ],
        'email' => [
            'unique' => 'Email has already been taken.',
        ],
        'iban' => [
            'same' => 'IBAN and IBAN Confirmation do not match.',
        ]
    ],
];
