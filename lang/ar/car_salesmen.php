<?php

return [
    'plural' => 'مندوبين السيارات',
    'singular' => 'مندوب السيارة',
    'empty' => 'لا توجد مندوبين للسيارات',
    'select' => 'اختر مندوب السيارة',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل مندوبين السيارات',
        'show' => 'عرض',
        'create' => 'إضافة مندوبين لسيارة جديد',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات مندوبين السيارة',
        'delete' => 'حذف مندوبين السيارة',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث مندوبين السيارات',
    ],
    'messages' => [
        'created' => 'تم إضافة مندوبين السيارة بنجاح',
        'updated' => 'تم تعديل مندوبين السيارة بنجاح',
        'deleted' => 'تم حذف مندوبين السيارة بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
        'salesmen_added_car_period_before' => 'تمت تعيين بائعين لهذه السيارة خلال هذه الفترة من قبل',
        'salesman_added_to_car_during_this_period_before' => 'تم تعيين مندوب المبيعات الي سيارة آخري خلال المدة المحددة من قبل',
        'salesman_assistant_added_to_car_during_this_period_before' => 'تم تعيين مساعد مندوب المبيعات الي سيارة آخري خلال المدة المحددة من قبل',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'car' => 'السيارة',
        'car_id' => 'السيارة',
        'salesman' => 'مندوب المبيعات',
        'salesman_id' => 'مندوب المبيعات',
        'salesman_assistant' => 'مساعد مندوب المبيعات',
        'salesman_assistant_id' => 'مساعد مندوب المبيعات',
        'start_date' => 'من تاريخ',
        'end_date' => 'إلي تاريخ',
        'created_at' => 'تاريخ ألإضافة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف مندوبين السيارة ؟',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ]
];
