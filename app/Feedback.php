<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
	
	protected $table = 'feedback';
	protected $primaryKey = 'id';
	protected $fillable = ['id','student_name','timestamp'];
  
}
?>