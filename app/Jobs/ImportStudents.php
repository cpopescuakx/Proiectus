<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\School;
use App\School_users;
use App\User;
use App\Controllers\UserController
use App\City;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Response;
use Validator;
use Illuminate\Support\Facades\Log;
use Image;
use Auth;
use App\Invite;
use App\Url;
use App\Jobs\ProcessCSV;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ImportStudents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
     public function handle (Request $request) {
         // Comprova que el fitxer és un .csv
         UserController::importStudents($request); 



     }
}
