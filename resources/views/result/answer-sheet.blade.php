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

            <li>Result</li>
            <li class="active">Answer Sheet</li>

        </ul><!-- /.breadcrumb -->

    </div>

    <div class="page-content">
	
	<div class="row">
		<div class="col-md-12 mb-md-0 mb-5">
		<h1 style="color:#438eb9"><?=$quiz_details->quiz_title;?></h1>
		<?php 
			if($QuizquestionsList){

				foreach ($QuizquestionsList as $value) {                                 
					$user_answer='';$color='';$icon='';
					$value = (array) $value;
					if(isset($user_result_data_arr[$value['id']])){
						$user_answer = $user_result_data_arr[$value['id']]['optionchosen'];
						
						if($value['correct_answer']==$user_result_data_arr[$value['id']]['optionchosen']){
							$color = '#17ca17';
							$icon = '<i class="ace-icon fa fa-check icon-only"></i>';
						}else{
							$color = '#f00';
							$icon = '<i class="ace-icon fa fa-times icon-only"></i>';
						}
					}else{
						$user_answer='';
					}
			?>
			<h3><?php echo $value['question_title']; ?></h3>
			<h5>Option 1: <?=$value['option1']?></h5>
			<h5>Option 2: <?=$value['option2']?></h5>
			<h5>Option 3: <?=$value['option3']?></h5>
			<h5>Option 4: <?=$value['option4']?></h5>
			
			<h4 style="">Correct Option : Option <?=$value['correct_answer']?></h4>
			
			<h4 style="">Your Answer :
			<span style="color:<?=$color?>">
				<?php if($user_answer<>''){ echo 'Option '.$user_answer.' '.$icon; }?>
			</h4>
		<?php
				}
			}
		?>
		</div>
  
   </div>

        

    </div><!-- /.page-content -->

</div>



@endsection

