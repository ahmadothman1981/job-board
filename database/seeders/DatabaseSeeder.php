<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


       

      \App\Models\User::factory(200)->create();
      $users = \App\Models\User::all()->shuffle();

for($u = 0; $u < 20; $u++){
    \App\Models\Employer::factory()->create([
        'user_id' => $users->pop()->id
    ]);
}
        $employes = \App\Models\Employer::all();
        for($i = 0; $i < 100; $i++){
            \App\Models\Job::factory()->create([
                'employer_id' => $employes->random()->id
            ]);
        }

        foreach($users as $user){
            $jobs = \App\Models\Job::inRandomOrder()->take(rand(1,4))->get();

            foreach($jobs as $job){
                \App\Models\JobApplication::factory()->create([
                    'user_id' => $user->id,
                    'job_id' => $job->id
                ]);
            }
        }
    }
}
