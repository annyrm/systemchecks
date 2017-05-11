<?php

use Illuminate\Database\Seeder;
use App\Check;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     protected $arrayCheques = array(
 		array(
 			'bank' => 'Bancomer',
 			'folio' => '1001',
 			'beneficiary' => 'Ana Teresa Ramírez Morones',
 			'amount' => '13000',
 			'expiration' => '2017-05-10'
 		),
 		array(
      'bank' => 'Banamex',
 			'folio' => '1002',
 			'beneficiary' => 'Tomás Perez',
 			'amount' => '20000',
 			'expiration' => '2017-05-11'
 		),
 		array(
      'bank' => 'Bancomer',
 			'folio' => '1003',
 			'beneficiary' => 'Samantha Rodriguez',
 			'amount' => '25000',
 			'expiration' => '2017-05-25'
 		),
    array(
      'bank' => 'HSBC',
 			'folio' => '1004',
 			'beneficiary' => 'Michelle Segura',
 			'amount' => '30000',
 			'expiration' => '2017-05-01'
 		),

 	);

     protected $arrayUsuarios = array(
         array(
             'name' => 'admin1',
             'email' => 'admin@ldap.com',
             'password' => '123',
             'admin'=> true
         ),
         array(
             'name' => 'user1',
             'email' => 'user1@ldap.com',
             'password' => '1234',
             'admin'=> false
         )
     );

     public function run()
     {
         self::seedCatalog();
         $this->command->info('Tabla catálogo inicializada con datos!');
         self::seedUsers();
         $this->command->info('Tabla usuarios inicializada con datos!');

     }

     private function seedCatalog(){
         DB::table('checks')->delete();
         foreach( $this->arrayCheques as $cheque ) {
             $c = new Check;
             $c->bank = $cheque['bank'];
             $c->folio = $cheque['folio'];
             $c->beneficiary = $cheque['beneficiary'];
             $c->amount = $cheque['amount'];
             $c->expiration = $cheque['expiration'];
             $c->save();
         }



     }

      private function seedUsers(){
         DB::table('users')->delete();
         foreach( $this->arrayUsuarios as $user ) {
             $u = new User;
             $u->name = $user['name'];
             $u->email = $user['email'];
             $u->password = bcrypt($user['password']);
             $u->admin=$user['admin'];
             $u->save();
         }
 }
}
