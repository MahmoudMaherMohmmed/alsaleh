<?php

return [
    'plural' => 'Sale installments',
    'singular' => 'Sale installment',
    'empty' => 'There are no sale installments',
    'select' => 'Select sale installment',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List sale installments',
        'show' => 'Show sale installment',
        'create' => 'Create new sale installment',
        'new' => 'New',
        'edit' => 'Edit sale installment',
        'delete' => 'Delete sale installment',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The sale installment has been created successfully',
        'updated' => 'The sale installment has been updated successfully',
        'deleted' => 'The sale installment has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'title' => 'Title',
        'due_date' => 'Installment due date',
        'value' => 'Installment value',
        'status' => 'Status',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the sale installment ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'PAID' => 'Paid',
        'UNPAID' => 'Unpaid',
    ],
];
