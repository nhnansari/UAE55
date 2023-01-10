<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates admin with username admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = env('ADMIN_EMAIL',"nadiransarionline@gmail.com");
        $user  = User::create([
           "name"=>"admin",
           "email"=>$email,
           "email_verified_at"=>Carbon::today()->toDateTimeString(),
            "password"=>Hash::make('openopen')
        ]);
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'admin']);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
       // $user = User::find($id);
        $user->assignRole($role);

        $this->comment("email: ".$email," password: openopen");
        return Command::SUCCESS;
    }
}
