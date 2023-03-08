<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'john Doe',
            'email' => 'john@gmail.com',
        ]);
         Listing::factory(6)->create([
            'user_id' => $user->id
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create(
        //     [
        //         'title' => 'laravel senior developers',
        //         'tags' => 'laravel,javascript', 
        //         'company' =>'arcelCapital',
        //         'location' => 'yaounde',
        //         'email' =>'kontcheu23@gmail.com',
        //         'website' => 'google.com',
        //         'description' => 'lorem;nvevnebvjvjdvjkd
        //         jkdnvkdfnvkdnvkdfvlbvilahreliar
        //         jklbvsjblsdvbilsdbvlisdfbvillbsvbli',
                
        //     ]
        // );
        // Listing::create(
        //     [
        //         'title' => 'laravel junior',
        //         'tags' => 'laravel,javascript,php', 
        //         'company' =>'acmecom',
        //         'location' => 'yaounde',
        //         'email' =>'kontcheu@gmail.com',
        //         'website' => 'google.com',
        //         'description' => 'lorem;nvevnebvjvjdvjkd
        //         jkdnvkdfnvkdnvkdfvlbvilahreliar
        //         jklbvsjblsdvbilsdbvlisdfbvillbsvbli',
                
        //     ]

        // );
    }
}
