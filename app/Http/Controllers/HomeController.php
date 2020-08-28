<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Auth;

use DB;

use App\Staticcontent;

use App\Categories;

use App\uploadgallery;

use Validator;

use App\User;

use App\Feedback;

use App\Studentmaster;
use App\Quiz;
use App\Question;
use App\Quizresult;
use App\Quizanswer;
use App\Quizinvitation;

class HomeController extends Controller
 {

    /**

    * Create a new controller instance.

    *

    * @return void

    */

    public function __construct()
 {

        $this->middleware( 'auth' );
    }

    /**

    * Show the application dashboard.

    *

    * @return \Illuminate\Http\Response

    */

    public function index()
 {

        //echo '<pre>';
        //print_r( Auth::user() );
        //die;

        return view( 'home' );
    }

    public function dashboard()
 {

        //echo '<pre>';
        //print_r( Auth::user() );        

        return view( 'home' );
    }

    public function ourmotto( Request $request )
 {
       
        $details = Staticcontent::where( array( 'page_name' => 'ourmotto' ) )->first();

        if ( $request->isMethod( 'post' ) ) {

            $post = $request->all();

            $data = array(

                'page_name' => $post['page_name'],

                'contents' => $post['contents'],

                'created_at' => date( 'Y-m-d H:i:s' ),

                'updated_at' => date( 'Y-m-d H:i:s' )

            );

            if ( empty( $details ) ) {

                $insert = Staticcontent::insert( $data );
            } else {

                $insert = Staticcontent::where( 'page_name', $post['page_name'] )->update( $data );
            }

            if ( $insert ) {

                return redirect( 'ourmotto' )->with( 'msgsuccess', 'Save successfully' );
            }
        }

        return view( 'staticpages/ourmotto', compact( 'details' ) );
    }

    public function profile( Request $request )
 {

        if ( $request->isMethod( 'post' ) ) {

            $user = Auth::user();

            $post = $request->all();

            $newPassword = $post['password'];

            $validator = Validator::make( $post, [

                'password' => 'required|string|min:6|confirmed',

                'password_confirmation' => 'required|string|min:6|same:password'

            ] );

            if ( $validator->fails() ) {

                return redirect( 'profile' )->with( 'msgerror', 'Fill-out the form correctly. Try again!' );
            }

            if ( Hash::check( $post['cpassword'], $user->password ) ) {

                $user_id = $user->id;

                $obj_user = User::find( $user_id )->first();

                $obj_user->password = Hash::make( $newPassword );

                $obj_user->save();

                return redirect( 'profile' )->with( 'msgsuccess', 'Password Change successfully' );
            } else {

                return redirect( 'profile' )->with( 'msgerror', 'Invalid current password!' );
            }

           
        }

        return view( 'profile' );
    }

    // Category section

    public function gallerycategory( Request $request, $id = null )
 {

        $CategoriesList = Categories::where( array( 'IsDelete' => 0, 'entity_type' => 'gallerycategory' ) )->orderBy( 'created_at', 'DESC' )->get();

        if ( $request->isMethod( 'post' ) ) {

            $post = $request->all();

            $data = array(

                'name' => $post['title'],

                'entity_type' => 'gallerycategory',

                'IsDelete' => 0,

                'created_at' => date( 'Y-m-d H:i:s' ),

                'updated_at' => date( 'Y-m-d H:i:s' )

            );
            

            if ( empty( $id ) ) {

                $insert = Categories::insert( $data );

                return redirect( 'gallerycategory' )->with( 'msgsuccess', 'Save successfully' );
            } else {

                $insert = Categories::where( 'id', $id )->update( $data );

                return redirect( 'gallerycategory' )->with( 'msgsuccess', 'Update successfully' );
            }
        }

        $details = Categories::where( array( 'id' => $id ) )->first();

        return view( 'category/gallerycategory', compact( 'CategoriesList', 'id', 'details' ) );
    }

    public function deletegallcat( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date( 'Y-m-d H:i:s' )

            );

            $result = Categories::where( 'id', $id )->update( $data );

            if ( $result ) {

                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );

                exit;
            } else {

                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );

                exit;
            }
        } else {

            die( 'Oops invalid request!!' );
        }
    }

    public function deletegalleryimage( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date( 'Y-m-d H:i:s' )

            );

            $result = uploadgallery::where( 'id', $id )->update( $data );

            if ( $result ) {

                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );

                exit;
            } else {

                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );

                exit;
            }
        } else {

            die( 'Oops invalid request!!' );
        }
    }

    // Feedback section

    public function feedback( Request $request, $id = null )
 {

        $FeedbackList = Feedback::where( array( 'IsDelete' => 0 ) )->orderBy( 'created_at', 'DESC' )->get();

        if ( $request->isMethod( 'post' ) ) {

            $post = $request->all();

            $data = array(

                'student_master_id' => $post['student_master_id'],

                'student_name' => $post['student_name'],

                'admission_no' => $post['admission_no'],

                'roll_no_previous' => $post['roll_no_previous'],

                'present_class' => $post['present_class'],

                'contact_no' => $post['contact_no'],

                'whatsapp_no' => $post['whatsapp_no'],

                'comments' => $post['comments'],

                'technical_issue' => isset( $post['technical_issue'] ) ? $post['technical_issue'] : '',

                'suggestion' => isset( $post['suggestion'] ) ? $post['suggestion'] : '',

                'isPublished' => isset( $post['isPublished'] ) ? 1 : 0,

                'updated_at' => date( 'Y-m-d H:i:s' )

            );

           
            if ( empty( $id ) ) {

                $data['created_at'] = date( 'Y-m-d H:i:s' );

                $data['IsDelete'] = 0;

                $insert = Feedback::insert( $data );

                return redirect( 'feedbacklist' )->with( 'msgsuccess', 'Save successfully' );
            } else {

                $insert = Feedback::where( 'id', $id )->update( $data );

                return redirect( 'feedbacklist' )->with( 'msgsuccess', 'Update successfully' );
            }
        }

        $details = Feedback::where( array( 'id' => $id ) )->first();

        return view( 'feedback/feedback', compact( 'FeedbackList', 'id', 'details' ) );
    }

    public function feedbacklist( Request $request, $id = null )
 {

        $FeedbackList = Feedback::where( array( 'IsDelete' => 0 ) )->orderBy( 'created_at', 'DESC' )->get();

        return view( 'feedback/feedback-list', compact( 'FeedbackList', 'id', 'details' ) );
    }

    public function deletefeedback( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date( 'Y-m-d H:i:s' )

            );

            $result = Feedback::where( 'id', $id )->update( $data );

            if ( $result ) {

                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );

                exit;
            } else {

                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );

                exit;
            }
        } else {

            die( 'Oops invalid request!!' );
        }
    }

    // Studentmaster section

    public function studentmaster( Request $request, $id = null )
 {

        $StudentmasterList = Studentmaster::where( array( 'IsDelete' => 0 ) )->orderBy( 'created_at', 'DESC' )->get();

        if ( $request->isMethod( 'post' ) ) {

            $post = $request->all();

            $data = array(
                'student_name' => $post['student_name'],
                'Date_of_Birth' => DateFormates( $post['Date_of_Birth'], '-' ),
                'Admission_Date' => DateFormates( $post['Admission_Date'], '-' ),
                'Father_Name' => $post['Father_Name'],
                'Mother_Name' => $post['Mother_Name'],
                'Sex' => $post['Sex'],
                'Roll_No' => $post['Roll_No'],
                'Address' => $post['Address'],
                'branch' => $post['branch'],

                'admission_no' => $post['admission_no'],

                'roll_no_previous' => $post['roll_no_previous'],

                'present_class' => $post['present_class'],

                'contact_no' => $post['contact_no'],

                'whatsapp_no' => $post['whatsapp_no'],

                'updated_at' => date( 'Y-m-d H:i:s' )

            );

            

            if ( empty( $id ) ) {

                $data['admission_ref_no'] = ''; //in add mode only
				
				$data['created_at'] = date( 'Y-m-d H:i:s' );
                $data['IsDelete'] = 0;

                $insert = Studentmaster::insert( $data );

                return redirect( 'studentmaster' )->with( 'msgsuccess', 'Save successfully' );
            } else {

                $insert = Studentmaster::where( 'id', $id )->update( $data );

                return redirect( 'studentmaster' )->with( 'msgsuccess', 'Update successfully' );
            }
        }

        $details = Studentmaster::where( array( 'id' => $id ) )->first();

        return view( 'feedback/studentmaster', compact( 'StudentmasterList', 'id', 'details' ) );
    }
	
   public function studentmasterview( Request $request, $id = null )
   {
       
        $details = Studentmaster::where( array( 'id' => $id ) )->first();
		
		 $subjectList = Categories::where( array( 'IsDelete' => 0, 'entity_type' => 'subjects' ) )->orderBy( 'id', 'ASC' )->get()->toArray();
		 

        return view( 'feedback/studentmasterview', compact( 'id', 'details', 'subjectList' ) );
    }

    public function deletestudentmaster( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date( 'Y-m-d H:i:s' )

            );

            $result = Studentmaster::where( 'id', $id )->update( $data );

            if ( $result ) {

                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );

                exit;
            } else {

                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );

                exit;
            }
        } else {

            die( 'Oops invalid request!!' );
        }
    }

    public function sendsms( Request $request )
 {
        if ( $request->isXmlHttpRequest() ) {
            $post = $request->all();
           
            if ( isset( $post['studentId'] ) && !empty( $post['studentId'] ) ) {
                foreach ( $post['studentId'] as $value ) {
                    $shortCode =  base_convert( rand( 1000, 99999 ), 10, 36 );
                    $result = Studentmaster::where( 'id', $value )->first();

                    if ( $result ) {
                        $data = array(
                            'student_master_id' => $value,
                            'shortCode' => $shortCode,
                            'student_name' => $result->student_name,
                            'admission_no' => $result->admission_no,
                            'roll_no_previous' => $result->roll_no_previous,
                            'present_class' => $result->present_class,
                            'contact_no' => $result->contact_no,
                            'whatsapp_no' => $result->whatsapp_no,
                            'feedbackmessage' => $post['feedbackmessage'],
                            'comments' => '',
                            'technical_issue' => '',
                            'suggestion' => '',
                            'isPublished' => 0,
                            'IsDelete' => 0,
                            'created_at' => date( 'Y-m-d H:i:s' ),
                            'updated_at' => date( 'Y-m-d H:i:s' )
                        );
                        $insertId = Feedback::insertGetId( $data );
                        if ( $insertId ) {
                            $feedbackmessage = $post['feedbackmessage'] . ' ' . 'http://www.pcskhalispur.com/di2/' . $shortCode;
                            $mobileno = $result->contact_no;
                            //$post['mobileno'];
                            $msg = str_replace( ' ', '%20', $feedbackmessage );

                            $url = "http://shikshakiore.com/cpc/isssms.aspx?mobile=$mobileno&msgtxt=$msg&user=INPCSK&lang=english&name=1300";

                            $ch = curl_init();
                            curl_setopt( $ch, CURLOPT_URL, $url );
                            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                            $curl_response = curl_exec( $ch );
                            //print_r( $curl_response );
                            curl_close( $ch );
                            $result = json_decode( $curl_response, true );
                        }
                    }
                }
                if ( isset( $result['status'] ) && $result['status'] == 1 ) {
                    echo json_encode( array( 'success' => true, 'message' => 'Message Sent Successfully' ) );
                    exit;
                } else {
                    echo json_encode( array( 'success' => false, 'message' => 'Oops something went wrong! try again.' ) );
                    exit;
                }
            }
           
            $shortCode =  base_convert( rand( 1000, 99999 ), 10, 36 );
            $result = Studentmaster::where( 'id', $post['studentId'] )->first();
            if ( $result ) {
                $data = array(
                    'student_master_id' => $post['studentId'],
                    'shortCode' => $shortCode,
                    'student_name' => $result->student_name,
                    'admission_no' => $result->admission_no,
                    'roll_no_previous' => $result->roll_no_previous,
                    'present_class' => $result->present_class,
                    'contact_no' => $result->contact_no,
                    'whatsapp_no' => $result->whatsapp_no,
                    'feedbackmessage' => $post['feedbackmessage'],
                    'comments' => '',
                    'technical_issue' => '',
                    'suggestion' => '',
                    'isPublished' => 0,
                    'IsDelete' => 0,
                    'created_at' => date( 'Y-m-d H:i:s' ),
                    'updated_at' => date( 'Y-m-d H:i:s' )
                );
                $insertId = Feedback::insertGetId( $data );
            }
            if ( $insertId ) {
                $feedbackmessage = $post['feedbackmessage'] . ' ' . 'http://www.pcskhalispur.com/di2/' . $shortCode;
                $mobileno = $result->contact_no;
                //$post['mobileno'];
                $msg = str_replace( ' ', '%20', $feedbackmessage );

                $url = "http://shikshakiore.com/cpc/isssms.aspx?mobile=$mobileno&msgtxt=$msg&user=INPCSK&lang=english&name=1300";

                $ch = curl_init();
                curl_setopt( $ch, CURLOPT_URL, $url );
                curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $curl_response = curl_exec( $ch );
                //print_r( $curl_response );
                curl_close( $ch );
                $result = json_decode( $curl_response, true );
                if ( isset( $result['status'] ) && $result['status'] == 1 ) {
                    echo json_encode( array( 'success' => true, 'message' => 'Message Sent Successfully' ) );
                    exit;
                } else {
                    echo json_encode( array( 'success' => false, 'message' => 'Oops something went wrong! try again.' ) );
                    exit;
                }
            } else {
                echo json_encode( array( 'success' => false, 'message' => 'Record not found.' ) );
                exit;
            }
            //static url

        } else {
            die( 'Oops invalid request!!' );
        }
    }

    // Quiz section

    public function quiz( Request $request, $id = null )
 {

        if ( $request->isMethod( 'post' ) ) {

            $post = $request->all();

            $quiz_start_time = $post['start_time_hour'] . ':' . $post['start_time_min'] . ':00';
            $quiz_end_time = $post['end_time_hour'] . ':' . $post['end_time_min'] . ':00';
            $data = array(

                'class_id' => $post['class_id'],
                'subject_id' => $post['subject_id'],
                'quiz_title' => $post['quiz_title'],
                'quiz_max_marks' => $post['quiz_max_marks'],
                'quiz_max_time' => $post['quiz_max_time'],
                'quiz_total_question' => $post['quiz_total_question'],
                'quiz_start_date' => DateFormates( $post['quiz_start_date'], '-' ),
                'quiz_start_time' => $quiz_start_time,
                'quiz_end_date' => DateFormates( $post['quiz_end_date'], '-' ),
                'quiz_end_time' => $quiz_end_time,
                'isPublished' => isset( $post['isPublished'] ) ? 1 : 0,

                'updated_at' => date( 'Y-m-d H:i:s' )

            );

           
            if ( empty( $id ) ) {

                $data['created_at'] = date( 'Y-m-d H:i:s' );

                $data['IsDelete'] = 0;

                $insert = Quiz::insert( $data );

                return redirect( 'quizlist' )->with( 'msgsuccess', 'Save successfully' );
            } else {

                $insert = Quiz::where( 'id', $id )->update( $data );

                return redirect( 'quizlist' )->with( 'msgsuccess', 'Update successfully' );
            }
        }

        $details = Quiz::where( array( 'id' => $id ) )->first();

        $ClassList = Categories::where( array( 'IsDelete' => 0, 'entity_type' => 'classsyllabus' ) )->orderBy( 'id', 'ASC' )->get();

        $SubjectList = Categories::where( array( 'IsDelete' => 0, 'entity_type' => 'subjects' ) )->orderBy( 'id', 'ASC' )->get();

        return view( 'quiz/quiz', compact( 'id', 'details', 'ClassList', 'SubjectList' ) );
    }

    public function quizlist( Request $request, $id = null )
 {

        $QuizList = Quiz::getquiz();

        return view( 'quiz/quiz-list', compact( 'QuizList', 'id' ) );
    }

    public function deletequiz( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date( 'Y-m-d H:i:s' )

            );

            $result = Quiz::where( 'id', $id )->update( $data );

            if ( $result ) {

                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );

                exit;
            } else {

                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );

                exit;
            }
        } else {

            die( 'Oops invalid request!!' );
        }
    }
	
	public function archivequiz(Request $request, $id = null)
    {

        if ($request->isXmlHttpRequest()) {

            $data = array(

                'isArchived' => 1,

                'updated_at' => date('Y-m-d H:i:s')

            );

            $result = Quiz::where('id', $id)->update($data);

            if ($result) {

                echo json_encode(array('success' => true, 'message' => 'Archived Successfully'));

                exit;
            } else {

                echo json_encode(array('success' => false, 'message' => 'Oops unable to delete! try again.'));

                exit;
            }
        } else {

            die('Oops invalid request!!');
        }
    }
	
	//Get all questions of a quiz
	public function quizquestions(Request $request, $id)
    {
        $quizdetails = Quiz::where(array('id' => $id))->first();
		$QuizquestionsList = Question::getquizquestions($id);
       
        return view('quiz/quiz-question-list', compact('quizdetails','QuizquestionsList', 'id'));
    }

    // Question section

    public function question( Request $request, $id = null )
 {

        if ( $request->isMethod( 'post' ) ) {

            $post = $request->all();

            $data = array(
                'quizid' => $post['quizid'],
                'question_title' => $post['question_title'],
                'option1' => $post['option1'],
                'option2' => $post['option2'],
                'option3' => $post['option3'],
                'option4' => $post['option4'],
                'correct_answer' => $post['correct_answer'],
                'score' => 1,  // default score
                'updated_at' => date( 'Y-m-d H:i:s' )
            );

           
            if ( empty( $id ) ) {

                $data['created_at'] = date( 'Y-m-d H:i:s' );

                $data['IsDelete'] = 0;

                $insert = Question::insert( $data );

                return redirect( 'questionlist' )->with( 'msgsuccess', 'Save successfully' );
            } else {

                $insert = Question::where( 'id', $id )->update( $data );

                return redirect( 'questionlist' )->with( 'msgsuccess', 'Update successfully' );
            }
        }

        $QuizList = Quiz::getquiz();
        $details = Question::where( array( 'id' => $id ) )->first();

        return view( 'quiz/question', compact( 'QuestionList', 'id', 'details', 'QuizList' ) );
    }

    public function questionlist( Request $request, $id = null )
 {

        //$QuestionList = Question::where( array( 'IsDelete' => 0 ) )->orderBy( 'created_at', 'DESC' )->get();
        $QuestionList = Question::getquestion();
        //print_r( $QuestionList );
        

        return view( 'quiz/question-list', compact( 'QuestionList', 'id', 'details' ) );
    }

    public function deletequestion( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date( 'Y-m-d H:i:s' )

            );

            $result = Question::where( 'id', $id )->update( $data );

            if ( $result ) {

                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );

                exit;
            } else {

                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );

                exit;
            }
        } else {

            die( 'Oops invalid request!!' );
        }
    }

    // Result section

    public function result( Request $request, $id = null )
 {

        $details = Quizresult::where( array( 'result_id' => $id ) )->first();

        $result_data = Quizresult::get_result_data( $id );

        $quizid = $details->quizid;

        $quiz_details = Quiz::where( array( 'id' => $quizid ) )->first();

        $correct_answer = 0;
        $wrong_answer = 0;
        $user_score = 0;
        $quiz_full_marks = 0;
        $percentage = 0;
        $final_status = '';
		$question_attempted = 0;

        if ($result_data) {
            foreach ($result_data as $value) {
                $value = (array) $value;
                if(isset($value['optionchosen'])){
					if ($value['optionchosen'] == $value['correct_answer']) {
						$correct_answer++;
						$user_score += $value['score'];
					}
					$question_attempted++;
				}
            }
        }

        $quiz_total_question = Question::where(array('quizid' => $quizid,'IsDelete' => 0))->get()->count();
		$quiz_full_marks = $quiz_total_question * 1; // each question has 1 mark        

        $wrong_answer = $question_attempted-$correct_answer;

        if ($quiz_full_marks > 0) {
            $percentage = round(($user_score*100/$quiz_full_marks),2);
        }
        if ($percentage >= 33) {
            $final_status = 'Pass';
        } else {
            $final_status = 'Fail';
        }

        $result_params = array(
            'final_status' => $final_status,
            'user_score' => $user_score,
            'quiz_full_marks' => $quiz_full_marks,
			'quiz_total_question' => $quiz_total_question,                
            'question_attempted' => $question_attempted, 
            'percentage' => $percentage,
            'correct_answer' => $correct_answer,
            'wrong_answer' => $wrong_answer
        );

        return view( 'result/result', compact( 'id', 'details', 'result_params' ) );
    }

    public function resultlist( Request $request, $id = null )
 {
        $QuizresultList = Quizresult::getresultlist();
        
        return view( 'result/result-list', compact( 'QuizresultList', 'id' ) );
    }

    public function deleteresult( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date( 'Y-m-d H:i:s' )

            );

            $result = Quizresult::where( 'result_id', $id )->update( $data );

            if ( $result ) {

                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );

                exit;
            } else {

                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );

                exit;
            }
        } else {

            die( 'Oops invalid request!!' );
        }
    }

    public function sendinvitation( Request $request, $id = null )
 {
        $post = $request->all();
        if ( is_localhost() ) {
            $front_url = 'http://localhost/pcskhalipur/';
        } else {
            $front_url = 'http://pcskhalispur.com/';
        }

        if ( $post['invId'] ) {
            foreach ( $post['invId'] as $value ) {
                $details = Quizinvitation::where( array( 'id' => $value ) )->first()->toArray();
                $quiz_details = Quiz::select( 'quiz_start_date', 'quiz_start_time' )->where( array( 'id' => $details['quiz_id'], 'IsDelete' => 0 ) )->first();
                $student_details = Studentmaster::select( 'present_class', 'student_name', 'contact_no' )->where( array( 'id' => $details['student_master_id'], 'IsDelete' => 0 ) )->first();
                $startDate = date( 'dS F', strtotime( $quiz_details->quiz_start_date ) );
                $startTime = date( 'h:i a', strtotime( $quiz_details->quiz_start_time ) );
                $message = 'Dear students analyse your skill with on line Periodic Test-1 going to start from ' . $startDate . ' from ' . $startTime . '.just one click here ';
                $MsgLink = $front_url . 'din/' . $details['invitation_link'];
                $quizmessage = $message . ' ' . $MsgLink . ' to start the test';
                $dataupdate = array(
                    'sms_sent' => 1,
                    'updated_at' => date( 'Y-m-d H:i:s' )
                );

                $mobileno = $student_details->contact_no;
                $msg = str_replace( ' ', '%20', $quizmessage );

                $url = "http://shikshakiore.com/cpc/isssms.aspx?mobile=$mobileno&msgtxt=$msg&user=INPCSK&lang=english&name=1300";

                $ch = curl_init();
                curl_setopt( $ch, CURLOPT_URL, $url );
                curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $curl_response = curl_exec( $ch );
                curl_close( $ch );
                $result = json_decode( $curl_response, true );
                if ( isset( $result['status'] ) && $result['status'] == 1 ) {
                    Quizinvitation::where( 'id', $value )->update( $dataupdate );
                }
            }
            if ( isset( $result['status'] ) && $result['status'] == 1 ) {
                echo json_encode( array( 'success' => true, 'message' => 'Message Sent Successfully', 'url' => url( 'invitation' ) ) );
                exit;
            } else {
                echo json_encode( array( 'success' => false, 'url' => url( 'invitation' ), 'message' => 'Oops something went wrong! try again.' ) );
                exit;
            }
        }
    }

    public function invitation( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $post = $request->all();
            if ( is_localhost() ) {
                $front_url = 'http://localhost/pcskhalipur/';
            } else {
                $front_url = 'http://pcskhalispur.com/';
            }
            if (isset($post['student_master_id']) && !empty($post['student_master_id'])) {
                $quiz_details = Quiz::select('quiz_start_date', 'quiz_start_time')->where(array('id' => $post['quizid'], 'IsDelete' => 0))->first();
                foreach ($post['student_master_id'] as $value) {

                    if (isset($value) && $value <> '') {
                        $quiz_invitation_details = Quizinvitation::where(array('quiz_id' => $post['quizid'], 'student_master_id' => $value, 'IsDelete' => 0))->first();

                        $student_details = Studentmaster::select( 'present_class', 'student_name', 'contact_no' )->where( array( 'id' => $value, 'IsDelete' => 0 ) )->first();
                        $data = array(
                            'quiz_id' => $post['quizid'],
                            'student_master_id' => $value,
                            'updated_at' => date( 'Y-m-d H:i:s' )
                        );
                        $random_no =  base_convert( rand( 100000, 999999 ), 10, 36 );
                        $random_no2 =  base_convert( rand( 100000, 999999 ), 10, 36 );
                        $invitelink =  $random_no.$random_no2;
						
                        $startDate = date( 'dS F', strtotime( $quiz_details->quiz_start_date ) );
                        $startTime = date( 'h:i a', strtotime( $quiz_details->quiz_start_time ) );
                        $message = 'Dear students analyse your skill with on line Periodic Test-1 going to start from ' . $startDate . ' from ' . $startTime . '.just one click here ';
                        $MsgLink = $front_url . 'din/' . $invitelink;
                        $quizmessage = $message . ' ' . $MsgLink . ' to start the test';
                        if ( !isset( $quiz_invitation_details->id ) ) {
                            //Do not insert record if quiz already assigned

                            //$uniqueid =  strtolower( uniqid() );
                            $randno = rand( 100, 999 );

                            //$invitelink =  $uniqueid.$randno;

                            $otp = rand( 100000, 999999 );

                            $data['invitation_link'] = $invitelink;
                            $data['otp'] = $otp;
                            $data['isVerified'] = 1;
                            //default 1 for the time being
                            $data['IsDelete'] = 0;
                            $data['created_at'] = date( 'Y-m-d H:i:s' );

                            $insert = Quizinvitation::insertGetId( $data );
                            //echo $quizmessage;
                            
                            $mobileno = $student_details->contact_no;
                            $msg = str_replace( ' ', '%20', $quizmessage );

                            $url = "http://shikshakiore.com/cpc/isssms.aspx?mobile=$mobileno&msgtxt=$msg&user=INPCSK&lang=english&name=1300";

                            $ch = curl_init();
                            curl_setopt( $ch, CURLOPT_URL, $url );
                            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                            $curl_response = curl_exec( $ch );
                            curl_close( $ch );
                            $result = json_decode( $curl_response, true );
                            if ( isset( $result['status'] ) && $result['status'] == 1 ) {
                                $dataupdate = array(
                                    'sms_sent' => 1,
                                    'updated_at' => date( 'Y-m-d H:i:s' )
                                );
                                Quizinvitation::where( 'id', $insert )->update( $dataupdate );
                            }
                        }

                    }
                }
                //end foreach

                if ( isset( $insert ) ) {
                    echo json_encode( array( 'success' => true, 'url' => url( 'invitation' ), 'message' => 'Saved Successfully.' ) );
                    exit;
                } else {
                    echo json_encode( array( 'success' => false, 'url' => url( 'invitation' ), 'message' => 'Unable to save data.' ) );
                    exit;
                }
            }
            //endif

        }

        $QuizList = Quiz::getquiz();
        $QuizinvitationList = Quizinvitation::getquizinvitation();
        $StudentmasterList = Studentmaster::where( array( 'IsDelete' => 0 ) )->orderBy( 'student_name', 'ASC' )->get();
        $details = Quizinvitation::where( array( 'id' => $id ) )->first();

        $allClassList = Studentmaster::getAllClass();

        
        return view( 'quiz/invitation', compact( 'QuizinvitationList', 'id', 'details', 'QuizList', 'StudentmasterList', 'allClassList' ) );
    }

    public function getfilteredstudents( Request $request )
 {
        
        if ( $request->isXmlHttpRequest() ) {
            if ( $request->isMethod( 'post' ) ) {
                $class_name = $request->student_class;
                $students = Studentmaster::getfilteredstudents( $class_name );

                if ( $students ) {
                    echo json_encode( array( 'success' => true, 'data' => $students, 'message' => 'successfully' ) );
                    exit;
                } else {
                    echo json_encode( array( 'success' => false, 'data' => '', 'message' => 'Unable to load. please try again later!' ) );
                    exit;
                }
            }
        }
    }

    public function deleteinvitation( Request $request, $id = null )
 {

        if ( $request->isXmlHttpRequest() ) {

            $data = array(
                'IsDelete' => 1,
                'DeleteOn' => date( 'Y-m-d H:i:s' )
            );

            $result = Quizinvitation::where( 'id', $id )->update( $data );

            if ( $result ) {
                echo json_encode( array( 'success' => true, 'message' => 'Delete Successfully' ) );
                exit;
            } else {
                echo json_encode( array( 'success' => false, 'message' => 'Oops unable to delete! try again.' ) );
                exit;
            }
        } else {
            die( 'Oops invalid request!!' );
        }
    }
	
	 public function answersheet( Request $request, $id = null )
 {

        $details = Quizresult::where( array( 'result_id' => $id ) )->first();

        $result_data = Quizresult::get_result_data( $id );

        $quizid = $details->quizid;

        $quiz_details = Quiz::where( array( 'id' => $quizid ) )->first();
		
		$QuizquestionsList = Question::getquizquestions($quizid);

		//print_r($QuizquestionsList); exit;
		
		if ($result_data) {
            foreach ($result_data as $value) {
                $value = (array) $value;
				$user_result_data_arr[$value['questionid']] = $value;
            }
        }
		//print_r($user_result_data_arr); exit;

        $quiz_total_question = Question::where(array('quizid' => $quizid,'IsDelete' => 0))->get()->count();
		             
        return view( 'result/answer-sheet', compact( 'id', 'details', 'quiz_details', 'QuizquestionsList', 'user_result_data_arr') );
    }
	
}
