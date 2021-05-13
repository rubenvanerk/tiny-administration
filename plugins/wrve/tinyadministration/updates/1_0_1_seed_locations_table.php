<?php namespace WRvE\TinyAdministration\Updates;

use Seeder;
use WRvE\TinyAdministration\Models\Location;

class SeedLocations extends Seeder
{
    public function run()
    {
        $molenlanden = Location::create(['name' => 'Molenlanden']);
        $molenlanden->children()->create(['name' => 'Arkel']);
        $molenlanden->children()->create(['name' => 'Bleskensgraaf']);
        $molenlanden->children()->create(['name' => 'Brandwijk']);
        $molenlanden->children()->create(['name' => 'Giessenburg']);
        $molenlanden->children()->create(['name' => 'Giessen-Oudekerk']);
        $molenlanden->children()->create(['name' => 'Goudriaan']);
        $molenlanden->children()->create(['name' => 'Groot-Ammers']);
        $molenlanden->children()->create(['name' => 'Hoogblokland']);
        $molenlanden->children()->create(['name' => 'Kinderdijk']);
        $molenlanden->children()->create(['name' => 'Langerak']);
        $molenlanden->children()->create(['name' => 'Molenaarsgraaf']);
        $molenlanden->children()->create(['name' => 'Nieuw-Lekkerland']);
        $molenlanden->children()->create(['name' => 'Nieuwpoort']);
        $molenlanden->children()->create(['name' => 'Ottoland']);
        $molenlanden->children()->create(['name' => 'Oud-Alblas']);
        $molenlanden->children()->create(['name' => 'Hoornaar']);
        $molenlanden->children()->create(['name' => 'Noordeloos']);
        $molenlanden->children()->create(['name' => 'Streefkerk']);
        $molenlanden->children()->create(['name' => 'Wijngaarden']);
        $molenlanden->children()->create(['name' => 'Schelluinen']);

        Location::create(['name' => 'Alblasserdam']);
        Location::create(['name' => 'Dordrecht']);
        Location::create(['name' => 'Papendrecht']);
    }
}
