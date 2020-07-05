<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;use DB;

class Studentmaster extends Model {
	
	protected $table = 'student_master';
	protected $primaryKey = 'id';
	protected $fillable = ['id','student_name','timestamp'];		public static function getAllClass(){        $data = DB::table('student_master as c1')                        ->select('c1.present_class')                                                ->where('c1.IsDelete', 0)                        ->groupBy('c1.present_class')                        ->orderBy('c1.present_class', 'ASC')->get()->toArray();                       		        return $data;    }		public static function getfilteredstudents($class_name){        $data = DB::table('student_master as c1')                        ->select('c1.id','c1.student_name','c1.present_class','c1.branch')                                                ->where('c1.IsDelete', 0)                        ->where('c1.present_class', $class_name)                                                ->orderBy('c1.student_name', 'ASC')->get();                       		        return $data;    }	
}
?>