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

                                <th>Comments</th>

                                <th>Is Clicked</th>
                                <th>Published</th>

                                <th>Action</th>

                            </tr>

                             </thead>

                        <tbody>

                            <?php 
                            if($FeedbackList){

                                foreach ($FeedbackList as $value) {

                                 

                            ?>

                            <tr id="<?=$value['id']?>">

                            <td><?=$value['student_name']?> </td>

                            <td><?=$value['admission_no']?> </td>

                            <td><?=$value['roll_no_previous']?> </td>

                            <td><?=$value['present_class']?> </td>

                            <td><?=$value['contact_no']?> </td>

                            <td><?=$value['whatsapp_no']?> </td>

                            <td><?=$value['comments']?> </td>

                            <td><?=(isset($value->IsClicked) && $value->IsClicked==1)?'Clicked':''?> </td>
                            <td><?=(isset($value->isPublished) && $value->isPublished==1)?'Yes':'No'?> </td>

                                <td>

                                    <a href="<?=url('feedback/'.$value['id'])?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 

                                    <a href="#" id="<?=$value['id']?>" title="Delete" class="deletefeedback"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 

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

