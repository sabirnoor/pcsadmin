@extends('layouts.layout')



@section('content')

<?php //echo '<pre>';print_r($UploadflashList);die; ?>

<div class="main-content-inner">

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">

        <ul class="breadcrumb">

            <li>

                <i class="ace-icon fa fa-home home-icon"></i>

                <a href="{{url('/')}}">Dashboard</a>

            </li>

            <li class="active">Student Master</li>

        </ul><!-- /.breadcrumb -->


    </div>



    <div class="page-content">


        <div class="row">

            <div class="col-xs-12">                

                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="" method="post" role="form" action="">

                    {{csrf_field()}}
					
					<h4>I. Personal Information</h4>
					
					<div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="present_class" class=""><strong>Class:</strong> </label>
                        <?=isset($details->present_class)?$details->present_class:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="student_name" class=""><strong>Name Of the Candidate ( As per record in Birth Certificate / T.C. / Marksheet): </strong></label>
                         <?=isset($details->student_name)?$details->student_name:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="dob" class=""><strong>Date of Birth (As per document to be uploaded):</strong> </label>
                        <?=isset($details->dob)?$details->dob:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="dob_in_words" class=""><strong>Date Of Birth (in words): </strong></label>
                         <?=isset($details->dob_in_words)?$details->dob_in_words:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="nationality" class=""><strong>Nationality: </strong></label>
                         <?=isset($details->nationality)?$details->nationality:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="aadharno" class=""><strong>Aadhar No.: </strong></label>
                         <?=isset($details->aadharno)?$details->aadharno:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="religion" class=""><strong>Religion: </strong></label>
                         <?=isset($details->religion)?$details->religion:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="sex" class=""><strong>Gender: </strong></label>
                         <?=isset($details->Sex)?$details->Sex:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="social_category" class=""><strong>Social Category: </strong></label>
                         <?=isset($details->social_category)?$details->social_category:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="blood_group" class=""><strong>Blood Group: </strong></label>
                         <?=isset($details->blood_group)?$details->blood_group:''?>
                      </div>
                   </div>
				   
				     <div class="col-md-12">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <h4>II. Contact Details </h4>				  
					
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="permanent_address" class=""><strong>Permanent Address: </strong></label>
                         <?=isset($details->permanent_address)?$details->permanent_address:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="contact_no" class=""><strong>Mobile: </strong></label>
                         <?=isset($details->contact_no)?$details->contact_no:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="email" class=""><strong>Email: </strong></label>
                         <?=isset($details->email)?$details->email:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="Address" class=""><strong>Present Address: </strong></label>
                         <?=isset($details->Address)?$details->Address:''?>
                      </div>
                   </div> 
				   
				   <div class="col-md-12">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <h4>III. Parents' Information</h4>	 
					
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="Father_Name" class=""><strong>Father's Name : </strong></label>
                         <?=isset($details->Father_Name)?$details->Father_Name:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="father_qualification" class=""><strong>Father's Education Qualification: </strong></label>
                         <?=isset($details->father_qualification)?$details->father_qualification:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="father_occupation" class=""><strong>Father's Occupation : </strong></label>
                         <?=isset($details->father_occupation)?$details->father_occupation:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="father_mobile" class=""><strong>Father's Mobile No.: </strong></label>
                         <?=isset($details->father_mobile)?$details->father_mobile:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="Mother_Name" class=""><strong>Mother's Name : </strong></label>
                         <?=isset($details->Mother_Name)?$details->Mother_Name:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="mother_qualification" class=""><strong>Mother's Education Qualification: </strong></label>
                         <?=isset($details->mother_qualification)?$details->mother_qualification:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="mother_occupation" class=""><strong>Mother's Occupation : </strong></label>
                         <?=isset($details->mother_occupation)?$details->mother_occupation:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="mother_mobile" class=""><strong>Mother's Mobile No.: </strong></label>
                         <?=isset($details->mother_mobile)?$details->mother_mobile:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="family_income" class=""><strong>Annual Family Income: </strong></label>
                         <?=isset($details->family_income)?$details->family_income:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <div class="col-md-12">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <h4>IV.  Education Details</h4>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="last_school_name_address" class=""><strong>Name of the School Last Attended with Address: </strong></label>
                         <?=isset($details->last_school_name_address)?$details->last_school_name_address:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="board_name" class=""><strong>Name of the Board: </strong></label>
                         <?=isset($details->board_name)?$details->board_name:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="board_registration_no" class=""><strong>Registration No: </strong></label>
                         <?=isset($details->board_registration_no)?$details->board_registration_no:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="board_roll_no" class=""><strong>Board  Roll No: </strong></label>
                         <?=isset($details->board_roll_no)?$details->board_roll_no:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="passing_year" class=""><strong>Year Of Passing: </strong></label>
                         <?=isset($details->passing_year)?$details->passing_year:''?>
                      </div>
                   </div>
				   
				   <div class="col-md-6">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <div class="col-md-12">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <h4>V. Marks Detail (Board)</h4>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="english_marks" class=""><strong>English: </strong></label>
                         <?=isset($details->english_marks)?$details->english_marks:''?>
                      </div>
                   </div>
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="science_marks" class=""><strong>Science: </strong></label>
                         <?=isset($details->science_marks)?$details->science_marks:''?>
                      </div>
                   </div>
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="math_marks" class=""><strong>Maths: </strong></label>
                         <?=isset($details->math_marks)?$details->math_marks:''?>
                      </div>
                   </div>
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="marks_percentage" class=""><strong>Percentage: </strong></label>
                         <?=isset($details->marks_percentage)?$details->marks_percentage:''?>
                      </div>
                   </div>
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="exam_medium" class=""><strong>Medium Of Exam: </strong></label>
                         <?=isset($details->exam_medium)?$details->exam_medium:''?>
                      </div>
                   </div>
				   
				    <div class="col-md-6">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <div class="col-md-12">
                    <label for="" class="">&nbsp;</label>
                   </div>
				   
				   <h4> VI . Subject Selection </h4> 
				   <?php 
				   $subject_arr = array_column($subjectList, 'name', 'id');
				  //print_r($subject_arr);
					
				   $selected_subjects_arr = explode(',',$details->selected_subjects);
				   ?>
				   
				   <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="selected_subjects" class=""><strong>Subjects: </strong></label>
                         <?php
						 if(isset($selected_subjects_arr)){
							 foreach($selected_subjects_arr as $val){
								 echo $subject_arr[$val].', ';
							 }
						 }
						 
						 ?>
                      </div>
                   </div>

                </form>



               <div class="col-xs-12">
			   
                    
		       </div>
			   
                <div class="hr hr32 hr-dotted"></div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.page-content -->

</div>

@endsection

