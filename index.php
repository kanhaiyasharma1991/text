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
                      <input type="text" name="find_word" value="<?php echo (isset($_POST['find_word'])?$_POST['find_word']:'');?>" id="find_word" class="form-control form-control-lg" placeholder="Enter Search Word...">
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

                          $break_condition = [' ', "\n"]; ////////////////////////////////////////////////

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
						  
						  $find_data2 = "Accused|Under investigation|Probe|Questioned|Summoned|Cited|Wanted|Arrested|Booked|Complaint filed|FIR|Facing charges|Charge|Chargesheet|Indict|Bail|Plead guilty|Plead not guilty|Plead innocent|Plea bargain|Plea agreement|Confess|Admit|Trial|Found guilty|Convict|Sentence|Served jail time|Suspende|Probation|Supervised Release|Community Service|Fine|Restitution|Penalty|Regulatory Action|Petition filed|Appeal|Re-trial|Suit|Acquitt|Not guilty|Innocent|Clear|Drop|Dismiss|Exonerate|Discharge|Conviction|Pardon|Release|Parole|Abuse|Child abuse|Child neglect|Child endangerment|Arson|Assault|Battery|Bribery|Burglary|Business Crime|Counterfeiting|Conspiracy|Copyright Infringement|Cybercrime|Denied Entity|Drug Possession|Drug Trafficking|Environmental Crimes|Forfeiture|Fraud|Fugitive|Gambling|Human Rights|Weapons Possession|Identity Theft|Prostitution|Kidnapping|Loan Sharking|Misconduct|Money Laundering|Mortgage fraud|Murder|Obscenity|Organized Crime|Perjury|Possession of Stolen Property|Real Estate Actions|Robbery|Securities Violation|Sex Offense|Smuggling|Spying|Tax|Terrorism|Theft|Human Trafficking|Accuse|Disciplinary Action|Audit|Allege|Arbitration|Arraign|Arrest|Censure|Confession|Conspire|Deported|Expelled|Plea|Revoked Registration|Sanction|Settlement or Suit|Seizure|Suspend|Suspect|Resign|abscond|Fled|On the run|Bankrupt|Deceased|Died|Extradition|Sack|Barred|Violence|malicious burning|harassment|vehicular assault|kickbacks|graft|corruption|abuse of power|abuse of office|home invasion|Ponzi scheme|pyramid scheme|wire fraud|mail fraud|identity fraud|manslaughter|homicide|embezzlement|extortion|grand theft|grand larceny|shoplifting|misappropriation|larceny|tax violation|treason|espionage|trafficking|contraband|carjacking|molestation|contempt|facing|maximum sentencing|statutory guidelines";
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
                            if(in_array(strtolower(rtrim($each_santence_word,'.')), $find_data)) {
                              
                              $flag = 1;
                            }
                            if(!in_array(strtolower($each_santence_word), $exception_data) && strpos($each_santence_word,"."))
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
                  echo $eachResult.'&#013';
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
 
 <footer>&copy; Copyright 2020 Kanhaiyasharma1991@gmail.com</footer>
</body>

</html>
