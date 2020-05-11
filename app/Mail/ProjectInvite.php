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

    protected $invite;
    protected $project;
    protected $invited_by;
    protected $validationURL;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Project_invite $invite, String $url)
    {
        $this->invite = $invite;
        $this->project = Project::where('id_project', $this->invite->id_project)->first();
        $this->invited_by = User::find($this->invite->invited_by);
        $this->validationURL = $url;
    }

    /**
     * Build the message.
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
