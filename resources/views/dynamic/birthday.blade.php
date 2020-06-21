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
            <li class="active">Add/Update Birthday</li>
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
		</div>
		<div class="col-sm-8">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Change Password</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						
						 <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="birthdaystudent" method="post" role="form" action="{{url('birthday/'.$id)}}">
							{{csrf_field()}}
							<!-- <legend>Form</legend> -->
							<fieldset>
							<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">
							<input type="hidden" name="page_name" value="birthday">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="orderby"> Adm No. </label>
								<div class="col-sm-9">
									<input type="text" id="admNo" name="admNo" value="<?=isset($details->admNo)?$details->admNo:''?>" placeholder="Adm No" class="col-xs-10 col-sm-8" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="orderby"> Student Name </label>
								<div class="col-sm-9">
									<input type="text" id="title" name="title" value="<?=isset($details->title)?$details->title:''?>" placeholder="Student Name" class="col-xs-10 col-sm-8" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="orderby"> Sex </label>
								<div class="col-sm-9">
									<input type="text" id="gender" name="gender" value="<?=isset($details->gender)?$details->gender:''?>" placeholder="Sex" class="col-xs-10 col-sm-8" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="class"> Class</label>
								<div class="col-sm-9">
									<input type="text" id="classes" name="classes" value="<?=isset($details->classes)?$details->classes:''?>" placeholder="Class" class="col-xs-10 col-sm-8" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="class"> Roll No.</label>
								<div class="col-sm-9">
									<input type="text" id="rollnumber" name="rollnumber" value="<?=isset($details->rollnumber)?$details->rollnumber:''?>" placeholder="Roll No." class="col-xs-10 col-sm-8" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="dateofbirth"> Date Of Birth </label>
								<div class="col-sm-9">
									<input type="text" id="dateofbirth" name="dateofbirth" autocomplete value="<?=isset($details->dateofbirth)?date('d-m-Y',strtotime($details->dateofbirth)):''?>" placeholder="Pick Date" readonly="readonly" class="col-xs-10 col-sm-8 dateofbirth">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="dateofbirth"> Admission Date </label>
								<div class="col-sm-9">
									<input type="text" id="admissiondate" name="admissiondate" autocomplete value="<?=isset($details->admissiondate)?date('d-m-Y',strtotime($details->admissiondate)):''?>" placeholder="Pick Date" readonly="readonly" class="col-xs-10 col-sm-8 dateofbirth">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="orderby"> Order By </label>
								<div class="col-sm-9">
									<input type="text" id="orderby" name="orderby" value="<?=isset($details->orders_by)?$details->orders_by:''?>" placeholder="Order By" class="col-xs-10 col-sm-8 numeric" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="image"> Photo </label>
									<div class="col-sm-9">
										<input type="file" id="image" name="image" class="form-control col-xs-10 col-sm-4">
									</div>
							</div>
						</fieldset>
							<div class="form-actions center">
								<button type="submit" class="btn btn-sm btn-success">
									Submit
									<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Import Excelsheet</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						
						<form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="" method="post" role="form" action="{{url('importExcel/')}}">
							{{csrf_field()}}
							<!-- <legend>Form</legend> -->
							<fieldset>
							<span class="help-block">Excel file should be xlsx,xls! <a href="{{url('public/upload/birthday/sample.xlsx')}}">Download Sample</a></span>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="image"> Excelsheet </label>
									<div class="col-sm-9">
										<input type="file" id="import_file" name="import_file" class="form-control col-xs-10 col-sm-5">
									</div>
							</div>
							
							
						</fieldset>
							<div class="form-actions center">
								<button type="submit" class="btn btn-sm btn-success">
									Submit
									<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
            <div class="col-xs-12">
               <div class="col-xs-12">
                   <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL.No.</th>
                                <th>Title</th>
                                <th>Adm No</th>
                                <th>Date of Birth</th>
                                <th>Admission Date</th>
                                <th>Sex</th>
                                <th>Class</th>
                                <th>Roll No</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                             </thead>
                        <tbody>
                            <?php 
                            if($BirthdayList){
                                foreach ($BirthdayList as $k=>$value) {
                                 
                            ?>
                            <tr id="<?=$value['id']?>">
                                <td><?=$k+1?> </td>
                                <td><?=$value['title']?> </td>
                                <td><?=$value['admNo']?></td>
                                <td><?=date('d-M-Y',strtotime($value['dateofbirth']))?></td>
                                <td><?=date('d-M-Y',strtotime($value['admissiondate']))?></td>
								<td><?=$value['gender']?></td>
								<td><?=$value['classes']?></td>
								<td><?=$value['rollnumber']?></td>
								<td>
								<?php if(!empty($value['images'])){ ?>
								<img height="50" src="<?php echo src_path().'birthday/photo/'.'web_'.$value['images']; ?>">
								<?php }else{ ?>
								<img height="50" src="{{asset('public/assets/images/birthday-girl-no.png')}}" alt="">
								<?php } ?>
								</td>
                                <td>
                                    <a href="<?=url('birthday/'.$value['id'])?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 
                                    <a href="#" id="<?=$value['id']?>" title="Delete" class="birthdaynotice"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 
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

@endsection
