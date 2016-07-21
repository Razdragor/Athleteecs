<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testRegisterLink()
    {   
         $this->visit('/login')
         ->click('register')
         ->seePageIs('/register');

    }

    public function testNewUserRegistration()
	{

		$this->withoutEvents();

	    $this->visit('/register')
	         ->type('Jacquie', 'firstname')
	         ->type('Michel', 'lastname')
	         ->type('jm@gmail.com', 'email')
	         ->type('jm@gmail.com', 'email_confirmation')
	         ->type('Delicieux', 'password')
	         ->type('Delicieux', 'password_confirmation')
	         ->select('1','day')
	         ->select('2','month')
	         ->select('1990','year')
	         ->select('homme','sexe')
	         ->press('register')
	         ->seePageIs('/login');
	}
	
	public function testNewUser()
	{
		$this->seeInDatabase('users', ['email' => 'jm@gmail.com']);
	}

}
