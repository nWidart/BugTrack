<?php
class SentrySeed extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // Create an admin user
        $user = Sentry::createUser(array(
            'email'     => 'n.widart@gmail.com',
            'password'  => 'test',
            'first_name' => 'Nicolas',
            'last_name' => 'Widart',
            'activated' => true
        ));

        // Create an Admin group
        Sentry::createGroup(array(
            'name'        => 'Admin',
            'permissions' => array(
                'admin' => 1,
                'users' => 1,
            ),
        ));

        // Find the group using the group id
        $adminGroup = Sentry::findGroupById(1);

        // Assign the group to the user
        $user->addGroup($adminGroup);
    }
}