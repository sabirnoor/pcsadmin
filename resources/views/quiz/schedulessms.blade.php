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
            <li class="active">schedule SMS</li>
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

                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="invitation" method="post" role="form" id="inviteForm" action="">
                    {{csrf_field()}}
					<input type="hidden" name="edit" value="<?=isset($id) ? $id : 0?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="quizid"> Date* </label>
                        <div class="col-sm-9">
                            <input type="text" id="scheduledate" name="scheduledate"  placeholder="dd-mm-yy" value="" class="scheduledate col-xs-10 col-sm-5">
                        </div>
                    </div>

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
								<option value="<?=$value['id']?>"><?=$value['quiz_title']?></option>
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
						<label class="col-sm-3 control-label no-padding-right" for="branchFilter"> Select Branch<br/><small>(Optional)</small> </label>
						<div class="col-sm-9">
							<select class="col-xs-10 col-sm-5" id="branchFilter" name="branchFilter" required>
								<option value="">--Select Branch--</option>
								<option value="PCS">PCS</option>
								<option value="GYANDEEP">GYANDEEP</option>

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
							<button class="btn btn-info submitSchedule">
                                <i class="ace-icon"></i>
                                Submit
                            </button>


                        </div>
                    </div>

                </form>




		<div class="hr hr32 hr-dotted"></div>




                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

<script>

</script>
@endsection
