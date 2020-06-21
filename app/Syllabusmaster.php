<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Syllabusmaster extends Model {
	
	protected $table = 'syllabusmaster';
	protected $primaryKey = 'id';
	protected $fillable = ['id','name','order_by','timestamp'];
	
	
	public static function SyllabusmasterList(){
		$data = DB::table('syllabusmaster as c1')
			->select('c1.name', 'c1.id','c1.filesname','c1.orders_by','c1.IsDelete','c2.name as classsyllabus')
			->join('categories as c2', 'c1.classsyllabus_id', '=', 'c2.id')
			->where('c1.IsDelete', 0)
			->orderBy('c1.id', 'DESC')->get();	
		return $data;
	}
  
}
?>