<?php

return [
    'plural' => 'المبيعات',
    'singular' => 'البيعة',
    'empty' => 'لا توجد عملاء',
    'select' => 'اختر البيعة',
    'perPage' => 'عدد النتائج في الصفحة',
    'actions' => [
        'actions' => 'ألإجراءات',
        'list' => 'كل المبيعات',
        'show' => 'عرض',
        'create' => 'إضافة بيعة جديد',
        'new' => 'جديد',
        'edit' => 'تعديل بيانات البيعة',
        'delete' => 'حذف البيعة',
        'save' => 'حفظ',
        'filter' => 'بحث',
        'latest' => 'أحدث المبيعات',
    ],
    'messages' => [
        'created' => 'تم إضافة البيعة بنجاح',
        'updated' => 'تم تعديل البيعة بنجاح',
        'deleted' => 'تم حذف البيعة بنجاح',
        'retrieved' => 'تم أسترجاع البيانات بنجاح',
        'your_account_not_assigned_salesman' => 'عذرًا، لم يتم تعيين حسابك كندوب مبيعات فى الوقت المحدد للبيعة',
    ],
    'attributes' => [
        'id' => 'الرقم التسلسلي',
        'customer_id' => 'العميل',
        'customer_name' => 'أسم العميل',
        'customer_phone' => 'رقم هاتف العميل',
        'customer_phone_2' => 'رقم هاتف العميل',
        'customer_address' => 'عنوان العميل',
        'customer_lat' => 'خطوط الطول',
        'customer_lng' => 'دوائر العرض',
        'customer_address_voice' => 'Customer address voice',
        'product_id' => 'المنتج',
        'price' => 'سعر المنتج',
        'date' => 'تاريخ البيعة',
        'type' => 'نوع',
        'car_id' => 'السيارة',
        'salesman_id' => 'مندوب المبيعات',
        'salesman_profit_percentage' => 'نسبة عائد مندوب المبيعات',
        'salesman_profit' => 'عائد مندوب المبيعات',
        'salesman_assistant_id' => 'مساعد مندوب المبيعات',
        'salesman_assistant_profit_percentage' => 'نسبة عائد مساعد مندوب المبيعات',
        'salesman_assistant_profit' => 'عائد مساعد مندوب المبيعات',
        'created_at' => 'تاريخ الإنضمام',
        'status' => 'الحالة',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'تحذير !',
            'info' => 'هل أنت متأكد انك تريد حذف هذا البيعة ؟',
            'confirm' => 'حذف',
            'cancel' => 'إلغاء',
        ]
    ],
    'type' => [
        'INSTALLMENT' => 'قسط',
        'CASH' => 'كاش',
    ],
    'status' => [
        'RETURNED' => 'مرتجع',
        'INSTALLMENTS_BEING_PAID' => 'جارى سداد الأقساط',
        'COMPLETED' => 'مكتمل',
    ]
];