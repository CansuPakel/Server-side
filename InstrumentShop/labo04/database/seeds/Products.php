<?php

use Illuminate\Database\Seeder;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('products')->insert([
			['id'=> 1, 'category_id' =>1, 'name'=> 'Alhambra 1C', 'price'=>369.00, 'description'=>'De Alhambra 1C is een instapmodel nylon gitaar. Veel betaalbare nylonsnarige gitaren worden vandaag de dag in het Verre Oosten gemaakt. De 1C word daarentegen nog steeds in Spanje gemaakt. Het bovenblad van massief ceder geeft de gitaar een warme klank. Naast het massieve bovenblad van ceder heeft de 1C een zij- en achterblad van mahonie. Deze houtsoort heeft tevens een mooie donkere kleur.'],
			['id'=> 2, 'category_id' =>1, 'name'=> 'Juan Salvador 2C', 'price'=>249.00, 'description'=>'De Juan Salvador 2C is dé muziekschool standaard gitaar die aangeraden wordt door docenten. Deze Juan Salvador 2C is het grote broertje van de 2C Cadet. De gitaar is bijzonder concurrerend qua prijs en kwaliteit. Voor deze kwaliteit is een Europees handgemaakte gitaar niet goedkoper te vinden!'],
			['id'=> 3, 'category_id' =>1, 'name'=> 'Admira Malaga', 'price'=>279.00, 'description'=>'Viva España! Heerlijke tapas, wijn, zonvakanties en de beste gitaren. Al het goede uit Spanje komt samen in deze fraaie klassieke gitaar met massief cederhouten bovenblad. Het zij- en achterblad is gemaakt van sapelly hout. '],
			['id'=> 4, 'category_id' =>1, 'name'=> 'Admira Alba', 'price'=>159.00, 'description'=>'De eerste van een gloednieuwe serie gitaren van Admira. Dit kan je echt een revolutie noemen in de markt van klassieke gitaren voor beginners. Deze in het verre oosten gemaakte starter-gitaar vangt de essentie van een origineel Admira instrument uit Spanje, maar is toch zeer betaalbaar. De productie van deze gitaren gebeurt door luthiers die zijn opgeleid door de Spaanse vakmensen.'],
			['id'=> 5, 'category_id' =>2, 'name'=> 'Piano123', 'price'=>1000.00, 'description'=>'Dit is een zwarte piano'],
		]);
    }
}
