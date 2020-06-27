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
            <li class="active">Feedback</li>
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
                
                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="feedback" method="post" role="form" action="{{url('feedback/'.$id)}}">
                    {{csrf_field()}}
					<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">
					
                    <input type="hidden" name="student_master_id" value="<?=isset($details->student_master_id)?$details->student_master_id:0?>">
                    
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
															
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="comments">On Online Class(Please Tick)* </label>
						<div class="radio">
						  &nbsp;&nbsp;
						  <label class="radio-inline"><input type="radio" name="comments" value="Satisfied" <?=(isset($details->comments) && $details->comments=='Satisfied')?'checked="checked"':''?> required>Satisfied</label>
						  
						  <label class="radio-inline"><input type="radio" name="comments" value="Not Satisfied" <?=(isset($details->comments) && $details->comments=='Not Satisfied')?'checked="checked"':''?> required>Not Satisfied</label>
						  
						  <label class="radio-inline"><input type="radio" name="comments" value="Need Improvement" <?=(isset($details->comments) && $details->comments=='Need Improvement')?'checked="checked"':''?> required>Need Improvement</label>
						  						  
						  <label class="radio-inline"><input type="radio" name="comments" value="Overall Ok" <?=(isset($details->comments) && $details->comments=='Overall Ok')?'checked="checked"':''?> required>Overall Ok</label>
						</div>
					</div>
					



					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="technical_issue"> Technical Issue </label>
                            <div class="col-sm-9">
							<textarea name="technical_issue" id="technical_issue" rows="4" cols="46" maxlength="250"><?=isset($details->technical_issue)?$details->technical_issue:''?></textarea>
								
                            </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="suggestion"> Suggestion* </label>
                            <div class="col-sm-9">
							<textarea name="suggestion" id="suggestion" rows="4" cols="46" maxlength="250" required><?=isset($details->suggestion)?$details->suggestion:''?></textarea>
								
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
