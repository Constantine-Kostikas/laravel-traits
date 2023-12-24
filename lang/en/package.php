<?php

return [

    'ModelActive' => [
        'titles' => [
            1 => 'Yes',
            0 => 'No',
        ],
    ],

    'CRUDController' => [
        'messages' => [
            'save_success' => 'Successfully saved',
            'delete_success' => 'Successfully deleted',
            'delete_fail' => 'Delete failed',
            'delete_fail_protected_relationships' => 'You can’t delete <strong>“:model_name”</strong> because it’s associated with other records',        ],
    ],

];
