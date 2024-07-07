<?php

return [
    'plural' => 'Expense categories',
    'singular' => 'Expense category',
    'empty' => 'There are no expense categories',
    'select' => 'Select expense category',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List expense categories',
        'show' => 'Show expense category',
        'create' => 'Create new expense category',
        'new' => 'New',
        'edit' => 'Edit expense category',
        'delete' => 'Delete expense category',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The expense category has been created successfully',
        'updated' => 'The expense category has been updated successfully',
        'deleted' => 'The expense category has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'title' => 'Title',
        'description' => 'Description',
        'type' => 'Type',
        'status' => 'Status',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the expense category ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'In active',
    ],
    'type' => [
        'COMPANY' => 'Company',
        'SALESMAN' => 'Salesman',
    ],
];
