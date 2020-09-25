<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Riskography Summarization Tool - By Kanhaiya</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
</head>
<body>
  <header class="masthead text-white text-center" style="padding-top: 0rem;">
    <div class="overlay"></div>
    <div class="container-fluid">
	
      <div class="row">
        <div class="col-md-12 col-md-offset-3">
          <h1 class="text-center">Riskography Analysis and Summarization Tool</h1>
        </div>
      </div>
	  
      <div class="row">
        <div class="col-md-12 ">
            <div class="form-row">
              <div class="col-md-6">
                <form action="#" method="POST" class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="text" name="find_examption" disabled value="<?php echo (isset($_POST['find_examption'])?$_POST['find_examption']:'');?>" id="find_examption" class="form-control form-control-lg" placeholder="Enter EXP Word...">
                    </div>
                    <div class="col-md-10">
                      <input type="text" name="find_word" value="<?php echo (isset($_POST['find_word'])?$_POST['find_word']:'');?>" id="find_word" class="form-control form-control-lg" placeholder="Enter search word/entity name...">
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="btn_submit" class="btn btn-block btn-lg btn-primary">Check</button>
                    </div>
                    <div class="col-md-12" style="margin-top:2%;">
                      <textarea name="in_text" id="in_text" class="form-control form-control-lg" rows="18" cols="100" placeholder="Enter Paragraph here..."><?php echo (isset($_POST['in_text'])?$_POST['in_text']:'');?></textarea> 
                    </div>
                  </div>
                </form>
              </div>
			  
              <div class="col-md-6">
                <div class="row">
                      <div class="col-md-12">
                         <div class="col-md-12">
                          <button class="btn btn-block btn-lg btn-warning">Search Result are ....</button>
                        </div>
                        <div class="col-md-12">
                          <button  id="reset_btn" class="btn btn-block btn-lg btn-danger">Reset</button>
                        </div>
                      </div>
                
                <div class="col-md-12" style="margin-top:2%;">
                
                    <?php
                    $result = [];$resultcheck = [];
                      if(isset($_POST['btn_submit'])){
                        //if(!empty($_POST['in_text']) && !empty($_POST['find_word']))
						if(!empty($_POST['in_text']))
                        {
                          function multiexplode ($delimiters,$string) {
                              $ready = str_replace($delimiters, $delimiters[0], $string);
                              $launch = explode($delimiters[0], $ready);
                              return  $launch;
                          }

                          $break_condition = [' ', '  ', "\n"]; ////////////////////////////////////////////////

                          //$exception_data = isset($_POST['find_examption'])?explode('|',$_POST['find_examption']):[]; ////////////////////////////////////////////////
						  $exception_data2 = "U.S.|U.S.A.|Miss.|Mr.|Mrs.|U.K.|Jr.|i.e.|etc.|MS.";
						  $exception_data = explode('|',$exception_data2);
                          $exception_data1 = [];
						  
                          if(count($exception_data)>0){
                            foreach($exception_data as $exception_dataTrimLower){
                              $exception_data1[] = strtolower(trim($exception_dataTrimLower));
                            }
                            $exception_data = $exception_data1;
                          }
						  
						  $find_data2 = "Accused|Probe|Questioned|Summoned|Cited|Wanted|Arrested|Booked|FIR|Charge|Chargesheet|Indict|Bail|Confess|Admit|Trial|Convict|Sentence|Suspende|Probation|Fine|Restitution|Penalty|Appeal|Re-trial|Suit|Acquitt|Innocent|Clear|Drop|Dismiss|Exonerate|Discharge|Conviction|Pardon|Release|Parole|Abuse|Arson|Assault|Battery|Bribery|Burglary|Counterfeiting|Conspiracy|Cybercrime|Forfeiture|Fraud|Fugitive|Gambling|Prostitution|Kidnapping|Misconduct|Murder|Obscenity|Perjury|Robbery|Smuggling|Spying|Tax|Terrorism|Theft|Accuse|Audit|Allege|Arbitration|Arraign|Arrest|Censure|Confession|Conspire|Deported|Expelled|Plea|Sanction|Seizure|Suspend|Suspect|Resign|abscond|Fled|Bankrupt|Deceased|Died|Extradition|Sack|Barred|Violence|harassment|kickbacks|graft|corruption|manslaughter|homicide|embezzlement|extortion|shoplifting|misappropriation|larceny|treason|espionage|trafficking|contraband|carjacking|molestation|contempt|facing|Investigation|Complaint|Charges|Gulity|Jail|Community|Regulatory|Petition|Neglect|Endangerment|Crime|Infringement|Denied|Drug|Environmental|Weapons|Sharking|Laundering|Stolen|Actions|Violation|Sex|Offense|Disciplinary|Revoked|Run|malicious|burning|Power|invasion|Ponzi|pyramid|sentencing|statutory|January|February|March|April|May|June|July|August|September|October|November|December|Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|Sun|Mon|Tue|Wed|Thu|Fri|Sat|Sunday|Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|";
                          $find_data3 = $_POST['find_word'];
						  $find_data4 = $find_data2.$find_data3;
						  
						  $find_data = explode('|', $find_data4);
						  
                          $find_data1 = [];
                          if(count($find_data)>0){
                            foreach($find_data as $find_dataTrimLower){
                              $find_data1[] = strtolower(rtrim(trim($find_dataTrimLower),'.'));
                            }
                            $find_data = $find_data1;
                          }

                          $data = multiexplode($break_condition,$_POST['in_text']);
                          $santance = '';
                          $flag = 0;
                         
                          foreach($data as $key=>$each_santence_word)
                          {
                            $each_santence_word = trim($each_santence_word);
							foreach($find_data as $key=>$each_keyword)	{
								if(strtolower(rtrim($each_santence_word,'.')) == $each_keyword or strtolower(rtrim($each_santence_word,'.')) == $each_keyword.'s' or strtolower(rtrim($each_santence_word,'.')) == $each_keyword.'es' or strtolower(rtrim($each_santence_word,'.')) == $each_keyword.'d' or strtolower(rtrim($each_santence_word,'.')) == $each_keyword.'ed' or strtolower(rtrim($each_santence_word,'.')) == $each_keyword.'ing')  {
									$flag = 1;
								}
							}
                            if(in_array(strtolower(rtrim($each_santence_word,'.')), $find_data)) {
                              $flag = 1;
                            }
							$a = trim($each_santence_word,'$');
							//if (is_numeric(trim($a,","))) {
							if(preg_match("/^[0-9,]+$/", $a)) {
							  $flag = 1;
							}	 
							
							
                            if(!in_array(strtolower($each_santence_word), $exception_data) && strpos($each_santence_word,".") && strpos($each_santence_word,".")>1 )
							//if(!in_array(strtolower($each_santence_word), $exception_data) && strpos($each_santence_word,"."))
                            {
                              
                              if ($flag == 1){
                                $santance .= $each_santence_word;
                                array_push($result,ltrim($santance,'.'));
                                $santance = trim(strrchr($each_santence_word,'.')) != ''?trim(strrchr($each_santence_word,'.')):'';
                                $flag = 0;
                                }else {
                                  $santance = trim(strrchr($each_santence_word,'.')) != ''?trim(strrchr($each_santence_word,'.')).' ':'';
                              }
                            }else{
                              $santance .= $each_santence_word.' ';
                            }
                          }                          
                        }
                      }
                    ?>
                <textarea id="text_result" class="form-control form-control-lg" rows="18" cols="100"><?php
                foreach($result as $eachResult){
                  echo $eachResult.'&#013'.'&#013';
				  //echo $eachResult.' ';
                }
                ?></textarea>
			
                </div>
                </div>
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </header>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
 
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
  $('document').ready(function(){
    $('#reset_btn').click(function(){
      
      $('#in_text').val('').change();
      $('#text_result').val('').change();
    });
  });
  </script>
 
 <footer>&copy; Copyright 2020</footer>
</body>

</html>
