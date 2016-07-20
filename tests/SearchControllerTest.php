<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Front\CommentController

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

       $db = Outils_Bd::getInstance()->getConnexion();
       $sth = $db->prepare('SELECT * FROM songs');
       $sth->execute();
       $result = $sth->fetchAll();
       $this->assertCount(1,$result);
       $musique = Musique_Bd::lire(1);
       Musique_Bd::supprimer($musique);
       $musique1 = Musique_Bd::lire(1);

       $this->assertInstanceOf('App\modeles\Musique\Musique', $musique);
       $this->assertTrue("" == $musique1->getTitre());
       $this->assertTrue("" == $musique1->getFichier());

       $sth = $db->prepare('SELECT * FROM songs');
       $sth->execute();
       $result = $sth->fetchAll();
       $this->assertCount(0,$result);
     }

     public function signalTest{

     }

}
