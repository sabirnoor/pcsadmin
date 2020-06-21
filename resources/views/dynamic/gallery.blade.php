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
            <li class="active">Gallery</li>
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
                
                <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" id="galleryimages" method="post" role="form" action="{{url('gallery/'.$id)}}">
                    {{csrf_field()}}
					<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">
                    <input type="hidden" name="page_name" value="academics">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="Category_id"> Category </label>
                        <div class="col-sm-9">
                            <select class="col-xs-10 col-sm-5" id="Category_id" name="Category_id">
							<option value="">Select</option>
							<?php 
							if($CategoriesList){
								foreach($CategoriesList as $val){
							?>
							<option value="<?=$val->id?>" <?=(isset($details->category_id) && $details->category_id==$val->id)?'selected':''?>><?=$val->name?></option>
							<?php 
								}
							}
							?>
							</select>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="eventdate"> Event Date </label>
                        <div class="col-sm-9">
                            <input type="text" id="noticedate" name="eventdate" autocomplete value="<?=isset($details->event_date)?date('d-m-Y',strtotime($details->event_date)):''?>" placeholder="Pick Date" class="col-xs-10 col-sm-5">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="description"> Description </label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description1" rows="" cols="46" ><?=isset($details->description)?$details->description:''?></textarea>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="orderby"> Order By </label>
                        <div class="col-sm-9">
                            <input type="text" id="orderby" name="orderby" value="<?=isset($details->orders_by)?$details->orders_by:''?>" placeholder="Order By" class="col-xs-10 col-sm-5 numeric" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="image"> Image </label>
                            <div class="col-sm-4">
                                    <input type="file" id="image" name="image" placeholder="Image" class="form-control col-xs-10 col-sm-5" />
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
                                <th>Title</th>
                                <th>Event date</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                             </thead>
                        <tbody>
                            <?php 
                            if($uploadgallery){
                                foreach ($uploadgallery as $value) {
                                 
                            ?>
                            <tr id="<?=$value->id?>">
                                
                                <td><?=$value->categoriesname?> </td>
                                <td><?=isset($value->event_date)?date('d-m-Y',strtotime($value->event_date)):''?> </td>
								<td><?=$value->description?> </td>
                                <td><img height="50" src="<?php echo src_path().'uploadgallery/'.'web_'.$value->images ?>"></td>
                                <td>
                                    <a href="<?=url('gallery/'.$value->id)?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 
                                    <a href="#" id="<?=$value->id?>" title="Delete" class="deletegalleryimage"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 
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
