<?php

use Illuminate\Database\Seeder;

class AssociationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('associations')->insert([
            'name' => 'Association de Football ACBE',
            'picture' => '/images/assos1.png',
            'address' => 'allée des tilleuls',
            'number_street' => '9',
            'city_code' => '76440',
            'city' => 'Forges les eaux',
            'country' => 'France',
            'longitude' => 1.5520841999999675,
            'lattitude' => 49.60879269999999,
            'description' => 'ACBE est le club de football par excellence, issu de fusion entre différentes ville du pays, venez partager de bon moments avec nous (3ème mi-temps)',
            'user_id' => 2,
            'sport_id' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_associations')->insert([
            'user_id' => 2,
            'association_id' => 1,
            'is_admin' => true,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('associations')->insert([
            'name' => 'Association de Football USF',
            'picture' => '/images/assos2.png',
            'address' => 'Rue de Gisors',
            'number_street' => '38',
            'city_code' => '95300',
            'city' => 'Pontoise',
            'country' => 'France',
            'longitude' => 2.096087099999977,
            'lattitude' => 49.0524649,
            'description' => 'USF est le club de football par excellence, issu de fusion entre différentes ville du pays, venez partager de bon moments avec nous (3ème mi-temps)',
            'user_id' => 3,
            'sport_id' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_associations')->insert([
            'user_id' => 3,
            'association_id' => 2,
            'is_admin' => true,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('associations')->insert([
            'name' => 'Salle de sport Paris',
            'picture' => '/images/assos3.jpg',
            'address' => 'Route de la Reine',
            'number_street' => '8',
            'city_code' => '92100',
            'city' => 'Boulogne-Billancourt',
            'description' => 'Le club Fitness Park situé à Meylan près de Grenoble vous accueille de 6h à 23h tous les jours de la semaine dans une ambiance très lounge associant plaisir et bien être.

Le club propose de nombreux cours collectifs comme le Body Pump, le Body Balance, le Body Combat , des cours cuisses abdos fessiers et bien d\'autres encore, ouverts à toutes les générations et pour tous les niveaux. Vous avez également accès aux appareils de musculation et de cardio-training.

La salle de sport vous propose des programmes d\'entraînement personnalisés qui vous permettront d\'atteindre plus facilement vos objectifs personnels. De plus, elle dispose d\'un coach nutrition qui permet de compléter vos entraînements, pour une remise en forme optimale.

On a aimé : La plateforme vibrante qui permet de brûler des graisses rapidement !

Alors, conquis(e) ? Allez vite enfiler votre jogging ! Gymlib.com vous souhaite une bonne séance. :)

A Prévoir : un cadenas pour les vestiaires, des chaussures spécifiques pour la salle et une serviette pour protéger les appareils.

Attention, pour votre première séance, il est impératif de se rendre à la salle durant les horaires d’accueil :
Du lundi au samedi : 10h-23h
Dimanche : 14h-23h ',
            'country' => 'France',
            'longitude' => 2.2508936000000404,
            'lattitude' => 48.8389062,
            'user_id' => 2,
            'sport_id' => 15,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_associations')->insert([
            'user_id' => 2,
            'association_id' => 3,
            'is_admin' => true,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
