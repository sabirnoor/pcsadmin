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
            <li class="active">Question</li>
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
                
                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="question" method="post" role="form" action="{{url('question/'.$id)}}">
                    {{csrf_field()}}
					<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">
									
                    
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="quizid"> Select Exam* </label>
						<div class="col-sm-10">
							<select class="col-xs-10 col-sm-5" id="quizid" name="quizid" required>
								<option value="">Select Exam</option>
								
								<?php 
                            if($QuizList){
                                foreach ($QuizList as $value) {
									$value = (array) $value;
                            ?>
								<option value="<?=$value['id']?>" <?=(isset($details->quizid) && $details->quizid==$value['id'])?'selected="selected"':''?>><?=$value['quiz_title']?></option>
								<?php
                                }
                            }
                           ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="question_title"> Question Title* </label>
                        <div class="col-sm-10">                            
							
							<textarea name="question_title" id="editor1" rows="" cols="10" required><?=isset($details->question_title)?$details->question_title:''?></textarea>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="option1"> Option 1* </label>
                        <div class="col-sm-10">
                            <textarea name="option1" id="option1" rows="" cols="10" required><?=isset($details->option1)?$details->option1:''?></textarea>							
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="option2">  Option 2* </label>
                        <div class="col-sm-10">
                            <textarea name="option2" id="option2" rows="" cols="10" required><?=isset($details->option2)?$details->option2:''?></textarea>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="option3"> Option 3* </label>
                        <div class="col-sm-10">
                            <textarea name="option3" id="option3" rows="" cols="10" required><?=isset($details->option3)?$details->option3:''?></textarea>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="option4"> Option 4* </label>
                        <div class="col-sm-10">
                            <textarea name="option4" id="option4" rows="" cols="10" required><?=isset($details->option4)?$details->option4:''?></textarea>
                        </div>
                    </div>
					
					
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="correct_answer"> Correct Answer* </label>
						<div class="col-sm-10">
							<select class="col-xs-10 col-sm-5" id="correct_answer" name="correct_answer" required>
								<option value="">Choose Correct Answer </option>
								
								<option value="1" <?=(isset($details->correct_answer) && $details->correct_answer=="1")?'selected="selected"':''?>>Option 1</option>								
								<option value="2" <?=(isset($details->correct_answer) && $details->correct_answer=="2")?'selected="selected"':''?>>Option 2</option>
								<option value="3" <?=(isset($details->correct_answer) && $details->correct_answer=="3")?'selected="selected"':''?>>Option 3</option>
								<option value="4" <?=(isset($details->correct_answer) && $details->correct_answer=="4")?'selected="selected"':''?>>Option 4</option>
								
							</select>
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
