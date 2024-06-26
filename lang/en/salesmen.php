<?php

return [
    'plural' => 'Salesmen',
    'singular' => 'Salesman',
    'empty' => 'There are no salesmen',
    'select' => 'Select salesman',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List salesmen',
        'show' => 'Show salesman',
        'create' => 'Create new salesman',
        'new' => 'New',
        'edit' => 'Edit salesman',
        'delete' => 'Delete salesman',
        'save' => 'Save',
        'filter' => 'Filter',
        'latest' => 'Latest salesmen',
    ],
    'messages' => [
        'created' => 'The salesman has been created successfully',
        'updated' => 'The salesman has been updated successfully',
        'deleted' => 'The salesman has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'name' => 'Name',
        'phone' => 'Phone',
        'email' => 'Email',
        'created_at' => 'The Date Of Join',
        'old_password' => 'Old Password',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'avatar' => 'Avatar',
        'report_filters_status' => 'Report filters',
        'status' => 'Status'
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the salesman ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'In active',
    ],
];
