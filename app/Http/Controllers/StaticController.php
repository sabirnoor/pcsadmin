<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Staticcontent;
use App\Categories;
use App\Uploadflash;
use App\Noticeboard;
use App\Birthday;
use App\Newsevents;
use App\Syllabusmaster;
use App\Schedulemaster;
use App\Uploadgallery;
use Eventviva\ImageResize;
use Validator;
use Image;
use Excel;
use Carbon\Carbon;
class StaticController extends Controller
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
    public function ourmotto(Request $request){
        $details = Staticcontent::where(array('page_name' => 'ourmotto'))->first();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'page_name' => $post['page_name'],
                'contents' => $post['contents'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(empty($details)){
               $insert = Staticcontent::insert($data); 
            }else{
               $insert = Staticcontent::where('page_name', $post['page_name'])->update($data); 
            }
            if($insert){
                return redirect('ourmotto')->with('msgsuccess', 'Save successfully');
            }
        }
        
        return view('staticpages/ourmotto', compact('details'));
    }
	
	public function events(Request $request){
        $details = Staticcontent::where(array('page_name' => 'events'))->first();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'page_name' => $post['page_name'],
                'contents' => $post['contents'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(empty($details)){
               $insert = Staticcontent::insert($data); 
            }else{
               $insert = Staticcontent::where('page_name', $post['page_name'])->update($data); 
            }
            if($insert){
                return redirect('events')->with('msgsuccess', 'Save successfully');
            }
        }
        
        return view('staticpages/events', compact('details'));
    }
	
	public function newspaper(Request $request){
        $details = Staticcontent::where(array('page_name' => 'newspaper'))->first();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'page_name' => $post['page_name'],
                'contents' => $post['contents'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(empty($details)){
               $insert = Staticcontent::insert($data); 
            }else{
               $insert = Staticcontent::where('page_name', $post['page_name'])->update($data); 
            }
            if($insert){
                return redirect('newspaper')->with('msgsuccess', 'Save successfully');
            }
        }
        
        return view('staticpages/newspaper', compact('details'));
    }
	
	public function aboutus(Request $request){
        $details = Staticcontent::where(array('page_name' => 'aboutus'))->first();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'page_name' => $post['page_name'],
                'contents' => $post['contents'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(empty($details)){
               $insert = Staticcontent::insert($data); 
            }else{
               $insert = Staticcontent::where('page_name', $post['page_name'])->update($data); 
            }
            if($insert){
                return redirect('aboutus')->with('msgsuccess', 'Save successfully');
            }
        }
        
        return view('staticpages/aboutus', compact('details'));
    }
	
    public function director_desk(Request $request){
        $details = Staticcontent::where(array('page_name' => 'director_desk'))->first();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'page_name' => $post['page_name'],
                'contents' => $post['contents'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(empty($details)){
               $insert = Staticcontent::insert($data); 
            }else{
               $insert = Staticcontent::where('page_name', $post['page_name'])->update($data); 
            }
            if($insert){
                return redirect('director_desk')->with('msgsuccess', 'Save successfully');
            }
        }
        return view('staticpages/director_desk', compact('details'));
    }
    public function academics(Request $request){
        $details = Staticcontent::where(array('page_name' => 'academics'))->first();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'page_name' => $post['page_name'],
                'contents' => $post['contents'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(empty($details)){
               $insert = Staticcontent::insert($data); 
            }else{
               $insert = Staticcontent::where('page_name', $post['page_name'])->update($data); 
            }
            if($insert){
                return redirect('academics')->with('msgsuccess', 'Save successfully');
            }
        }
        return view('staticpages/academics', compact('details'));
    }
    public function contact_us(Request $request){
        $details = Staticcontent::where(array('page_name' => 'contact_us'))->first();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'page_name' => $post['page_name'],
                'contents' => $post['contents'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(empty($details)){
               $insert = Staticcontent::insert($data); 
            }else{
               $insert = Staticcontent::where('page_name', $post['page_name'])->update($data); 
            }
            if($insert){
                return redirect('contact_us')->with('msgsuccess', 'Save successfully');
            }
        }
        return view('staticpages/contact_us', compact('details'));
    }
    
    
    public function syllabus(Request $request, $id = null){
        $Syllabusmasterlist = Syllabusmaster::SyllabusmasterList();
		$classsyllabus = Categories::where(array('entity_type' => 'classsyllabus','IsDelete' => 0))->get();
        //echo '<pre>';print_r($classsyllabus);die;
        if ($request->isMethod('post')){
            $post = $request->all();
            if ($request->has('filesname')) {
                $rules = array(
                    'filesname' => 'required | mimes:docx,doc,pdf,PDF | max:900000',
                );
                $validator = Validator::make($post, $rules);
                if($validator->fails()) {
                    return redirect('syllabus')->with('msgerror', 'filesname file should be .docx,.doc,.pdf!');
                }
                if(!is_dir("public/upload/syllabus/")) {
                    mkdir("public/upload/syllabus/", 0777, true);
                }
                $image = $request->file('filesname');
                $imageName = $image->getClientOriginalName();
				
                $file = explode('.', $imageName);
                $imageName = $file[0]. '_' . md5(microtime()) . '.' . end($file);
				$imageName = str_replace(' ','_',$imageName);
                if (!file_exists(upload_path() . 'syllabus/'. $imageName)) {
                    $path = upload_path() . 'syllabus/';
                    $image->move($path, $imageName);
                }
            }
            $data = array(
                'classsyllabus_id' => $post['classsyllabus'],
                'name' => $post['title'],
                'orders_by' => $post['orderby'],
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(!empty($imageName)){
                $data['filesname'] = $imageName;
            }
            //echo '<pre>';print_r($data);die;
            if(empty($id)){
                $insert = Syllabusmaster::insert($data);
                return redirect('syllabus')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Syllabusmaster::where('id', $id)->update($data);
               return redirect('syllabus')->with('msgsuccess', 'Update successfully');
            }

        }
        $details = Syllabusmaster::where(array('id' => $id))->first();
        return view('dynamic/syllabus', compact('Syllabusmasterlist','id','details','classsyllabus'));
    }
    
    public function uploadflash(Request $request, $id = null){
        $UploadflashList = Uploadflash::where(array('IsDelete' => 0))->get();
        
        //echo $id;die;
        if ($request->isMethod('post')){
            $post = $request->all();
            if ($request->has('image')) {
                $rules = array(
                    'image' => 'required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:10000',
                );
                $validator = Validator::make($post, $rules);
                if($validator->fails()) {
                    return redirect('uploadflash')->with('msgerror', 'Image file should be jpeg,jpg,png!');
                }
                if(!is_dir("public/upload/uploadflash/")) {
                    mkdir("public/upload/uploadflash/", 0777, true);
                }
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $file = explode('.', $imageName);
                $imageName = date('ymdhis') . '_' . md5(microtime()) . '.' . end($file);
                if (!file_exists(upload_path() . 'uploadflash/'. $imageName)) {
                    $path = upload_path() . 'uploadflash/';
                    $image->move($path, $imageName);

                    $imageweb = new ImageResize($path . $imageName);
                    $imageweb->resizeToWidth(1600);
                    $imageweb->save($path . 'web_' . $imageName);
                }
            }
            //die('ddd');
            $data = array(
                'name' => $post['title'],
                'orders_by' => $post['orderby'],
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(!empty($imageName)){
                $data['images'] = $imageName;
            }
            //echo '<pre>';print_r($data);die;
            if(empty($id)){
                $insert = Uploadflash::insert($data);
                return redirect('uploadflash')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Uploadflash::where('id', $id)->update($data);
               return redirect('uploadflash')->with('msgsuccess', 'Update successfully');
            }
//            if($insert){
//                return redirect('uploadflash')->with('msgsuccess', 'Save successfully');
//            }
        }
        $details = Uploadflash::where(array('id' => $id))->first();
        //echo '<pre>';print_r($details);die;
        return view('dynamic/uploadflash', compact('UploadflashList','id','details'));
    }
	
	public function noticeboard(Request $request, $id = null){
        $UploadflashList = Noticeboard::where(array('IsDelete' => 0))->orderBy('orders_by', 'ASC')->get();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'title' => $post['notice'],
                'noticedate' => DateFormates($post['noticedate'],'-'),
                'orders_by' => $post['orderby'],
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            //echo '<pre>';print_r($data);die;
            if(empty($id)){
                $insert = Noticeboard::insert($data);
                return redirect('noticeboard')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Noticeboard::where('id', $id)->update($data);
               return redirect('noticeboard')->with('msgsuccess', 'Update successfully');
            }
        }
        $details = Noticeboard::where(array('id' => $id))->first();
        return view('dynamic/noticeboard', compact('UploadflashList','id','details'));
    }
	
	public function importExcel(Request $request){
		$post = $request->all();
		if($request->hasFile('import_file')){
			$rules = array(
				'import_file' => 'required | mimes:xlsx,xls | max:20000',
			);
			$validator = Validator::make($post, $rules);
			if($validator->fails()) {
				return redirect('birthday')->with('msgerror', 'Excel file should be xlsx,xls!');
			}
			if(!is_dir("public/upload/birthday/")) {
				mkdir("public/upload/birthday/", 0777, true);
			}
			
			$import_file = $request->file('import_file');
			$FileName = $import_file->getClientOriginalName();
			
			if (!file_exists(upload_path() . 'birthday/'. $FileName)) {
				$path = upload_path() . 'birthday/';
				$import_file->move($path, $FileName);
			}else{
				return redirect('birthday')->with('msgerror', 'This excel file already uploaded!');
			}
			try {
				
				Excel::load(upload_path().'birthday/'.$FileName, function ($reader) {
					foreach ($reader->toArray() as $key => $value) {
						//echo '<pre>';print_r($value);die;
						 if(!empty($value)){
							 foreach ($value as $k => $row){
								 $date_of_birth = $row['date_of_birth'];
								 $admission_date = $row['admission_date'];
								 $dt = new Carbon($admission_date);
								 $dt2 = new Carbon($date_of_birth);
								 if(!empty($row['class'])){
									 $insert = array(
										'classes' => $row['class'],
										'rollnumber' => $row['roll_no'],
										'title' => $row['student_name'],
										'gender' => $row['sex'],
										'admNo' => $row['adm_no'],
										'dateofbirth' => $dt2->toDateString(),
										'admissiondate' => $dt->toDateString(),
										'orders_by' => $k+1,
										'IsDelete' => 0,
										'created_at' => date('Y-m-d H:i:s'),
										'updated_at' => date('Y-m-d H:i:s'),
									 );
									 $done = Birthday::insert($insert); 
								 }
							 }
						 } 
					}

					/*if($insert) {
						 echo '<pre>';print_r($insert);
						
						die('sss');
						Birthday::insert($insert); 
						return redirect('birthday')->with('msgsuccess', 'Upload successfully');
					}*/
				});
				return redirect('birthday')->with('msgsuccess', 'Upload successfully');
			  
			} catch (Exception $e) {
				 echo $e->getMessage();
				 exit;
			}
            
		}else{
			return redirect('birthday')->with('msgerror', 'Please choose files');
		}
	}
	public function birthday(Request $request, $id = null){
		$sections = sections();
        $BirthdayList = Birthday::where(array('IsDelete' => 0))->orderBy('orders_by', 'ASC')->get();
		$class = Categories::where(array('entity_type' => 'classes','IsDelete' => 0))->get();
        if ($request->isMethod('post')){
            $post = $request->all();
			//echo '<pre>';print_r($post);die;
			if ($request->has('image')) {
                $rules = array(
                    'image' => 'required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:10000',
                );
                $validator = Validator::make($post, $rules);
                if($validator->fails()) {
                    return redirect('birthday')->with('msgerror', 'Image file should be jpeg,jpg,png!');
                }
                if(!is_dir("public/upload/birthday/photo/")) {
                    mkdir("public/upload/birthday/photo", 0777, true);
                }
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $file = explode('.', $imageName);
                $imageName = date('ymdhis') . '_' . md5(microtime()) . '.' . end($file);
                if (!file_exists(upload_path() . 'birthday/photo/'. $imageName)) {
                    $path = upload_path() . 'birthday/photo/';
                    $image->move($path, $imageName);

                    $imageweb = new ImageResize($path . $imageName);
                    $imageweb->resizeToWidth(171);
                    $imageweb->save($path . 'web_' . $imageName);
                }
            }
            $data = array(
                'classes' => $post['classes'],
                'gender' => $post['gender'],
                'title' => $post['title'],
                'admNo' => $post['admNo'],
                'rollnumber' => $post['rollnumber'],
                'dateofbirth' => DateFormates($post['dateofbirth'],'-'),
                'admissiondate' => DateFormates($post['admissiondate'],'-'),
                'orders_by' => $post['orderby'],
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
			if(!empty($imageName)){
                $data['images'] = $imageName;
            }
            //echo '<pre>';print_r($data);die;
            if(empty($id)){
                $insert = Birthday::insert($data);
                return redirect('birthday')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Birthday::where('id', $id)->update($data);
               return redirect('birthday')->with('msgsuccess', 'Update successfully');
            }
        }
        $details = Birthday::where(array('id' => $id))->first();
        return view('dynamic/birthday', compact('BirthdayList','id','details','class','sections'));
    }
	
	public function newsevents(Request $request, $id = null){
        $UploadflashList = Newsevents::where(array('IsDelete' => 0))->orderBy('orders_by', 'ASC')->get();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'eventtitle' => $post['title'],
                'eventdetails' => $post['notice'],
                'eventdate' => DateFormates($post['noticedate'],'-'),
                'orders_by' => $post['orderby'],
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            //echo '<pre>';print_r($data);die;
            if(empty($id)){
                $insert = Newsevents::insert($data);
                return redirect('newsevents')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Newsevents::where('id', $id)->update($data);
               return redirect('newsevents')->with('msgsuccess', 'Update successfully');
            }
        }
        $details = Newsevents::where(array('id' => $id))->first();
        return view('dynamic/newsevents', compact('UploadflashList','id','details'));
    }
	
	
	public function gallery(Request $request, $id = null){
        $CategoriesList = Categories::where(array('IsDelete' => 0,'entity_type' => 'gallerycategory'))->orderBy('created_at', 'DESC')->get();
        $uploadgallery = uploadgallery::galleryList();
		
        if ($request->isMethod('post')){
            $post = $request->all();
			if ($request->has('image')) {
                $rules = array(
                    'image' => 'required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:10000',
                );
                $validator = Validator::make($post, $rules);
                if($validator->fails()) {
                    return redirect('gallery')->with('msgerror', 'Image file should be jpeg,jpg,png!');
                }
                if(!is_dir("public/upload/uploadgallery/")) {
                    mkdir("public/upload/uploadgallery/", 0777, true);
                }
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $file = explode('.', $imageName);
                $imageName = date('ymdhis') . '_' . md5(microtime()) . '.' . end($file);
                if (!file_exists(upload_path() . 'uploadgallery/'. $imageName)) {
                    $path = upload_path() . 'uploadgallery/';
                    $image->move($path, $imageName);

                    $imageweb = new ImageResize($path . $imageName);
                    $imageweb->resizeToWidth(237);
                    $imageweb->save($path . 'web_' . $imageName);
                }
            }
            $data = array(
                'category_id' => $post['Category_id'],
                'description' => $post['description'],
                'event_date' => DateFormates($post['eventdate'],'-'),
                'orders_by' => $post['orderby'],
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
			if(!empty($imageName)){
                $data['images'] = $imageName;
            }
            //echo '<pre>';print_r($uploadgallery);die;
            if(empty($id)){
                $insert = Uploadgallery::insert($data);
                return redirect('gallery')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Uploadgallery::where('id', $id)->update($data);
               return redirect('gallery')->with('msgsuccess', 'Update successfully');
            }
        }
		
        $details = Uploadgallery::where(array('id' => $id))->first();
        return view('dynamic/gallery', compact('CategoriesList','id','details','uploadgallery'));
    }
	
	public function syllabusDelete(Request $request, $id = null) {
        if ($request->isXmlHttpRequest()) {
            $data = array(
                'IsDelete' => 1,
                'DeleteOn' => date('Y-m-d H:i:s')
            );
            $result = Syllabusmaster::where('id', $id)->update($data);
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
	
	public function noticeboardDelete(Request $request, $id = null) {
        if ($request->isXmlHttpRequest()) {
            $data = array(
                'IsDelete' => 1,
                'DeleteOn' => date('Y-m-d H:i:s')
            );
            $result = Noticeboard::where('id', $id)->update($data);
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
	
	public function birthdayDelete(Request $request, $id = null) {
        if ($request->isXmlHttpRequest()) {
            $data = array(
                'IsDelete' => 1,
                'DeleteOn' => date('Y-m-d H:i:s')
            );
            $result = Birthday::where('id', $id)->update($data);
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
	
	public function newseventsDelete(Request $request, $id = null) {
        if ($request->isXmlHttpRequest()) {
            $data = array(
                'IsDelete' => 1,
                'DeleteOn' => date('Y-m-d H:i:s')
            );
            $result = Newsevents::where('id', $id)->update($data);
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
    
	public function uploadflashDelete(Request $request, $id = null) {
        if ($request->isXmlHttpRequest()) {
            $data = array(
                'IsDelete' => 1,
                'DeleteOn' => date('Y-m-d H:i:s')
            );
            $result = Uploadflash::where('id', $id)->update($data);
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
	
	public function schedule(Request $request, $id = null){
        $Schedulemasterlist = Schedulemaster::SchedulemasterList();
		$classschedule = Categories::where(array('entity_type' => 'classsyllabus','IsDelete' => 0))->get();
        //echo '<pre>';print_r($classschedule);die;
        if ($request->isMethod('post')){
            $post = $request->all();
            if ($request->has('filesname')) {
                $rules = array(
                    'filesname' => 'required | mimes:docx,doc,pdf,PDF | max:900000',
                );
                $validator = Validator::make($post, $rules);
                if($validator->fails()) {
                    return redirect('schedule')->with('msgerror', 'filesname file should be .docx,.doc,.pdf!');
                }
                if(!is_dir("public/upload/schedule/")) {
                    mkdir("public/upload/schedule/", 0777, true);
                }
                $image = $request->file('filesname');
                $imageName = $image->getClientOriginalName();
				
                $file = explode('.', $imageName);
                $imageName = $file[0]. '_' . md5(microtime()) . '.' . end($file);
				$imageName = str_replace(' ','_',$imageName);
                if (!file_exists(upload_path() . 'schedule/'. $imageName)) {
                    $path = upload_path() . 'schedule/';
                    $image->move($path, $imageName);
                }
            }
            $data = array(
                'classschedule_id' => $post['classschedule'],
                'name' => $post['title'],
                'orders_by' => $post['orderby'],
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            if(!empty($imageName)){
                $data['filesname'] = $imageName;
            }
            //echo '<pre>';print_r($data);die;
            if(empty($id)){
                $insert = Schedulemaster::insert($data);
                return redirect('schedule')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Schedulemaster::where('id', $id)->update($data);
               return redirect('schedule')->with('msgsuccess', 'Update successfully');
            }

        }
        $details = Schedulemaster::where(array('id' => $id))->first();
        return view('dynamic/schedule', compact('Schedulemasterlist','id','details','classschedule'));
    }
	
	public function scheduleDelete(Request $request, $id = null) {
        if ($request->isXmlHttpRequest()) {
            $data = array(
                'IsDelete' => 1,
                'DeleteOn' => date('Y-m-d H:i:s')
            );
            $result = Schedulemaster::where('id', $id)->update($data);
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
