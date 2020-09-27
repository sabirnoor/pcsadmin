<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Quizschedule extends Model {
	
	protected $table = 'quiz_schedule';
	protected $primaryKey = 'id';
	protected $fillable = ['id','quiz_id'];
}
?>