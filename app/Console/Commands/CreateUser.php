<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::create([
            'name' => 'Emmanuel Olusanu',
            'email' => 'olusanuemmanuel@gmail.com',
            'password' => Hash::make('Password100!')
        ]);

        $this->info('User created successfully');
        return Command::SUCCESS;
    }
}
