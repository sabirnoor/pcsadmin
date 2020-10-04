<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Quizinvitation extends Model {

	protected $table = 'quiz_invitation';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'quiz_id'];

	public static function getquizinvitation() {
		$data = DB::table('quiz_invitation as c1')
			->select('c1.id', 'c1.invitation_link', 'c1.otp', 'c1.sms_sent', 'c1.isVerified', 'c1.created_at as invitation_created', 'c2.quiz_title as quiz_title', 'c3.student_name', 'c3.contact_no')
			->join('quiz as c2', 'c2.id', '=', 'c1.quiz_id', 'LEFT')
			->join('student_master as c3', 'c3.id', '=', 'c1.student_master_id', 'LEFT')
			->where('c1.IsDelete', 0)
			->where('c2.isArchived', 0)
			->orderBy('c1.id', 'DESC')->paginate(25);

		return $data;
	}

}
?>