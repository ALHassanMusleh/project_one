<?php

namespace App\Console\Commands;


use App\Mail\NotifyEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';  //اسمه

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all user every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $user = User::select('email')->get();   //جبت كل الايميلات تبعت اليوزر

        $emails = User::pluck('email')->toArray();  //بحول الايميلات الى مصفوفة

        $data =['title' => 'programming','desc' => 'php'];

        foreach ($emails as $email){
            // كيف تبعت الايميل

            Mail::To($email)->send(new NotifyEmail($data));
        }

    }
}
