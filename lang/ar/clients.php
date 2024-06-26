<?php

return [
    'plural' => 'العملاء',
    'singular' => 'العميل',
    'empty' => 'لا توجد عملاء',
    'select' => 'اختر العميل',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل العملاء',
        'show' => 'عرض',
        'create' => 'إضافة عميل جديد',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات العميل',
        'delete' => 'حذف العميل',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث العملاء',
    ],
    'messages' => [
        'created' => 'تم إضافة العميل بنجاح',
        'updated' => 'تم تعديل العميل بنجاح',
        'deleted' => 'تم حذف العميل بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'name' => 'الاسم',
        'phone' => 'رقم الهاتف',
        'email' => 'البريد الإلكتروني',
        'created_at' => 'تاريخ الإنضمام',
        'old_password' => 'كلمة المرور القديمة',
        'new_password' => 'كلمة المرور الجديدة',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'avatar' => 'الصورة الشخصية',
        'image' => 'الصورة الشخصية',
        'gender' => 'الجنس',
        'type' => 'نوع المستخدم',
        'status' => 'الحالة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا العميل ?',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ],
    'status' => [
        'ACTIVE' => 'مفعل',
        'INACTIVE' => 'غير مفعل',
    ],
    'report_filters_status' => [
        'ENABLE' => 'ممكن',
        'DISABLE' => 'غير ممكن',
    ],
    'type' => [
        'SALES_MAN' => 'مندوب مبيعات'
    ]
];
