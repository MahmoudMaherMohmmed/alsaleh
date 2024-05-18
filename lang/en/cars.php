<?php

return [
    'plural' => 'Cars',
    'singular' => 'Car',
    'empty' => 'There are no cars',
    'select' => 'Select car',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List cars',
        'show' => 'Show car',
        'create' => 'Create new car',
        'new' => 'New',
        'edit' => 'Edit car',
        'delete' => 'Delete car',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The car has been created successfully',
        'updated' => 'The car has been updated successfully',
        'deleted' => 'The car has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
    ],
    'attributes' => [
        'id' => 'ID',
        'title' => 'Title',
        'description' => 'Description',
        'chassis_number' => 'Chassis number',
        'license_number' => 'License number',
        'status' => 'Status',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the car ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ],
    'status' => [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'In active',
    ],
];
