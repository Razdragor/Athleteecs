<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Comment;

class CommentControllerTest extends TestCase
{
    /**
     * To test CommentController
     *
     * @return void
     */

     public function validatorTest(){

     }

     public function storeTest(){

     }

     public function destroyTest(){

         $commentaire = Comment::create([
     		'id' => '250',
             'user_id' => '1',
             'publication_id' => 1,
             'messages' => 'mon super commentaire de test',
             'score' => 1,
             'created_at' => Carbon\Carbon::now()->subHour(2),
             'updated_at' => Carbon\Carbon::now()->subHour(2)
     		]);

       $commentaire = Comment::find(250);
       Comment::delete(250);
       $commentaire = Comment::find(250);

     }

     public function signalTest(){

     }

}
