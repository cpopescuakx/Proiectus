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
        $file = fopen("$storagePath/$this->file", 'r');

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
        foreach ($data as $employee) {
            try {
                $employee = explode(';', $employee[0]);
                $_employee = new User;
                $_employee->firstname = $employee[0];
                $_employee->lastname = $employee[1];
                $_employee->username = $employee[2];
                $_employee->dni = $employee[3];
                $_employee->email = $employee[4];
                $_employee->password = Hash::make($employee[5]);
                $_employee->id_city = CityController::getIdFromPostalCode($employee[6]);
                $_employee->id_role = 2;
                $_employee->status = "active";
                array_push($array, $_employee);
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
