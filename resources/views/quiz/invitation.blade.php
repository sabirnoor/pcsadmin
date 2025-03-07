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
            <li class="active">Invitation</li>
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

                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="invitation" method="post" role="form" id="inviteForm" action="">{{-- {{url('invitation/'.$id)}}--}}
                    {{csrf_field()}}
					<input type="hidden" name="edit" value="<?=isset($id) ? $id : 0?>">


					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="quizid"> Select Exam* </label>
						<div class="col-sm-9">
							<select class="col-xs-10 col-sm-5" id="quizid" name="quizid" required>
								<option value="">Select Exam</option>

								<?php
if ($QuizList) {
	foreach ($QuizList as $value) {
		$value = (array) $value;
		?>
								<option value="<?=$value['id']?>" <?=(isset($details->quiz_id) && $details->quiz_id == $value['id']) ? 'selected="selected"' : ''?>><?=$value['quiz_title']?></option>
								<?php
}
}
?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="classFilter"> Select Class* </label>
						<div class="col-sm-9">
							<select class="col-xs-10 col-sm-5" id="classFilter" name="classFilter" required>
								<option value="">Select Class</option>

								<?php

if ($allClassList) {
	foreach ($allClassList as $value) {
		$value = (array) $value;
		?>

								<option value="<?=$value['present_class']?>"><?=$value['present_class']?></option>
								<?php
}
}
?>
							</select>
						</div>
					</div>

					<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="student_master_id"> Select Student* </label>
					<div class="col-sm-9">
						<select class="col-xs-10 col-sm-5 select2" id="student_master_id" name="student_master_id[]" style="" size="5" multiple required>
							<!--<option value="" disabled>Select Student</option>-->


						</select>
						<a href="javascript:void(0)" id="select_all"><span>Select All</span></a>
						<a href="javascript:void(0)" id="deselect_all"><span>Reset</span></a>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for=""></label>
					<div class="col-sm-9">
						<div class="loader_data" style="color:#f00"></div>
					</div>
				</div>



					<div class="space-4"></div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-10 col-md-2">
                           <!-- <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>-->
							<button class="btn btn-info submitInvite">
                                <i class="ace-icon"></i>
                                Submit
                            </button>


                        </div>
                    </div>

                </form>



				<div class="col-xs-12">
                    <button type="button" id="save_value" class="sendInvitation" style="display:none;">Send SMS</button>
                   <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="CheckAll" onchange="checkAll(this)" title="Check All"></th>
                                <th>Exam</th>
                                <th nowrap>Student Name</th>
                                <th nowrap>Mobile</th>
                                <th nowrap>Invitation Link</th>
                                <th nowrap>OTP Verified</th>
                                <th nowrap>SMS Sent</th>
                                <th nowrap>Date</th>
                                <th nowrap>Action</th>
                            </tr>
                             </thead>
                        <tbody>
                            <?php

if (is_localhost()) {
	$front_url = "http://localhost/pcskhalipur/";
} else {
	$front_url = "http://pcskhalispur.com/";
}

if (isset($QuizinvitationList)) { 
	foreach ($QuizinvitationList as $value) {
		$value = (array) $value;
		?>
                            <tr id="<?=$value['id']?>">

                                <td nowrap><input type="checkbox" class="studentId" value="<?=$value['id']?>"> </td>
                                <td nowrap><?=$value['quiz_title']?> </td>
                                <td nowrap><?=$value['student_name']?> </td>
                                <td nowrap><?=$value['contact_no']?> </td>
                                <td nowrap><?=$front_url . 'din/' . $value['invitation_link']?> </td>
                                <td nowrap><?=($value['isVerified'] == 1) ? 'Yes' : 'No';?> </td>
                                <td nowrap><?=($value['sms_sent'] == 1) ? 'Yes' : 'No';?> </td>

                                <td nowrap><?=date('d-M-Y', strtotime($value['invitation_created']))?></td>
                                <td>

                                    <a href="#" id="<?=$value['id']?>" title="Delete" class="deleteinvitation"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a>
                                </td>
							</tr>
                        <?php
}
}
?>
                        </tbody>

                   </table>
                   {{$QuizinvitationList->links()}}
		</div>
		<div class="hr hr32 hr-dotted"></div>




                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

<script>

</script>
@endsection
