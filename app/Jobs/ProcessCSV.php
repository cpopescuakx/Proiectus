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
     * Al instanciar aquesta cua, crearà un fitxer local a la carpeta imports i serà guardat en una variable, també guarda l'usuari que ha muntat l'usuari
     * 
     * @param Request $request
     * @param User $user
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
     * Quan s'executa la cua, obri el fitxer que te guardat l'objecte i guarda el seu contingut a una variable, després el tanca.
     * A partir d'aquesta variable, recorre cada línia i crea un usuari.
     * 
     * Per acabar, s'haguin efectuat aquestes accions o no, borrarà el fitxer local.
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

                $_user->save();
                if ($_user instanceof User) {
                    switch ($_user->id_role) {
                        case '2':
                            Log::info($this->byuser->username . ' - [ IMPORT ] - users - Nou empleat: ' . $_user->username . ' inserit!');
                            break;

                        default:
                            break;
                    }
                }
            } catch (\ErrorException $th) {
                Log::error($th);
            }
            catch (\Illuminate\Database\QueryException $th) {
                Log::error($th);
            }
            $i++;
        }

        try {
            Storage::delete($this->file);
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
     /**
     * Execute the job.
     *
     * @return void
     */
    public function handleProfessor()
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
                $_employee->id_role = 4;
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
    public function handleStudents (Request $request) {
        // Comprova que el fitxer és un .csv
        // UserController::importStudents($request);
        $validar = Validator::make(
            [
                'file'      => $request->file,
                'extension' => strtolower($request->file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:csv',
            ]
        );

        if($validar->passes()) {
            $file = $request->file('file');
            $fileO = fopen($file, 'r');

            $importArr = array();

            $i = 0;

            while (($dadesCsv = fgetcsv($fileO, 1000, "\t")) !== FALSE) {
                $num = count($dadesCsv);

                for ($c=0; $c < $num; $c++) {

                    $importArr[$i][] = $dadesCsv [$c];

                }

                $i++;
            }

            fclose($fileO);

            foreach ($importArr as $import) {

                $student = new User;

                $student -> firstname = $import[0];
                $student -> lastname = $import[1];
                $student -> username = $import[2];
                $student -> dni = $import[3];
                $student -> email = $import[4];
                $student -> password = Hash::make($import[5]);
                $postalcode = $import[6];
                $student -> id_city = CityController::getIdFromPostalCode($postalcode);
                $student -> id_role = 3;
                $student -> status = "active";
                $student -> save();

            }

            Log::info($request->user()->username. ' - [ INSERT ] - users - Nou alumne: ' .$import[2]. ' inserit!');
            return redirect()->back()->with(['success' =>'Importació feta correctament.']);
        }
        else {
            return redirect()->back()->with(['errors' => $validar->errors()->all()]);
        }



    }
}
