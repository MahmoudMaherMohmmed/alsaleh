<?php

return [
    'plural' => 'Car Salesmen',
    'singular' => 'Car Salesman',
    'empty' => 'There are no car salesmen',
    'select' => 'Select car salesman',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'plural' => 'Actions',
        'list' => 'List car salesmen',
        'show' => 'Show car salesman',
        'create' => 'Create new car salesman',
        'new' => 'New',
        'edit' => 'Edit car salesman',
        'delete' => 'Delete car salesman',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The car salesman has been created successfully',
        'updated' => 'The car salesman has been updated successfully',
        'deleted' => 'The car salesman has been deleted successfully',
        'retrieved' => 'Data has been retrieved successfully',
        'salesmen_added_car_period_before' => 'salesmen have been added to this car during this period before',
        'salesman_added_to_car_during_this_period_before' => 'This salesman has previously added to the car during this period',
        'salesman_assistant_added_to_car_during_this_period_before' => 'This salesman assistant has previously added to the car during this period',
    ],
    'attributes' => [
        'id' => 'ID',
        'car' => 'Car',
        'car_id' => 'Car',
        'salesman' => 'Salesman',
        'salesman_id' => 'Salesman',
        'salesman_assistant' => 'Salesman Assistant',
        'salesman_assistant_id' => 'Salesman Assistant',
        'start_date' => 'Start date',
        'end_date' => 'End date',
        'created_at' => 'Created at',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the car salesman ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ]
    ]
];
