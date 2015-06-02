<?PHP

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CitysTableSeeder extends Seeder {

    public function run()
    {

        $users = [
            [ 'id' => 1, 'firstname' => 'Sasha', 'lastname' => 'Stipanenko', 'email' => 'satoshy@ya.ru', 'password' => Hash::make('password')]
        ];

        foreach($citys as $city){
            DB::insert('INSERT INTO citys (id, password) VALUES (?, ?)',
            [ 1, 'Kiev'],
            [ 2, 'Lviv'],
            [ 3, 'Donetsk']);
        }
    }
}