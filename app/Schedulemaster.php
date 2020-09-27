<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Schedulemaster extends Model {
	
	protected $table = 'schedulemaster';
	protected $primaryKey = 'id';
	protected $fillable = ['id','name','order_by','timestamp'];
	
	
	public static function SchedulemasterList(){
		$data = DB::table('schedulemaster as c1')
			->select('c1.name', 'c1.id','c1.filesname','c1.orders_by','c1.IsDelete','c2.name as classschedule')
			->join('categories as c2', 'c1.classschedule_id', '=', 'c2.id')
			->where('c1.IsDelete', 0)
			->orderBy('c1.id', 'DESC')->get();	
		return $data;
	}
  
}
?>