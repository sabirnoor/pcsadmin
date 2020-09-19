<?php 
namespace App\Http\Controllers;
//echo '<pre>';print_r($UploadflashList);die; ?>
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

            <li class="active">Exam Group</li>

        </ul><!-- /.breadcrumb -->





    </div>



    <div class="page-content">





        <div class="row">

            <div class="col-xs-12">


               <div class="col-xs-12">

                   <table id="groupresult-table" class="table table-striped table-bordered table-hover">

                        <thead>

                            <tr>

                                <th>Branch</th>
                                <th>Adm No.</th>
                                <th>Class</th>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>Eng.</th>
                                <th>Hindi</th>
                                <th>Math</th>
                                <th>Sc.</th>
                                <th>S.SC.</th>         

                                

                            </tr>

                             </thead>

                        <tbody>

                            <?php 
                            if(isset($StudentmasterList)){

                                foreach ($StudentmasterList as $value) {                                 
									$value = (array) $value;
									
                            ?>

                            <tr id="<?=$value['id']?>">
                            <td><?=$value['branch']?> </td>
                            <td><?=$value['admission_no']?> </td>
                            <td><?=$value['present_class']?> </td>
                            <td><?=$value['Roll_No']?> </td>
                            <td><?=$value['student_name']?> </td>
                            <td><?php echo HomeController::find_quiz_score($value['id'],$id,2);?></td>
                            <td><?php echo HomeController::find_quiz_score($value['id'],$id,1);?></td>
							<td><?php echo HomeController::find_quiz_score($value['id'],$id,3);?></td>
							<td><?php echo HomeController::find_quiz_score($value['id'],$id,4);?></td>
							<td><?php echo HomeController::find_quiz_score($value['id'],$id,5);?></td>
                            
                            
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

