<?php

return [
    'plural' => 'السيارات',
    'singular' => 'السيارة',
    'empty' => 'لا توجد عملاء',
    'select' => 'اختر السيارة',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل السيارات',
        'show' => 'عرض',
        'create' => 'إضافة سيارة جديد',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات السيارة',
        'delete' => 'حذف السيارة',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث السيارات',
    ],
    'messages' => [
        'created' => 'تم إضافة السيارة بنجاح',
        'updated' => 'تم تعديل السيارة بنجاح',
        'deleted' => 'تم حذف السيارة بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'title' => 'الاسم',
        'description' => 'الوصف',
        'chassis_number' => 'رقم السيارة',
        'license_number' => 'رقم رخصة السيارة',
        'status' => 'الحالة',
        'created_at' => 'تاريخ ألإضافة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا السيارة ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ],
    'status' => [
        'ACTIVE' => 'مفعل',
        'INACTIVE' => 'غير مفعل',
    ]
];