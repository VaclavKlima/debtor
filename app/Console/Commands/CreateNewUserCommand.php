<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateNewUserCommand extends Command
{
    protected $signature = 'debtor:create-new-user {email}';

    protected $description = 'Creates new user as Admin with the given Email and then sends password reset email.';

    public function handle(): int
    {
        $email = $this->input->getArgument('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email address');

            return Command::FAILURE;
        }

        $user = User::create([
            'email' => $email,
            'name' => 'Administrator',
            'password' => 'password_is_not_set',
        ]);

        $user->assignRole('admin', 'default');

        $user->sendPasswordResetNotification(Str::random(60));

        $this->info("User with email {$email} was successfully created");

        return Command::SUCCESS;
    }
}
