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
            <li class="active">Upload Flash Images</li>
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
                
                <form class="form-horizontal" enctype="multipart/form-data" id="uploadflash" method="post" role="form" action="{{url('uploadflash/'.$id)}}">
                    {{csrf_field()}}
					<input type="hidden" name="edit" value="<?=isset($id)?$id:0?>">
                    <input type="hidden" name="page_name" value="academics">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="title"> Flash Title </label>
                        <div class="col-sm-9">
                            <input type="text" id="title" name="title" value="<?=isset($details->name)?$details->name:''?>" placeholder="Flash Title" class="col-xs-10 col-sm-5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="orderby"> Order By </label>
                        <div class="col-sm-9">
                            <input type="text" id="orderby" name="orderby" value="<?=isset($details->orders_by)?$details->orders_by:''?>" placeholder="Order By" class="col-xs-10 col-sm-5" />
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
                                <th>Order By</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                             </thead>
                        <tbody>
                            <?php 
                            if($UploadflashList){
                                foreach ($UploadflashList as $value) {
                                 
                            ?>
                            <tr id="<?=$value['id']?>">
                                
                                <td><?=$value['name']?> </td>
                                <td><?=$value['orders_by']?></td>
                                <td><img width="200" src="<?php echo src_path().'uploadflash/'.$value['images'] ?>"></td>
                                <td>
                                    <a href="<?=url('uploadflash/'.$value['id'])?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 
                                    <a href="#" id="<?=$value['id']?>" title="Delete" class="deletegallery"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 
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
