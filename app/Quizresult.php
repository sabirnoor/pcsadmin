<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Quizresult extends Model {
	
	protected $table = 'quiz_result';
	protected $primaryKey = 'result_id';
	protected $fillable = ['result_id'];
	
	 public static function getresultlist(){
        $data = DB::table('quiz_result as c1')
                        ->select('c1.result_id','c2.quiz_title as quiz_title','c3.name as subject_name','c4.student_name')
                        ->join('quiz as c2', 'c2.id', '=', 'c1.quizid','LEFT')                        
                        ->join('categories as c3', 'c3.id', '=', 'c2.subject_id','LEFT')                        
                        ->join('student_master as c4', 'c4.id', '=', 'c1.userid','LEFT')                        
                        //->where('c1.IsDelete', 0)
                        ->orderBy('c1.quizid', 'ASC')->get()->toArray();
        
		
        return $data;
    }
	
	public static function get_result_data($resultid){
        $data = DB::table('quiz_result as result')
                        ->select('result.result_id', 'result.userid', 'result.quizid',
						'answer.answer_id', 'answer.questionid', 'answer.optionchosen',
						'question.question_title','question.option1','question.option2', 'question.option3','question.option4','question.correct_answer','question.score')
                        ->join('quiz_answer as answer', 'result.result_id', '=', 'answer.resultid','LEFT')
                        ->join('question as question', 'answer.questionid', '=', 'question.id','LEFT')
                        ->where('result.result_id', $resultid)
                        ->orderBy('question.id', 'ASC')->get()->toArray();
        
        return $data;
    }
  
}
?>