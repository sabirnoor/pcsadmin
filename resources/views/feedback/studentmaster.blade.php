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

                        <label class="col-sm-3 control-label no-padding-right" for="admission_no"> Admission No.* </label>

                        <div class="col-sm-9">

                            <input type="text" class="col-xs-10 col-sm-5" id="admission_no" name="admission_no" value="<?=isset($details->admission_no)?$details->admission_no:''?>" placeholder="Admission No." maxlength="20" required>

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

                   <table id="dynamic-table" class="table table-striped table-bordered table-hover">

                        <thead>

                            <tr>

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

                            if($StudentmasterList){

                                foreach ($StudentmasterList as $value) {
                            ?>
                            <tr id="<?=$value['id']?>">
                            <td><?=$value['student_name']?> </td>
                            <td><?=$value['admission_no']?> </td>
                            <td><?=$value['roll_no_previous']?> </td>
                            <td><?=$value['present_class']?> </td>
                            <td><?=$value['contact_no']?> </td>
                            <td><?=$value['whatsapp_no']?> </td>
                            <td><a href="javascript:void();" class="id-btn-dialog1" data-mobile="<?=$value['contact_no']?>" data-id="<?=$value['id']?>">Send SMS</a></td>
                                <td>
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
<input type="hidden" value="0" id="studentId">
<input type="hidden" value="0" id="mobileno">
@endsection

