<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Newsletter;
use User;
class Mail_message extends Model
{
    Newsletter::subscribe();
}
