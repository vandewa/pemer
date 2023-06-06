<?php

if (!function_exists('get_code_group')) {
    function get_code_group($code)
    {
        return \App\Models\ComCode::where('code_group', $code)->pluck('code_nm', 'code_cd');
    }

    if (!function_exists('get_role_user')) {
        function get_role_user()
        {
            return \Spatie\Permission\Models\Role::pluck('name', 'name');
        }
    }

    if (!function_exists('gen_no_tiket')) {
        function gen_no_tiket()
        {
            $no = Date('y-m-') . str_pad(1, 3, '0', STR_PAD_LEFT);
            $terakhir = \App\Models\Tiket::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('created_at', 'desc')->first();

            if ($terakhir) {
                $no = Date('y-m-') . str_pad((int) substr($terakhir->kode_tiket, -3) + 1, 3, 0, STR_PAD_LEFT);
            }
            return 'LKN-' . $no;
        }
    }

}