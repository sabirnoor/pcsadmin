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
    public function ourmotto(Request $request){die('hh');
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
	
	public function profile(Request $request)
    {
		
		if ($request->isMethod('post')){
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
			if(Hash::check($post['cpassword'], $user->password)){
				$user_id = $user->id;
				$obj_user = User::find($user_id)->first();
				$obj_user->password = Hash::make($newPassword);
				$obj_user->save();
				return redirect('profile')->with('msgsuccess', 'Password Change successfully');
			}else{
				return redirect('profile')->with('msgerror', 'Invalid current password!');
			}
			echo '<pre>';print_r($post);die;
		}
        return view('profile');
    }
	
	// Category section
	public function gallerycategory(Request $request, $id = null){
        $CategoriesList = Categories::where(array('IsDelete' => 0,'entity_type' => 'gallerycategory'))->orderBy('created_at', 'DESC')->get();
        if ($request->isMethod('post')){
            $post = $request->all();
            $data = array(
                'name' => $post['title'],
                'entity_type' => 'gallerycategory',
                'IsDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            //echo '<pre>';print_r($data);die;
            if(empty($id)){
                $insert = Categories::insert($data);
                return redirect('gallerycategory')->with('msgsuccess', 'Save successfully');
            }else{
               $insert = Categories::where('id', $id)->update($data);
               return redirect('gallerycategory')->with('msgsuccess', 'Update successfully');
            }
        }
        $details = Categories::where(array('id' => $id))->first();
        return view('category/gallerycategory', compact('CategoriesList','id','details'));
    }
	
	public function deletegallcat(Request $request, $id = null) {
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
	
	public function deletegalleryimage(Request $request, $id = null) {
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
	
	
}
