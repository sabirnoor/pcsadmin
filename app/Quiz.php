<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {

	protected $table = 'quiz';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'quiz_title', 'timestamp'];

	public static function getquiz() {
		$data = DB::table('quiz as c1')
			->select('c1.id', 'c1.class_id', 'c1.subject_id', 'c1.quiz_title', 'c1.quiz_max_marks', 'c1.quiz_max_time', 'c1.quiz_total_question', 'c1.quiz_start_date', 'c1.quiz_start_time', 'c1.quiz_end_date', 'c1.quiz_end_time', 'c1.isPublished', 'c2.name as class_name', 'c3.name as subject_name')
			->join('categories as c2', 'c2.id', '=', 'c1.class_id', 'LEFT')
			->join('categories as c3', 'c3.id', '=', 'c1.subject_id', 'LEFT')
			->where('c1.IsArchived', 0)
			->where('c1.IsDelete', 0)
			->orderBy('c1.class_id', 'ASC')->get()->toArray();

		return $data;
	}

}
?>