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
			<h5>Option 1: <?=$value['option1']?></h5>
			<h5>Option 2: <?=$value['option2']?></h5>
			<h5>Option 3: <?=$value['option3']?></h5>
			<h5>Option 4: <?=$value['option4']?></h5>
			
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

