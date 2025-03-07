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

            <li class="active">Exam Result</li>

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

                                <th>Exam Title</th>
                                <th>Subject</th>
                               
                                <th>Student Name</th>                             
                                <th>Date</th>                             
                                <th>Result Id</th>                             
                                <th>User Id</th>                             
                                <th>Quiz Id</th>                             

                                <th>Action</th>

                            </tr>

                             </thead>

                        <tbody>

                            <?php 
                            if($QuizresultList){

                                foreach ($QuizresultList as $value) {                                 
									$value = (array) $value;
                            ?>

                            <tr id="<?=$value['result_id']?>">
                            <td><?=$value['quiz_title']?> </td>
                            <td><?=$value['subject_name']?> </td>
                            <td><?=$value['student_name']?> </td>
                            <td><?=$value['created_at']?> </td>
                            <td><?=$value['result_id']?> </td>
                            <td><?=$value['userid']?> </td>
                            <td><?=$value['quizid']?> </td>
							
                           
                                <td>
                                    <a href="<?=url('result/'.$value['result_id'])?>" title="Result" target="_blank"><i class="ace-icon fa fa-eye fa-2x icon-only"></i></a> 
                                    
									<a href="<?=url('answersheet/'.$value['result_id'])?>" title="Answer Sheet" target="_blank"><i class="ace-icon fa fa-clipboard fa-2x icon-only"></i></a> 

                                    <a href="#" id="<?=$value['result_id']?>" title="Delete" class="deleteresult"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 
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

