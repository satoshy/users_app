<?PHP

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [ 'id' => 1, 'firstname' => 'Sasha', 'lastname' => 'Stipanenko', 'email' => 'satoshy@ya.ru', 'password' => Hash::make('password')]
        ];

        foreach($users as $user){
            \User::create($user);
        }
    }
}