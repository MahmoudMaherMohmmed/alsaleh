<?php

return [
    'plural' => 'Company expenses',
    'singular' => 'Company expense',
    'empty' => 'There are no company expenses',
    'select' => 'Select company expense',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List company expenses',
        'show' => 'Show company expense',
        'create' => 'Create new company expense',
        'new' => 'New',
        'edit' => 'Edit company expense',
        'delete' => 'Delete company expense',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The company expense has been created successfully',
        'updated' => 'The company expense has been updated successfully',
        'deleted' => 'The company expense has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'salesman' => 'Salesman',
        'salesman_id' => 'Salesman',
        'category_id' => 'Expense category',
        'title' => 'Title',
        'description' => 'Description',
        'value' => 'Value',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the company expense ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ]
];
