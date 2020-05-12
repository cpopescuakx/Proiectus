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
