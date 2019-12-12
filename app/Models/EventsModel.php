<?php namespace App\Models;
use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table = 'events';
    protected $allowedFields = ['title','venue','date','time','status','user_id','status','attendance','description'];
}