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
            <li class="active">Exam</li>
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
                
                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="quiz" method="post" role="form" action="{{url('quiz/'.$id)}}">
                    {{csrf_field()}}
					<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">
					
                    
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="class_id"> Class* </label>
						<div class="col-sm-9">
							<select class="col-xs-10 col-sm-5" id="class_id" name="class_id" required>
								<option value="">Select Class</option>
								
								<?php 
                            if($ClassList){
                                foreach ($ClassList as $value) {
                            ?>
								<option value="<?=$value['id']?>" <?=(isset($details->class_id) && $details->class_id==$value['id'])?'selected="selected"':''?>><?=$value['name']?></option>
								<?php
                                }
                            }
                           ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="subject_id"> Subject* </label>
						<div class="col-sm-9">
							<select class="col-xs-10 col-sm-5" id="subject_id" name="subject_id" required>
								<option value="">Select Subject</option>
								
								<?php 
                            if($SubjectList){
                                foreach ($SubjectList as $value) {
                            ?>
								<option value="<?=$value['id']?>" <?=(isset($details->subject_id) && $details->subject_id==$value['id'])?'selected="selected"':''?>><?=$value['name']?></option>
								<?php
                                }
                            }
                           ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="quiz_title"> Exam Title* </label>
                        <div class="col-sm-9">
                            <input type="text" class="col-xs-10 col-sm-5" id="quiz_title" name="quiz_title" value="<?=isset($details->quiz_title)?$details->quiz_title:''?>" placeholder="Exam Title" maxlength="255" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="quiz_max_marks"> Max Marks* </label>
                        <div class="col-sm-9">
                            <input type="text" class="col-xs-10 col-sm-5" id="quiz_max_marks" name="quiz_max_marks" value="<?=isset($details->quiz_max_marks)?$details->quiz_max_marks:''?>" placeholder=" Max Marks" maxlength="3" required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="quiz_max_time">  Max Time* </label>
                        <div class="col-sm-9">
                            <input type="number" class="col-xs-10 col-sm-5" id="quiz_max_time" name="quiz_max_time" value="<?=isset($details->quiz_max_time)?$details->quiz_max_time:''?>" placeholder="Max Time in minutes" maxlength="3" required>
                        </div>
						
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="quiz_total_question"> Total Questions* </label>
                        <div class="col-sm-9">
                            <input type="text" class="col-xs-10 col-sm-5" id="quiz_total_question" name="quiz_total_question" value="<?=isset($details->quiz_total_question)?$details->quiz_total_question:''?>" placeholder="Total Questions" maxlength="3" required>
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="isPublished">&nbsp;</label>
						<div class="checkbox">
						  &nbsp;&nbsp;
						  <label><input type="checkbox" name="isPublished" value="1" <?=(isset($details->isPublished) && $details->isPublished==1)?'checked="checked"':''?>>Publish</label>
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

               


                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

@endsection
