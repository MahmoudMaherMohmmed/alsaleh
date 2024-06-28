<?php

return [
    'plural' => 'تتبع منتجات السيارات',
    'singular' => 'تتبع منتجات السيارات',
    'empty' => 'لا توجد مخازن',
    'select' => 'اختر تتبع منتجات السيارات',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل تتبع منتجات السيارات',
        'show' => 'عرض',
        'create' => 'إضافة تتبع جديد للمخزن',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات تتبع منتجات السيارات',
        'delete' => 'حذف تتبع منتجات السيارات',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث تتبع منتجات السيارات',
    ],
    'messages' => [
        'created' => 'تم إضافة تتبع منتجات السيارات بنجاح',
        'updated' => 'تم تعديل تتبع منتجات السيارات بنجاح',
        'deleted' => 'تم حذف تتبع منتجات السيارات بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'car' => 'السيارة',
        'user' => 'المستخدم',
        'product' => 'المنتج',
        'quantity' => 'الكمية',
        'type' => 'النوع',
        'created_at' => 'تاريخ ألإضافة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا تتبع منتجات السيارات ؟',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ],
    'type' => [
        'RETURNED' => 'مرتجع',
        'NEW' => 'تم أضافته إلي السيارة',
        'SOLD' => 'مُباع',
    ]
];