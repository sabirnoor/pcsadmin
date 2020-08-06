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

                @if (session('msgerror'))

                <div class="alert alert-danger light no-margin">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                        <i class="icon-cross2"></i> {{ session('msgerror') }}

                </div>

                <hr>

                @endif

                @if (session('msgsuccess'))

                <div class="alert alert-success light no-margin">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                        <i class="icon-check_circle"></i> {{ session('msgsuccess') }}

                </div>

                <hr>

                @endif

                

                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="studentmaster" method="post" role="form" action="{{url('studentmaster/'.$id)}}">

                    {{csrf_field()}}

					<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">

                    <!--<input type="hidden" name="page_name" value="academics">-->
					
					

					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="student_name"> Student Name* </label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="student_name" name="student_name" value="<?=isset($details->student_name)?$details->student_name:''?>" placeholder="Enter Student Name" maxlength="25" required>

                        </div>

                    </div>
					
										
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title"> Date Of Birth* </label>
                        <div class="col-sm-9">
                            <input type="text" id="Date_of_Birth" name="Date_of_Birth" autocomplete value="<?=isset($details->Date_of_Birth)?date('d-m-Y',strtotime($details->Date_of_Birth)):''?>" placeholder="Pick Date" class="col-xs-10 col-sm-5 dateofbirth" required>
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="Sex"> Select Gender* </label>
						<div class="col-sm-9">
							<select class="col-xs-10 col-sm-5" id="Sex" name="Sex" required>
								<option value="">Select Gender</option>
								
								<option value="M" <?=(isset($details->Sex) && $details->Sex=="M")?'selected="selected"':''?>>Male</option>
								
								<option value="F" <?=(isset($details->Sex) && $details->Sex=="F")?'selected="selected"':''?>>Female</option>
								
							</select>
						</div>
					</div>
					
					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="Father_Name"> Father's Name* </label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="Father_Name" name="Father_Name" value="<?=isset($details->Father_Name)?$details->Father_Name:''?>" placeholder="Enter Father's Name" maxlength="25" required>

                        </div>

                    </div>
					
					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="Mother_Name"> Mother's Name* </label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="Mother_Name" name="Mother_Name" value="<?=isset($details->Mother_Name)?$details->Mother_Name:''?>" placeholder="Enter Mother's Name" maxlength="25" required>

                        </div>

                    </div>
					
										
					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="Address"> Address* </label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="Address" name="Address" value="<?=isset($details->Address)?$details->Address:''?>" placeholder="Enter Address" maxlength="25" required>

                        </div>

                    </div>
					
					
					
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title"> Admission Date* </label>
                        <div class="col-sm-9">
                            <input type="text" id="Admission_Date" name="Admission_Date" autocomplete value="<?=isset($details->Admission_Date)?date('d-m-Y',strtotime($details->Admission_Date)):''?>" placeholder="Pick Date" class="col-xs-10 col-sm-5 dateofbirth" required>
                        </div>
                    </div>					

					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="admission_no"> Admission No.* </label>
                        <div class="col-sm-9">
                            <input type="text" class="col-xs-10 col-sm-5" id="admission_no" name="admission_no" value="<?=isset($details->admission_no)?$details->admission_no:''?>" placeholder="Admission No." maxlength="20" required>
                        </div>
                    </div>
					
					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="Roll_No"> Roll No* </label>

                        <div class="col-sm-9">
                            <input type="number" class="col-xs-10 col-sm-5" id="Roll_No" name="Roll_No" value="<?=isset($details->Roll_No)?$details->Roll_No:''?>" placeholder="Enter Roll No" maxlength="5" required>
                        </div>

                    </div>					

					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="roll_no_previous"> Previous Roll No.* </label>

                        <div class="col-sm-9">
						
                            <input type="text" class="col-xs-10 col-sm-5" id="roll_no_previous" name="roll_no_previous" value="<?=isset($details->roll_no_previous)?$details->roll_no_previous:''?>" placeholder="Previous Roll No." maxlength="20" required>

                        </div>

                    </div>					

					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="present_class"> Present Class* </label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="present_class" name="present_class" value="<?=isset($details->present_class)?$details->present_class:''?>" placeholder="Present Class" maxlength="20" required>

                        </div>

                    </div>

					

					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="contact_no"> Contact No.*</label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="contact_no" name="contact_no" value="<?=isset($details->contact_no)?$details->contact_no:''?>" placeholder="Contact No." maxlength="10" required>

                        </div>

                    </div>

					

					<div class="form-group">

                        <label class="col-sm-3 control-label no-padding-right" for="whatsapp_no"> Whatsapp No.*</label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="whatsapp_no" name="whatsapp_no" value="<?=isset($details->whatsapp_no)?$details->whatsapp_no:''?>" placeholder="Whatsapp No." maxlength="10" required>

                        </div>

                    </div>

															

					                    

					<div class="space-4"></div>

                    <div class="clearfix form-actions">

                        <div class="col-md-offset-10 col-md-2">

                            <button class="btn btn-info" type="submit">

                                <i class="ace-icon fa fa-check bigger-110"></i>

                                Submit

                            </button>



                        </div>

                    </div>

                </form>



               <div class="col-xs-12">
			   <button type="button" id="save_value" style="display:none;">Send SMS</button>
                   <table id="dynamic-table" class="table table-striped table-bordered table-hover">

                        <thead>

                            <tr>

                                <th><input type="checkbox" class="CheckAll" onchange="checkAll(this)" title="Check All"></th>
                                <th>Student Name</th>

                                <th>Admission No.</th>

                                <th>Previous Roll No.</th>

                                <th>Present Class</th>

                                <th>Contact No.</th>

                                <th>Whatsapp No.</th>

                                <th>SMS</th>

                                <th>Action</th>

                            </tr>

                             </thead>

                        <tbody>

                            <?php 
$c=0;
                            if($StudentmasterList){

                                foreach ($StudentmasterList as $value) { 
								//$c++; if($c==2){break;} //for testing
                            ?>
                            <tr id="<?=$value['id']?>">
                            <td><input type="checkbox" class="studentId" value="<?=$value['id']?>"></td>
                            <td><?=$value['student_name']?> </td>
                            <td><?=$value['admission_no']?> </td>
                            <td><?=$value['roll_no_previous']?> </td>
                            <td><?=$value['present_class']?> </td>
                            <td><?=$value['contact_no']?> </td>
                            <td><?=$value['whatsapp_no']?> </td>
                            <td><a href="javascript:void();" class="id-btn-dialog1" data-mobile="<?=$value['contact_no']?>" data-id="<?=$value['id']?>">Send SMS</a></td>
                                <td>
                                    <a href="<?=url('studentmasterview/'.$value['id'])?>" target="_blank"><i class="ace-icon fa fa-eye fa-2x icon-only"></i></a> 
									
									<a href="<?=url('studentmaster/'.$value['id'])?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 
									
                                    <a href="#" id="<?=$value['id']?>" title="Delete" class="deletestudentmaster"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 
                                </td>
							</tr>
                        <?php
                                }
                            }
                        ?>

                        </tbody>
                   </table>  
		</div>
                <div class="hr hr32 hr-dotted"></div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.page-content -->

</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center;">Feedback Message</h4>
            </div>
            <div class="modal-body con-area">
                <textarea class="form-control limited" id="feedbackmessage" rows="5" >Dear parents, Greeting from Public Central School Please share your child's online learning experience during the lockdown period and how we can better our services. To share feedback plz click here</textarea>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success sndsms">Send</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<input type="hidden" value="0" class="studentID" id="studentId">
<input type="hidden" value="0" id="mobileno">
@endsection

