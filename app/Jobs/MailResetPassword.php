<?php

namespace App\Jobs;

use App\Mail\EmailReset;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Dirape\Token\Token;

class MailResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id,)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = User::find($this->id);
        $data->remember_token =  (new Token())->Unique('users', 'remember_token', 60);
        $data->save();
        Mail::to($data->email)->send(new EmailReset($data));
    }
}
