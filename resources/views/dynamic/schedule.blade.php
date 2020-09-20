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
            <li class="active">Add/Update schedule</li>
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
                
                <form class="form-horizontal" id="schedule" enctype="multipart/form-data" method="post" role="form" action="{{url('schedule/'.$id)}}">
                    {{csrf_field()}}
					
					<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">
					
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title"> Schedule Class*</label>
                        <div class="col-sm-9">
							<select class="col-xs-10 col-sm-5" name="classschedule" required>
							<option value="">Select</option>
							<?php 
							if($classschedule){
								foreach($classschedule as $val){
							?>
							<option value="<?=$val->id?>"<?=(isset($details->classschedule_id) && $details->classschedule_id==$val->id)?'selected':''?>><?=$val->name?></option>
							<?php 
								}
							}
							?>
							</select>
                            
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title"> Schedule Title* </label>
                        <div class="col-sm-9">
                            <input type="text" id="title" name="title" value="<?=isset($details->name)?$details->name:''?>" placeholder="Schedule Title" class="col-xs-10 col-sm-5" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="orderby">Display Order* </label>
                        <div class="col-sm-9">
                            <input type="number" id="orderby" name="orderby" value="<?=isset($details->orders_by)?$details->orders_by:''?>" placeholder="Order By" class="col-xs-10 col-sm-5" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="filesname"> Doc File </label>
                            <div class="col-sm-4">
                                    <input type="file" id="filesname" name="filesname" placeholder="Order By" class="form-control col-xs-10 col-sm-5" />
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
                                <th>Schedule Class</th>
                                <th>Schedule  Title</th>
                                <th>Display Order</th>
                                <th>Action</th>
                            </tr>
                             </thead>
                        <tbody>
                            <?php 
                            if(isset($Schedulemasterlist)){
                                foreach ($Schedulemasterlist as $value) {
                                 
                            ?>
                            <tr id="{{$value->id}}">
                                
                                <td><?=$value->classschedule?> </td>
                                <td><?=$value->name?> </td>
                                <td><?=$value->orders_by?></td>
                                <td>
                                    <a href="<?=url('schedule/'.$value->id)?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 
                                    <a href="#" id="{{$value->id}}" title="Delete" class="deleteschedule"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 
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
