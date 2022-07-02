<?php

namespace App\Console\Commands;

use App\Jobs\NotifyAdminsForNoNVerifiedUsers;
use App\Models\User;
use App\Notifications\NotifyAdminsToVerifyProfiles;
use Illuminate\Console\Command;

class CheckNoNVerifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:non-verified-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if there are more then 5 non-verifid profies and notify admins by email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $nonVerifiedUsersCount = User::where('is_admin', false)->where('email_verified_at', null)->count();

        if($nonVerifiedUsersCount < 6) {
            echo "\nThere are " . $nonVerifiedUsersCount . " non-verified users. They can wait :) \n";
            return 0;
        }

        $admins = User::where('is_admin', true)->get();

        foreach ($admins as $admin) {
            dispatch(new NotifyAdminsForNoNVerifiedUsers($admin));
        }
    }
}
