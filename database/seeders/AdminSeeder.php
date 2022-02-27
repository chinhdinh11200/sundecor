<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WebInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Sundecor';
        $user->username = 'sundecor';
        $user->password = Hash::make('sundecor');
        $user->save();

        $webInfo = new WebInfo();
        $webInfo->tel1 = '';
        $webInfo->tel2 = '';
        $webInfo->hotline = '';
        $webInfo->receiveEmail = '';
        $webInfo->facebook = '';
        $webInfo->reason = '';
        $webInfo->address = '';
        $webInfo->tutorial = '';
        $webInfo->promotion = '';
        $webInfo->logo = '';
        $webInfo->banner_ad = '';
        $webInfo->site_name = '';
        $webInfo->description = '';
        $webInfo->keywords = '';
        $webInfo->title = '';
        $webInfo->sale = '';
        $webInfo->gift = '';
        $webInfo->save();
    }
}
