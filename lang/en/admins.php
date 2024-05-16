<?php

return [
    'plural' => 'Admins',
    'singular' => 'Admin',
    'empty' => 'There are no admins',
    'select' => 'Select admin',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List admins',
        'show' => 'Show admin',
        'create' => 'Create new admin',
        'new' => 'New',
        'edit' => 'Edit admin',
        'delete' => 'Delete admin',
        'save' => 'Save',
        'filter' => 'Filter',
        'latest' => 'Latest admins',
    ],
    'messages' => [
        'created' => 'The admin has been created successfully',
        'updated' => 'The admin has been updated successfully',
        'deleted' => 'The admin has been deleted successfully',
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
        'status' => 'Status'
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the admin ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'In active',
    ],
];
