@extends('layouts.layout')



@section('content')
<style>
.scrolldetails {
	width:auto;
	overflow-y: scroll;
	overflow-x: hidden;
	height: 100px !important;           
	padding-bottom: 1px;
}
</style>
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

                



               <div class="col-xs-12">

                   <table id="dynamic-table" class="table table-striped table-bordered table-hover">

                        <thead>

                            <tr>

                                <th>Exam Title</th>
                                <th>Question Title</th>

                                <th>Option 1</th>

                                <th>Option 2</th>

                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Correct Answer</th>

                                <th>Action</th>

                            </tr>

                             </thead>

                        <tbody>

                            <?php 
                            if($QuestionList){

                                foreach ($QuestionList as $value) {                                 
									$value = (array) $value;
                            ?>

                            <tr id="<?=$value['id']?>">

                            <td><?=$value['quiz_title']?> </td>
                            <td><div class="scrolldetails"><?=$value['question_title']?></div> </td>
							
                            <td><?=$value['option1']?> </td>

                            <td><?=$value['option2']?> </td>

                            <td><?=$value['option3']?> </td>

                            <td><?=$value['option4']?> </td>
                            <td>Option <?=$value['correct_answer']?> </td>
                            

                                <td>

                                    <a href="<?=url('question/'.$value['id'])?>"><i class="ace-icon fa fa-pencil-square-o fa-2x icon-only"></i></a> 

                                    <a href="#" id="<?=$value['id']?>" title="Delete" class="deletequestion"> <i class="ace-icon fa fa-trash-o fa-2x icon-only"></i></a> 

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

