<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;
use App\Models\Permission;

class SetupAppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->description = "User is Admin of Chefis";
        $admin->save();

        $user = new Role();
        $user->name = "user";
        $user->display_name = "User";
        $user->description = "User of Chefis Admin";
        $user->save();

        $client = new Role();
        $client->name = "chef";
        $client->display_name = "Chef";
        $client->description = "User is Chef of Chefis";
        $client->save();

        $driver = new Role();
        $driver->name = "driver";
        $driver->display_name = "Driver";
        $driver->description = "User is Driver of Chefis";
        $driver->save();

        $createUser = new Permission();
        $createUser->name = "create-users";
        $createUser->display_name = "Create Users";
        $createUser->description = "Create New Users";
        $createUser->save();

        $editUser = new Permission();
        $editUser->name = "edit-users";
        $editUser->display_name = "Edit Users";
        $editUser->description = "Edit Users";
        $editUser->save();

        $deleteUser = new Permission();
        $deleteUser->name = "delete-users";
        $deleteUser->display_name = "Delete Users";
        $deleteUser->description = "Delete Users";
        $deleteUser->save();

        $user = new User();
        $user->name = 'Admin User';
        $user->email = 'admin@chefis.com';
        $user->phone_number = '7894561230';
        $user->password = Hash::make('admin');
        $user->save();

        $admin->attachPermissions(array($createUser, $editUser, $deleteUser));
        $user->attachRole($admin);

        $user1 = new User();
        $user1->name = 'Chef User';
        $user1->email = 'chef@chefis.com';
        $user1->phone_number = '7894562230';
        $user1->password = Hash::make('123456');
        $user1->save();

        $client->attachPermissions(array($createUser, $editUser, $deleteUser));
        $user1->attachRole($client);
    }
}
