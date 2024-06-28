<?php

return [
    'plural' => 'تتبع المخازن',
    'singular' => 'تتبع المخزن',
    'empty' => 'لا توجد مخازن',
    'select' => 'اختر تتبع المخزن',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل تتبع المخازن',
        'show' => 'عرض',
        'create' => 'إضافة تتبع جديد للمخزن',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات تتبع المخزن',
        'delete' => 'حذف تتبع المخزن',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث تتبع المخازن',
    ],
    'messages' => [
        'created' => 'تم إضافة تتبع المخزن بنجاح',
        'updated' => 'تم تعديل تتبع المخزن بنجاح',
        'deleted' => 'تم حذف تتبع المخزن بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'user' => 'المستخدم',
        'product' => 'المنتج',
        'quantity' => 'الكمية',
        'type' => 'النوع',
        'created_at' => 'تاريخ ألإضافة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا تتبع المخزن ؟',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ],
    'type' => [
        'RETURNED' => 'مرتجع',
        'NEW' => 'تم أضافته إلي المخزن',
        'MOVED_TO_CAR' => 'نُقل إلي السيارة',
    ]
];
