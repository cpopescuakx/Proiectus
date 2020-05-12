<?php

namespace App\Jobs;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CityController;
use App\Exceptions\Exception;
use Auth;

class ProcessCSV implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $byuser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request, User $user)
    {
        $temp_file = $request->file('file');
        $timestamp = Carbon::now()->timestamp;
        $file = "$timestamp.csv";
        $this->file = $temp_file->storeAs('imports', $file);
        $this->byuser = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //sleep(10);
        $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $file = fopen("$storagePath"."$this->file", 'r');

        $i = 0;
        $data = array();
        while (($dataCSV = fgetcsv($file, 1000, "\t")) !== FALSE) {
            for ($c=0; $c < count($dataCSV); $c++) {
                $data[$i][] = $dataCSV[$c];
            }
            
            $i++;
        }
        fclose($file);

        $i = 1;
        $array = array();
        foreach ($data as $user) {
            try {
                $user = explode(';', $user[0]);
                $_user = new User;
                $_user->firstname = $user[0];
                $_user->lastname = $user[1];
                $_user->username = $user[2];
                $_user->dni = $user[3];
                $_user->email = $user[4];
                $_user->password = Hash::make($user[5]);
                $_user->id_city = CityController::getIdFromPostalCode($user[6]);
                $_user->id_role = $user[7];
                $_user->status = "active";
                array_push($array, $_user);
            } catch (\ErrorException $th) {
                Log::error($th);
            }
            $i++;
        }

        
        foreach ($array as $data) {
            try {
                $data->save();
                if ($data instanceof User) {
                    switch ($data->id_role) {
                        case '2':
                            Log::info($this->byuser->username . ' - [ IMPORT ] - users - Nou empleat: ' . $data->username . ' inserit!');
                            break;
                        case '4':
                            Log::info($this->byuser->username . ' - [ IMPORT ] - users - Nou professor: ' . $data->username . ' inserit!');

                            break;
                        default:
                            break;
                    }
                }
            } catch (\Illuminate\Database\QueryException $th) {
                Log::error($th);
            }
        }

        try {
            Storage::delete($this->file);
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
