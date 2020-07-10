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

                



               <div class="col-xs-12">

                   <table id="dynamic-table" class="table table-striped table-bordered table-hover">

                        <thead>

                            <tr>

                                <th>Class</th>
                                <th>Subject</th>
                                <th>Exam Title</th>

                                <th>Max Marks</th>

                                <th>Max Time</th>

                                <th>Total Questions</th>
								<th>Published</th>
								<th>Starts On</th>
								<th>Ends On</th>

                                <th>Action</th>

                            </tr>

                             </thead>

                        <tbody>

                            <?php 
                            if($QuizList){

                                foreach ($QuizList as $value) {
								$value = (array) $value;
								
                               $quiz_start_date=isset($value['quiz_start_date'])?date('d-m-Y',strtotime($value['quiz_start_date'])):''; 
							   
                               $quiz_end_date=isset($value['quiz_end_date'])?date('d-m-Y',strtotime($value['quiz_end_date'])):'';  

                            ?>

                            <tr id="<?=$value['id']?>">

                            <td><?=$value['class_name']?> </td>
                            <td><?=$value['subject_name']?> </td>
                            <td><?=$value['quiz_title']?> </td>

                            <td><?=$value['quiz_max_marks']?> </td>

                            <td><?=$value['quiz_max_time']?></td>

                            <td><?=$value['quiz_total_question']?> </td>                           
						
							<td><?=(isset($value['isPublished']) && $value['isPublished']==1)?'Yes':'No'?> </td>
                             
							 <td><?=$quiz_start_date.' '.$value['quiz_start_time']?> </td>
							 <td><?=$quiz_end_date.' '.$value['quiz_end_time']?> </td>

                                <td nowrap>

                                    <a href="<?=url('quiz/'.$value['id'])?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 

                                    <a href="#" id="<?=$value['id']?>" title="Delete" class="deletequiz"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 
                                    
									<a href="#" id="<?=$value['id']?>" title="Archive" class="archivequiz"> <i class="ace-icon fa fa-archive fa-2x icon-only"></i></a> 
									
									<a href="<?=url('quizquestions/'.$value['id'])?>" id="<?=$value['id']?>" title="View Questions"> <i class="ace-icon fa fa-eye fa-2x icon-only"></i></a> 

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

