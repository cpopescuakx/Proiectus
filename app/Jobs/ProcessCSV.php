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
                        case '4':
                            Log::info($this->byuser->username . ' - [ IMPORT ] - users - Nou professor: ' . $_user->username . ' inserit!');
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
}
