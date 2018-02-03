<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = factory(User::class)->times(50)->make();
        $users = factory(User::class)->times(50)->make();
        User::insert($users->toArray());

        $user = User::find(1);
        $user->name = 'Aufree';
        $user->email = 'aufree@yousails.com';
        $user->password = bcrypt('password');
          $user->is_admin = true;
        $user->save();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
}
