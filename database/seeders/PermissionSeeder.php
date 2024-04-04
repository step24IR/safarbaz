<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = array();
        $permissions[] = Permission::create(['name' => 'see_dashboard','label'=>'دیدن داشبورد']);

        $permissions[] = Permission::create(['name' => 'see_users','label'=>'دیدن کاربران']);
        $permissions[] = Permission::create(['name' => 'see_show_user','label'=>'نمایش کاربر']);
        $permissions[] = Permission::create(['name' => 'create_user','label'=>'ایجاد کاربر']);
        $permissions[] = Permission::create(['name' => 'edit_user','label'=>'ویرایش کاربر']);
        $permissions[] = Permission::create(['name' => 'delete_user','label'=>'حذف کاربر']);

        $permissions[] = Permission::create(['name' => 'see_roles','label'=>'دیدن نقش ها']);
        $permissions[] = Permission::create(['name' => 'see_show_role','label'=>'نمایش نقش']);
        $permissions[] = Permission::create(['name' => 'create_role','label'=>'ایجاد نقش']);
        $permissions[] = Permission::create(['name' => 'edit_role','label'=>'ویرایش نقش']);
        $permissions[] = Permission::create(['name' => 'delete_role','label'=>'حذف نقش']);

        $permissions[] = Permission::create(['name' => 'see_rooms','label'=>'دیدن اقامتگاه ها']);
        $permissions[] = Permission::create(['name' => 'see_show_room','label'=>'نمایش اقامتگاه ']);
        $permissions[] = Permission::create(['name' => 'create_room','label'=>'ایجاد اقامتگاه']);
        $permissions[] = Permission::create(['name' => 'edit_room','label'=>'ویرایش اقامتگاه']);
        $permissions[] = Permission::create(['name' => 'delete_room','label'=>'حذف اقامتگاه']);

        $permissions[] = Permission::create(['name' => 'see_reservations','label'=>'دیدن رزروها']);
        $permissions[] = Permission::create(['name' => 'see_show_reservation','label'=>'نمایش رزرو']);
        $permissions[] = Permission::create(['name' => 'create_reservation','label'=>'ایجاد رزرو']);
        $permissions[] = Permission::create(['name' => 'edit_reservation','label'=>'ویرایش رزرو']);
        $permissions[] = Permission::create(['name' => 'delete_reservation','label'=>'حذف رزرو']);

        $permissions[] = Permission::create(['name' => 'see_posts','label'=>'دیدن پستها']);
        $permissions[] = Permission::create(['name' => 'see_show_post','label'=>'نمایش پست']);
        $permissions[] = Permission::create(['name' => 'create_post','label'=>'ایجاد پست']);
        $permissions[] = Permission::create(['name' => 'edit_post','label'=>'ویرایش پست']);
        $permissions[] = Permission::create(['name' => 'delete_post','label'=>'حذف پست']);

        $permissions[] = Permission::create(['name' => 'see_tags','label'=>'دیدن تگها']);
        $permissions[] = Permission::create(['name' => 'create_tag','label'=>'ایجاد تگ']);
        $permissions[] = Permission::create(['name' => 'edit_tag','label'=>'ویرایش تگ']);
        $permissions[] = Permission::create(['name' => 'delete_tag','label'=>'حذف تگ']);

        $permissions[] = Permission::create(['name' => 'see_categories','label'=>'دیدن دسته بندیها']);
        $permissions[] = Permission::create(['name' => 'see_show_category','label'=>'نمایش دسته بندی']);
        $permissions[] = Permission::create(['name' => 'create_category','label'=>'ایجاد دسته بندی']);
        $permissions[] = Permission::create(['name' => 'edit_category','label'=>'ویرایش دسته بندی']);
        $permissions[] = Permission::create(['name' => 'delete_category','label'=>'حذف دسته بندی']);

        $permissions[] = Permission::create(['name' => 'see_comments','label'=>'دیدن دیدگاهها']);
        $permissions[] = Permission::create(['name' => 'see_show_comment','label'=>'نمایش دیدگاه']);
        $permissions[] = Permission::create(['name' => 'change_approve_comment','label'=>'تایید دیدگاه']);
        $permissions[] = Permission::create(['name' => 'delete_comment','label'=>'حذف دیدگاه']);

        Role::create(['name' => 'user']);
        $role = Role::create(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
