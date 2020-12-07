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
h1{
	font-size: 26px;
	
}
h3{
	font-size: 15px;
	font-weight: bold;
	margin-top:6px;
	margin-bottom:0px;
}
h5{
	font-size: 12px;
	margin-top:1px;
	margin-bottom:1px;
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

            <li class="active">Exam Questions</li>

        </ul><!-- /.breadcrumb -->

    </div>

    <div class="page-content">
	
	<div class="row">
		<div class="col-md-12 mb-md-0 mb-5">
		<h1 style="color:#438eb9"><?=$quizdetails->quiz_title;?></h1>
		<?php 
			if($QuizquestionsList){

				foreach ($QuizquestionsList as $value) {                                 
					$value = (array) $value;
			?>
			<h3><?php echo $value['question_title']; ?></h3>
			
			<h5>
			<b>(i)</b> <span style="padding: 0 20px 1px 0px;"><?php echo strip_tags($value['option1']);?> </span>
			<b>(ii)</b> <span style="padding: 0 20px 1px 0px;"><?php echo strip_tags($value['option2']);?> </span>
			<b>(iii)</b> <span style="padding: 0 20px 1px 0px;"><?php echo strip_tags($value['option3']);?> </span>
			<b>(iv)</b> <span style="padding: 0 20px 1px 0px;"><?php echo strip_tags($value['option4']);?> </span>
			
			</h5>
			
			<h5 style="color:#17ca17">Correct Option : Option <?=$value['correct_answer']?></h5>
			
			
		<?php
				}
			}
		?>
		</div>
  
   </div>

        

    </div><!-- /.page-content -->
	

</div>



@endsection

