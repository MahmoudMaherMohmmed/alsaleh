<?php

return [
    'plural' => 'أقسام المصروفات',
    'singular' => 'قسم المصروفات',
    'empty' => 'لا توجد أقسام المصروفات',
    'select' => 'اختر قسم المصروفات',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل أقسام المصروفات',
        'show' => 'عرض',
        'create' => 'إضافة قسم مصروفات جديد',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات قسم المصروفات',
        'delete' => 'حذف قسم المصروفات',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث أقسام المصروفات',
    ],
    'messages' => [
        'created' => 'تم إضافة قسم المصروفات بنجاح',
        'updated' => 'تم تعديل قسم المصروفات بنجاح',
        'deleted' => 'تم حذف قسم المصروفات بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'title' => 'الاسم',
        'description' => 'الوصف',
        'type' => 'نوع المصروفات',
        'status' => 'الحالة',
        'created_at' => 'تاريخ ألإضافة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا قسم المصروفات ؟',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ],
    'status' => [
        'ACTIVE' => 'مفعل',
        'INACTIVE' => 'غير مفعل',
    ],
    'type' => [
        'COMPANY' => 'مصروفات شركة',
        'SALESMAN' => 'مصروفات مندوب',
    ]
];
