<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Project_invite;
use App\Project;
use App\User;

class ProjectInvite extends Mailable
{
    use Queueable, SerializesModels;

    protected $project;
    protected $invited_by;
    protected $validationURL;
    
    /**
     * Agafa els valors necessaris per enviar el correu.
     * 
     * @param Project_invite $invite
     * @param String $url
     *
     * @return void
     */
    public function __construct(Project_invite $invite, String $url)
    {
        $this->project = Project::where('id_project', $invite->id_project)->first();
        $this->invited_by = User::find($invite->invited_by);
        $this->validationURL = $url;
    }

    /**
     * Construeix el missatge a partir de la vista emails.projectinvite passant-li l'informació que necessita.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.projectinvite')
                    ->with([
                        'project' => $this->project,
                        'invited_by' => $this->invited_by->username,
                        'url' => $this->validationURL
                    ]);
    }
}
