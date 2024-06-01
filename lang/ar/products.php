<?php

return [
    'plural' => 'المنتجات',
    'singular' => 'المنتج',
    'empty' => 'لا توجد منتجات',
    'select' => 'اختر المنتج',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل المنتجات',
        'show' => 'عرض',
        'create' => 'إضافة منتج جديد',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات المنتج',
        'delete' => 'حذف المنتج',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث المنتجات',
    ],
    'messages' => [
        'created' => 'تم إضافة المنتج بنجاح',
        'updated' => 'تم تعديل المنتج بنجاح',
        'deleted' => 'تم حذف المنتج بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'title' => 'الاسم',
        'description' => 'الوصف',
        'serial_number' => 'الرقم التسلسلي',
        'quantity' => 'الكمية المتاحة',
        'cash_price' => 'سعر البيع (كاش)',
        'installment_price' => 'سعر البيع (قسط)',
        'installments_count' => 'عدد الأقساط',
        'salesman_profit' => 'ربح مندوبين المبيعات',
        'image' => 'صورة المنتج',
        'status' => 'الحالة',
        'created_at' => 'تاريخ ألإضافة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا المنتج ؟',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ],
    'status' => [
        'ACTIVE' => 'مفعل',
        'INACTIVE' => 'غير مفعل',
    ]
];
