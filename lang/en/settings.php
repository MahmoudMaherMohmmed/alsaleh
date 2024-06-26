<?php

return [
    'plural' => 'Settings',
    'singular' => 'Setting',
    'empty' => 'There are no settings',
    'select' => 'Select setting',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List settings',
        'show' => 'Show setting',
        'create' => 'Create new setting',
        'new' => 'New',
        'edit' => 'Edit setting',
        'delete' => 'Delete setting',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The setting has been created successfully',
        'updated' => 'The setting has been updated successfully',
        'deleted' => 'The setting has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'title' => 'Title',
        'description' => 'Description',
        'whatsapp_number' => 'WhatsApp number',
        'calling_number' => 'Calling number',
        'info_email' => 'Info email',
        'support_email' => 'Support email',
        'salesman_profit_percentage' => 'Salesman profit percentage',
        'salesman_assistant_profit_percentage' => 'Salesman assistant profit percentage',
        'maximum_period_salesman_can_delete_sale' => 'Maximum period salesman can delete sale (In days)',
        'image' => 'Image',
        'created_at' => 'Created at'
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the setting ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ]
];
