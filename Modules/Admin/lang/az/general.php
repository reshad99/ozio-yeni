<?php

return [
    'layout' => [
        'header' => [
            'dashboard' => 'İnformasiya paneli',
            'profile' => 'Profil',
            'logout' => 'Çıxış',
            'login' => 'Giriş',
            'dark_mode' => 'Tünd rejim',
            'light_mode' => 'Açıq rejim',
            'system' => 'Sistem',
        ],
    ],
    'menu' => [
        'dashboard' => 'İnformasiya paneli',
        'User management' => 'İstifadəçilər',
        'users' => 'İstifadəçi siyahısı',
        'admins' => 'Admin siyahısı',
        'stores' => 'Mağaza siyahısı',
        'employees' => 'İşçilər',
        'Roles' => 'Rollar',
        'Permissions' => 'İcazələr',
        'emergency-calls' => 'Qəza çağırışları',
        'AccidentCategoriesList' => 'Kateqoriyaları',
        'transport' => 'Nəqliyyat vasitələri',
        'admin-panel' => 'İdarəetmə paneli',
        'cars' => 'Avtomobillər',
        'Setting' => 'Tənzimləmələr',
        'DepartmentList' => 'Şöbələr',
        'organisationList' => 'Təşkilatlar',
        'RegionList' => 'Bölgələr',
    ],
    'pages' => [
        'dashboard' => [
            'title' => 'İnformasiya paneli',
            'category_count_chart' => 'Kateqoriyaların sayına görə qrafik',
            'monthly_emergency_call_chart' => 'Aylıq qəza çağırışlarına görə qrafik',
            'date_range' => 'Tarix aralığı',
            'EmergencyCalls' => 'Qəza çağırışları',
            'AllEmergencyCalls' => 'Bütün Qəza çağırışları',
            'CompletedEmergencyCalls' => 'Tamamlanmış Qəza çağırışları',
            'ClosedEmergencyCalls' => 'Bağlanmış Qəza çağırışları',
            'CancelledEmergencyCalls' => 'Ləğv edilmiş Qəza çağırışları',
        ],
        // 'settings' => [
        //     'list' => [
        //         'notification_settings' => 'Bildiriş tənzimləmələri',
        //         'keyword' => 'Açar söz',
        //         'button' => 'Düymə',
        //         'value' => 'Dəyər',
        //     ]
        // ],
        'login' => [
            'title' => 'Giriş',
            'form' => [
                'email' => 'E-poçt',
                'password' => 'Şifrə',
                'remember' => 'Yadda saxla',
                'submit' => 'Daxil ol',
            ],
        ],
        'list' => [
            'delete_selected' => 'Seçilmişləri sil',
            'change_status' => 'Statusu dəyiş',
            'active' => 'Aktiv',
            'inactive' => 'Deaktiv',
        ],
        'users' => [
            'list' => [
                'table' => [
                    'id' => 'ID',
                    'name' => 'İstifadəçi adı',
                    'email' => 'E-poçt',
                    'phone' => 'Telefon',
                    'password' => 'Şifrə',
                    'bonus_card_no' => 'Bonus kart nömrəsi',
                    'want_notification' => 'Bildiriş',
                    'created_at' => 'Yaradılma tarixi',
                    'actions' => 'Əməliyyatlar',
                ],
                'access_modules' => 'Icazə verilən modullar',
                'search_user' => 'İstifadəçi axtar',
                'users' => 'İstifadəçilər',
                'filter_options' => 'filtır seçimləri',
                'role' => 'Rol',
                'reset' => 'Sıfırla',
                'apply' => 'Tətbiq et',
                'add_new_user' => 'İstifadəçi əlavə et',
                'added_new_user' => 'Yeni istifadəçi əlavə edildi',
                'add_user' => 'İstifadəçi əlavə et',
                'edit_user' => 'İstifadəçini dəyiş',
                'selected' => 'Seçilmiş',
                'delete_selected' => 'Seçilmişləri sil',
                'select_roles' => 'Rolları seçin',
                'first_name' => 'Ad',
                'last_name' => 'Soyad',
                'father_name' => 'Ata adı',
                'phone_number' => 'Telefon nömrəsi',
                'type' => 'Tip',
                'duty' => 'Vəzifə',
                'working_department' => 'İşlədiyi şöbə',
                'working_organisation' => 'İşlədiyi təşkilat',
                'working_region' => 'İşlədiyi bölgə',
                'none' => 'Yoxdur',
                'email' => 'E-poçt',
                'password' => 'Şifrə',
                'confirm_password' => 'Şifrəni təsdiqlə',
                'roles' => 'Rollar',
                'update_user' => 'İstifadəçini yenilə',
                'user' => 'İstifadəçi',
                'joined_date' => 'Qoşulma tarixi',
                'are_you_sure_you_want_to_delete_selected_customers' => 'Seçilmiş müştəriləri silmək istədiyinizə əminsiniz?',
                'are_you_sure_you_want_to_delete_selected_admins' => 'Seçilmiş adminləri silmək istədiyinizə əminsiniz?',
                'you_have_deleted_all_selected_users' => 'Siz seçilmiş bütün istifadəçiləri silmisiniz',
                'selected_users_was_not_deleted.' => 'Seçilmiş istifadəçilər silinmədi',
                'user_org' => 'istifadəçi təşkilatı',
                'user_reg' => 'istifadəçi bölgəsi',
                'user_dep' => 'istifadəçi şöbəsi',
            ]
        ],
        'admins' => [
            'list' => [
                'table' => [
                    'id' => 'ID',
                    'name' => 'Ad',
                    'status' => 'Status',
                    'email' => 'E-poçt',
                    'phone' => 'Telefon',
                    'password' => 'Şifrə',
                    'created_at' => 'Yaradılma tarixi',
                    'actions' => 'Əməliyyatlar',
                    'password_confirmation' => 'Şifrəni təsdiqlə',
                ],
                'access_modules' => 'Icazə verilən modullar',
                'search_admin' => 'Admin axtar',
                'admins' => 'Adminlər',
                'filter_options' => 'filtır seçimləri',
                'role' => 'Rol',
                'reset' => 'Sıfırla',
                'apply' => 'Tətbiq et',
                'add_new_admin' => 'Admin əlavə et',
                'added_new_admin' => 'Yeni admin əlavə edildi',
                'add_admin' => 'Admin əlavə et',
                'edit_admin' => 'Admini dəyiş',
            ]
        ],
        'stores' => [
            'list' => [
                'add_new_store' => 'Mağaza əlavə et',
                'added_new_store' => 'Mağaza əlavə edildi',
                'table' => [
                    'id' => 'ID',
                    'module' => 'Modul',
                    'name' => 'Ad',
                    'store_code' => 'Mağaza kodu',
                    'currency' => 'Valyuta',
                    'phone' => 'Telefon nömrəsi',
                    'city' => 'Şəhər',
                    'country' => 'Ölkə',
                    'email' => 'E-poçt',
                    'password' => 'Şifrə',
                    'password_confirmation' => 'Şifrəni təsdiqlə',
                    'lat' => 'Lat',
                    'lng' => 'Lng',
                    'status' => 'Status',
                    'rating' => 'Reytinq',
                    'store_category' => 'Mağaza kateqoriyası',
                    'have_vegan' => 'Veqan məhsullar',
                    'have_not_vegan' => 'Veqan olmayan məhsullar',
                    'open_time' => 'Açılış vaxtı',
                    'close_time' => 'Bağlanış vaxtı',
                    'zone' => 'Zona',
                    'branch' => 'Filial',
                    'created_at' => 'Yaradılma tarixi',
                    'actions' => 'Əməliyyatlar',
                ],
            ],
        ]
    ],
    'shared' => [
        'delete_selected' => 'Seçilmişləri sil',
        'created_at' => 'Yaradılma tarixi',
        "actions" => "Əməliyyatlar",
        "edit" => "Redaktə et",
        "delete" => "Sil",
        'save' => 'Yadda saxla',
        'cancel' => 'Ləğv et',
        'save_changes' => 'Dəyişiklikləri yadda saxla',
        'please_wait' => 'Zəhmət olmasa gözləyin',
        'discard' => 'Ləğv et',
        'submit' => 'Təsdiqlə',
        'form_has_been_successfully_submitted' => 'Forma uğurla göndərildi!',
        'got_it' => 'Bağla!',
        'sorry_looks_like_there_are_some_errors_detected' => 'Bağışlayın, görünür səhv var',
        'please_check_the_errors_and_try_again' => 'Xahiş edirik səhvləri yoxlayın və yenidən cəhd edin',
        'are_you_sure_you_want_to_delete_this' => 'adlı :attribute silmək istədiyinizə əminsiniz',
        'not_deleted' => 'adlı :attribute silinmədi!',
        'successfully_deleted' => 'adlı :attribute uğurla silindi!',
        'yes_delete' => 'Bəli, sil',
        'no_cancel' => 'Xeyr, ləğv et',
        'you_have_deleted' => 'Siz silmisiniz',
        'was_not_deleted' => 'silinmədi',
        'are_you_sure_you_would_like_to_close' => 'Bağlamaq istədiyinizə əminsiniz?',
        'yes_close' => 'Bəli, bağla',
        'no_return' => 'Xeyr, açıq saxla',
        'are_you_sure_you_would_like_to_cancel' => 'Ləğv etmək istədiyinizə əminsiniz?',
        'yes_cancel' => 'Bəli, ləğv et',
        'your_form_has_not_been_cancelled' => 'Formunuz ləğv edildi',
        'are_you_want_to_change_status' => ':attribute statusunu dəyişmək istədiyinizə əminsiniz?',
        'status_is_changing' => 'Status dəyişdirilir',
        'status_is_changed_successfully' => 'Status uğurla dəyişdirildi',
        'error_occurred_while_changing_status' => 'Status dəyişdirilərkən səhv baş verdi',
        'yes_change' => 'Bəli, dəyiş',
        'status' => [
            'OPEN' => 'Yeni',
            'DISPATCHED' => 'Təyin edilib',
            'DECLINED' => 'İmtina',
            'APPROVED' => 'Qəbul edilib',
            'DEPARTED' => 'Yola çıxıb',
            'ARRIVED' => 'İşə başlayıb',
            'COMPLETED' => 'Tamamlanıb',
            'CANCELLED' => 'Ləğv edilib',
        ],
        'roles' => [
            'ADMIN' => 'İdarəçi',
            'MANAGER' => 'Menecer',
            'DISPATCHER' => 'Təyinatçı',
            'WORKER' => 'İşçi',
            'SUPER_ADMIN' => 'Super İdarəçi',
            'ORGANISATION_MANAGER' => 'Təşkilat İdarəçisi',
            'REGION_MANAGER' => 'Bölgə İdarəçisi',
        ]
    ],
    'components' => [
        'accidentCategory_item' => [
            "published" => "Yayımlanıb",
            "unpublished" => "Yayımlanmayıb",
        ],
        'role_card' => [
            'total_users_with_this_role' => 'Bu rol üzrə istifadəçilərin sayı',
            'and' => 'və',
            'more' => 'daha çox',
            'role' => 'Rol',
        ],
        'user_item' => [
            'no_role' => 'Rol yoxdur',
        ]
    ],
    'validation' => [
        'required' => ':attribute tələb olunur',
        'unique' => 'Bu :attribute artıq istifə edilib',
        'email' => 'Daxil etdiyiniz e-poçt formatı yanlışdır',
        'min' => ':attribute minimum :min simvol olmalıdır',
        'max' => ':attribute maksimum :max simvol olmalıdır',
        'confirmed' => ':attribute təsdiq edilməyib',
        'same' => ':attribute təkrarı yanlışdır',
        'string' => ':attribute yazı formatında olmalıdır',
        'not_regex' => ':attribute :regex olmamalıdır',
        'integer' => ':attribute tam rəqəm olmalıdır',
        'numeric' => ':attribute rəqəm olmalıdır',
        'in' => ':attribute yanlışdır',
        'before_or_equal' => ':attribute tarixi :date tarixindən əvvəl olmalıdır',
        'after_or_equal' => ':attribute tarixi :date tarixindən sonra olmalıdır',
        'date' => ':attribute tarix formatında olmalıdır',
        'boolean' => ':attribute yanlışdır',
        'date_format' => ':attribute zaman formatında olmalıdır',
    ],
    'auth' => [
        'failed' => 'Giriş məlumatları yanlışdır.',
    ],
    'filters' => [
        'title' => 'Filtrlar',
        'name' => 'Ad',
        'reset' => 'Sıfırla',
        'search' => 'Axtar',
        'start_date' => 'Başlama tarixi',
        'end_date' => 'Bitmə tarixi',
        'email' => 'E-poçt',
        'phone_number' => 'Telefon',
        'bonus_card_no' => 'Bonus kart nömrəsi',
        'created_at_range' => 'Yaradılma tarixi aralığı',
        'status' => 'Status',
    ],
];
