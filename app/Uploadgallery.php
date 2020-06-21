<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Uploadgallery extends Model {
	
	protected $table = 'uploadgallery';
	protected $primaryKey = 'id';
	protected $fillable = ['id','name','order_by','timestamp'];
	
	public static function galleryList(){
		$data = DB::table('uploadgallery as c1')
			->select('c1.description', 'c1.id','c1.event_date','c1.images','c2.name as categoriesname')
			->join('categories as c2', 'c1.category_id', '=', 'c2.id')
			->where('c1.IsDelete', 0)
			->orderBy('c1.id', 'DESC')->get();	
		return $data;
	}
  
}
?>