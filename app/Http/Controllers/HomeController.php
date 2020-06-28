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

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');
    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        //echo '<pre>';print_r(Auth::user());die;	

        return view('home');
    }

    public function dashboard()

    {

        //echo '<pre>';print_r(Auth::user());die;	

        return view('home');
    }

    public function ourmotto(Request $request)
    {
        die('hh');

        $details = Staticcontent::where(array('page_name' => 'ourmotto'))->first();

        if ($request->isMethod('post')) {

            $post = $request->all();

            $data = array(

                'page_name' => $post['page_name'],

                'contents' => $post['contents'],

                'created_at' => date('Y-m-d H:i:s'),

                'updated_at' => date('Y-m-d H:i:s')

            );

            if (empty($details)) {

                $insert = Staticcontent::insert($data);
            } else {

                $insert = Staticcontent::where('page_name', $post['page_name'])->update($data);
            }

            if ($insert) {

                return redirect('ourmotto')->with('msgsuccess', 'Save successfully');
            }
        }



        return view('staticpages/ourmotto', compact('details'));
    }



    public function profile(Request $request)

    {



        if ($request->isMethod('post')) {

            $user = Auth::user();

            $post = $request->all();

            $newPassword = $post['password'];

            $validator = Validator::make($post, [

                'password' => 'required|string|min:6|confirmed',

                'password_confirmation' => 'required|string|min:6|same:password'

            ]);

            if ($validator->fails()) {

                return redirect('profile')->with('msgerror', 'Fill-out the form correctly. Try again!');
            }

            if (Hash::check($post['cpassword'], $user->password)) {

                $user_id = $user->id;

                $obj_user = User::find($user_id)->first();

                $obj_user->password = Hash::make($newPassword);

                $obj_user->save();

                return redirect('profile')->with('msgsuccess', 'Password Change successfully');
            } else {

                return redirect('profile')->with('msgerror', 'Invalid current password!');
            }

            echo '<pre>';
            print_r($post);
            die;
        }

        return view('profile');
    }



    // Category section

    public function gallerycategory(Request $request, $id = null)
    {

        $CategoriesList = Categories::where(array('IsDelete' => 0, 'entity_type' => 'gallerycategory'))->orderBy('created_at', 'DESC')->get();

        if ($request->isMethod('post')) {

            $post = $request->all();

            $data = array(

                'name' => $post['title'],

                'entity_type' => 'gallerycategory',

                'IsDelete' => 0,

                'created_at' => date('Y-m-d H:i:s'),

                'updated_at' => date('Y-m-d H:i:s')

            );

            //echo '<pre>';print_r($data);die;

            if (empty($id)) {

                $insert = Categories::insert($data);

                return redirect('gallerycategory')->with('msgsuccess', 'Save successfully');
            } else {

                $insert = Categories::where('id', $id)->update($data);

                return redirect('gallerycategory')->with('msgsuccess', 'Update successfully');
            }
        }

        $details = Categories::where(array('id' => $id))->first();

        return view('category/gallerycategory', compact('CategoriesList', 'id', 'details'));
    }



    public function deletegallcat(Request $request, $id = null)
    {

        if ($request->isXmlHttpRequest()) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date('Y-m-d H:i:s')

            );

            $result = Categories::where('id', $id)->update($data);

            if ($result) {

                echo json_encode(array('success' => true, 'message' => 'Delete Successfully'));

                exit;
            } else {

                echo json_encode(array('success' => false, 'message' => 'Oops unable to delete! try again.'));

                exit;
            }
        } else {

            die('Oops invalid request!!');
        }
    }



    public function deletegalleryimage(Request $request, $id = null)
    {

        if ($request->isXmlHttpRequest()) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date('Y-m-d H:i:s')

            );

            $result = uploadgallery::where('id', $id)->update($data);

            if ($result) {

                echo json_encode(array('success' => true, 'message' => 'Delete Successfully'));

                exit;
            } else {

                echo json_encode(array('success' => false, 'message' => 'Oops unable to delete! try again.'));

                exit;
            }
        } else {

            die('Oops invalid request!!');
        }
    }



    // Feedback section

    public function feedback(Request $request, $id = null)
    {

        $FeedbackList = Feedback::where(array('IsDelete' => 0))->orderBy('created_at', 'DESC')->get();



        if ($request->isMethod('post')) {

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

                'technical_issue' => isset($post['technical_issue']) ? $post['technical_issue'] : '',

                'suggestion' => isset($post['suggestion']) ? $post['suggestion'] : '',

                'isPublished' => isset($post['isPublished']) ? 1 : 0,

                'updated_at' => date('Y-m-d H:i:s')

            );

            //echo '<pre>';print_r($data);die;

            if (empty($id)) {

                $data['created_at'] = date('Y-m-d H:i:s');

                $data['IsDelete'] = 0;

                $insert = Feedback::insert($data);

                return redirect('feedbacklist')->with('msgsuccess', 'Save successfully');
            } else {

                $insert = Feedback::where('id', $id)->update($data);

                return redirect('feedbacklist')->with('msgsuccess', 'Update successfully');
            }
        }

        $details = Feedback::where(array('id' => $id))->first();

        return view('feedback/feedback', compact('FeedbackList', 'id', 'details'));
    }



    public function feedbacklist(Request $request, $id = null)
    {

        $FeedbackList = Feedback::where(array('IsDelete' => 0))->orderBy('created_at', 'DESC')->get();



        return view('feedback/feedback-list', compact('FeedbackList', 'id', 'details'));
    }



    public function deletefeedback(Request $request, $id = null)
    {

        if ($request->isXmlHttpRequest()) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date('Y-m-d H:i:s')

            );

            $result = Feedback::where('id', $id)->update($data);

            if ($result) {

                echo json_encode(array('success' => true, 'message' => 'Delete Successfully'));

                exit;
            } else {

                echo json_encode(array('success' => false, 'message' => 'Oops unable to delete! try again.'));

                exit;
            }
        } else {

            die('Oops invalid request!!');
        }
    }



    // Studentmaster section

    public function studentmaster(Request $request, $id = null)
    {

        $StudentmasterList = Studentmaster::where(array('IsDelete' => 0))->orderBy('created_at', 'DESC')->get();



        if ($request->isMethod('post')) {

            $post = $request->all();

            $data = array(

                'student_name' => $post['student_name'],
                'Date_of_Birth' => DateFormates($post['Date_of_Birth'],'-'),
                'Admission_Date' => DateFormates($post['Admission_Date'],'-'),
                'Father_Name' => $post['Father_Name'],
                'Mother_Name' => $post['Mother_Name'],
                'Sex' => $post['Sex'],
                'Roll_No' => $post['Roll_No'],
                'Address' => $post['Address'],
				
                'admission_no' => $post['admission_no'],

                'roll_no_previous' => $post['roll_no_previous'],

                'present_class' => $post['present_class'],

                'contact_no' => $post['contact_no'],

                'whatsapp_no' => $post['whatsapp_no'],

                'updated_at' => date('Y-m-d H:i:s')

            );

            //echo '<pre>';print_r($data);die;

            if (empty($id)) {

                $data['created_at'] = date('Y-m-d H:i:s');

                $data['IsDelete'] = 0;

                $insert = Studentmaster::insert($data);

                return redirect('studentmaster')->with('msgsuccess', 'Save successfully');
            } else {

                $insert = Studentmaster::where('id', $id)->update($data);

                return redirect('studentmaster')->with('msgsuccess', 'Update successfully');
            }
        }

        $details = Studentmaster::where(array('id' => $id))->first();

        return view('feedback/studentmaster', compact('StudentmasterList', 'id', 'details'));
    }



    public function deletestudentmaster(Request $request, $id = null)
    {

        if ($request->isXmlHttpRequest()) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date('Y-m-d H:i:s')

            );

            $result = Studentmaster::where('id', $id)->update($data);

            if ($result) {

                echo json_encode(array('success' => true, 'message' => 'Delete Successfully'));

                exit;
            } else {

                echo json_encode(array('success' => false, 'message' => 'Oops unable to delete! try again.'));

                exit;
            }
        } else {

            die('Oops invalid request!!');
        }
    }



    public function sendsms(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $post = $request->all();
            //echo url('/');die;
			if(isset($post['studentId']) && !empty($post['studentId'])){
				foreach($post['studentId'] as $value){
					$shortCode =  base_convert(rand(1000,99999),10,36);
					$result = Studentmaster::where('id', $value)->first();
					
					if ($result) {
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
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')
						);
						$insertId = Feedback::insertGetId($data);
						if($insertId){
							$feedbackmessage = $post['feedbackmessage'].' '.'http://www.pcskhalispur.com/di2/'. $shortCode;
							$mobileno = $result->contact_no;//$post['mobileno'];
							$msg = str_replace(' ', '%20', $feedbackmessage);
							
							$url = "http://shikshakiore.com/cpc/isssms.aspx?mobile=$mobileno&msgtxt=$msg&user=INPCSK&lang=english&name=1300";
							
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$curl_response = curl_exec($ch);
							//print_r($curl_response);
							curl_close($ch);
							$result = json_decode($curl_response, true);
						}
					}
				}
				if (isset($result['status']) && $result['status'] == 1) {
                    echo json_encode(array('success' => true, 'message' => 'Message Sent Successfully'));
                    exit;
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Oops something went wrong! try again.'));
                    exit;
                }
			}
			pr($post);die;
            $shortCode =  base_convert(rand(1000,99999),10,36);
            $result = Studentmaster::where('id', $post['studentId'])->first();
            if ($result) {
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
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $insertId = Feedback::insertGetId($data);
            }
            if($insertId){
                $feedbackmessage = $post['feedbackmessage'].' '.'http://www.pcskhalispur.com/di2/'. $shortCode;
                $mobileno = $result->contact_no;//$post['mobileno'];
                $msg = str_replace(' ', '%20', $feedbackmessage);
                
                $url = "http://shikshakiore.com/cpc/isssms.aspx?mobile=$mobileno&msgtxt=$msg&user=INPCSK&lang=english&name=1300";
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $curl_response = curl_exec($ch);
                //print_r($curl_response);
                curl_close($ch);
                $result = json_decode($curl_response, true);
                if (isset($result['status']) && $result['status'] == 1) {
                    echo json_encode(array('success' => true, 'message' => 'Message Sent Successfully'));
                    exit;
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Oops something went wrong! try again.'));
                    exit;
                }
            }else{
                echo json_encode(array('success' => false, 'message' => 'Record not found.'));
                exit;
            }
            //static url
            
        } else {
            die('Oops invalid request!!');
        }
    }
	
	// Quiz section

    public function quiz(Request $request, $id = null)
    {
        
        if ($request->isMethod('post')) {

            $post = $request->all();

            $data = array(

                'class_id' => $post['class_id'],
                'subject_id' => $post['subject_id'],
                'quiz_title' => $post['quiz_title'],

                'quiz_max_marks' => $post['quiz_max_marks'],

                'quiz_max_time' => $post['quiz_max_time'],

                'quiz_total_question' => $post['quiz_total_question'],
                
                'updated_at' => date('Y-m-d H:i:s')

            );

            //echo '<pre>';print_r($data);die;

            if (empty($id)) {

                $data['created_at'] = date('Y-m-d H:i:s');

                $data['IsDelete'] = 0;

                $insert = Quiz::insert($data);

                return redirect('quizlist')->with('msgsuccess', 'Save successfully');
            } else {

                $insert = Quiz::where('id', $id)->update($data);

                return redirect('quizlist')->with('msgsuccess', 'Update successfully');
            }
        }

        $details = Quiz::where(array('id' => $id))->first();
		
		$ClassList = Categories::where(array('IsDelete' => 0, 'entity_type' => 'classsyllabus'))->orderBy('id', 'ASC')->get();
		
		$SubjectList = Categories::where(array('IsDelete' => 0, 'entity_type' => 'subjects'))->orderBy('id', 'ASC')->get(); 
		

        return view('quiz/quiz', compact('id', 'details','ClassList','SubjectList'));
    }



    public function quizlist(Request $request, $id = null)
    {

        
        $QuizList = Quiz::getquiz();

        return view('quiz/quiz-list', compact('QuizList', 'id'));
    }



    public function deletequiz(Request $request, $id = null)
    {

        if ($request->isXmlHttpRequest()) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date('Y-m-d H:i:s')

            );

            $result = Quiz::where('id', $id)->update($data);

            if ($result) {

                echo json_encode(array('success' => true, 'message' => 'Delete Successfully'));

                exit;
            } else {

                echo json_encode(array('success' => false, 'message' => 'Oops unable to delete! try again.'));

                exit;
            }
        } else {

            die('Oops invalid request!!');
        }
    }
	
	// Question section

    public function question(Request $request, $id = null)
    {
        
        if ($request->isMethod('post')) {

            $post = $request->all();

            $data = array(
                'quizid' => $post['quizid'],
                'question_title' => $post['question_title'],
                'option1' => $post['option1'],
                'option2' => $post['option2'],
                'option3' => $post['option3'],
                'option4' => $post['option4'],
                'correct_answer' => $post['correct_answer'],
                'updated_at' => date('Y-m-d H:i:s')
            ); 

            //echo '<pre>';print_r($data);die;

            if (empty($id)) {

                $data['created_at'] = date('Y-m-d H:i:s');

                $data['IsDelete'] = 0;

                $insert = Question::insert($data);

                return redirect('questionlist')->with('msgsuccess', 'Save successfully');
            } else {

                $insert = Question::where('id', $id)->update($data);

                return redirect('questionlist')->with('msgsuccess', 'Update successfully');
            }
        }

        $QuizList = Quiz::getquiz();
		$details = Question::where(array('id' => $id))->first();

        return view('quiz/question', compact('QuestionList', 'id', 'details','QuizList'));
    }



    public function questionlist(Request $request, $id = null)
    {

        $QuestionList = Question::where(array('IsDelete' => 0))->orderBy('created_at', 'DESC')->get();
        $QuestionList = Question::getquestion();
		//print_r($QuestionList); exit;

        return view('quiz/question-list', compact('QuestionList', 'id', 'details'));
    }



    public function deletequestion(Request $request, $id = null)
    {

        if ($request->isXmlHttpRequest()) {

            $data = array(

                'IsDelete' => 1,

                'DeleteOn' => date('Y-m-d H:i:s')

            );

            $result = Question::where('id', $id)->update($data);

            if ($result) {

                echo json_encode(array('success' => true, 'message' => 'Delete Successfully'));

                exit;
            } else {

                echo json_encode(array('success' => false, 'message' => 'Oops unable to delete! try again.'));

                exit;
            }
        } else {

            die('Oops invalid request!!');
        }
    }
}
