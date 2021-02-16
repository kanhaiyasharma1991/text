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
						  
						  $find_data2 = "abduct|abducted|abduction|abscond|absconding|abuse|abusing|abusive|accomplice|accumulate|accumulated|accuse|accused|accusing|acquit|acquittal|acquitted|admit|admitted|agency|aggravate|aggravated|allege|alleged|allegedly|alter|altered|altering|ammunition|appeal|appealing|appear|arbitration|arraign|arraigned|arraignment|arrest|arrested|arresting|arson|assailant|assailants|assault|assaulted|assaulting|at large|attack|attacked|attacking|attacks|attempt|attempted|attempting|audit|audited|authorities|authority|bail|bailed|ban|bankrupt|bankruptcy|banned|barred|battery|bogus|booked|brandish|brandished|breach|break|breaking|bribe|bribery|broke|bullet|bullets|burglary|business crime|carjack|carjacking|cartel|cartels|case|cases|cellmate|censure|censured|charge|charged|charges|chargesheet|charging|charity|chase|cheat|cheated|cheating|child abuse|child endangerment|child neglect|chok|choked|cited|claimed|claiming|claims|clear|cleared|co conspirator|co conspirators|cocaine|community service|compensation|complain|complainant|complaint filed|conceal|concealment|confess|confession|conflict|conflicting|conspiracy|conspirator|conspirators|conspire|conspiring|contempt|contraband|controlled substance|convict|convicted|conviction|copyright infringement|corrupt|corrupting|corruption|corruptly|counsel|counterfeit|counterfeiting|court|court cost|crash|crashed|crime|crimes|criminal|criminal mischief|criminals|cybercrime|dead|death|deceased|deceive|deceived|deceiving|deception|defraud|defrauding|degree|denied entity|deport|deportation|deported|detain|detained|detainee|died|discharge|disciplinary action|dishonest|dishonestly|dishonesty|dismiss|dismissal |dismissed|disproportionate|dispute|disputed|drop|dropped|drug|drug possession|drug trafficking|drugs|dummy|dupe|dupped|ED|embezzle|embezzlement|embezzling|emergency|enforcement directorate|environmental crimes|escape|escaped|escapee|escaping|espionage|exonerate|exonerated|expell|expelled|explosive|explosives|extort|extorted|extortion|extradited|extradition|facing charges|fake|faked|faking|false|falsehood|falsely|falsification|falsified|felon|felony|fentanyl|fine|fined|fines|FIR|fire|firearm|firearms|firing|fled|fleeing|force|forced|forcing|forfeiture|forged|forgery|found guilty|fraud|fraudster|fraudsters|fraudulent|freeze|frozen|fugitive|gamble|gambling|gang|graft|grand jury|grand larceny|grand theft|gun|gunpoint|guns|handgun|harassment|harrass|harrassing|hashish|hawala|home invasion|homicide|human rights|human trafficking|identity fraud|identity theft|ill gotten|illegal|illegally|impersonate|impersonating|impersonation|impersonations|imprisonment|improper|incite|inciting|indict|indicted|indictment|induce|induced|inducement|inducing|inmate|innocent|intimidate|intimidating|investigate|investigating|investigation|issue|issues|jail|jailbreak|jailed|kickback|kickbacks|kidnap|kidnapped|kidnapping|kill|killed|killing|knife|larceny|launder|laundered|laundering|law|law enforcement|lawsuit|loan sharking|lure|lured|mail fraud|malfunction|malfunctioning|malicious burning|malpractice|malpractices|manslaughter|marijuana|meth|methamphetamine|methamphetamines|militant|militants|minor|minors|misappropriation|misconduct|misdemeanor|misuse|misused|molest|molestation|molested|molesting|money laundering|mortgage fraud|murder|murdered|murdering|murders|neglect|not guilty|obscenity|obstruct|obstructing|offend|offended|offense|offenses|on the run|order|ordered|organized crime|pardon|parole|penalty|perjury|petition filed|pistol|plea|plea agreement|plea bargain|plead guilty|plead innocent|plead not guilty|pleaded|pleaded guilty|pleaded innocent|pleas|plot|plotting|police|ponzi scheme|pose|possess|possessed|possession|pretext|prevarication|prison|prisoner|prisoners|probation|probe|proceeds|prohibit|prohibited|prohibition|prostitute|prostitution|pyramid scheme|questioned|racket|racketeering|ran|real estate actions|recover|recovered|regulatory action|release|released|resign|resigned|restitution|restrain|restrained|re-trial|revoke|revoked|revoked registration|rifle|riot|riots|rob|robbed|robbery|roberries|sabotage|sack|safe|safety|sanction|sanctions|scam|scams|scheme|schemes|scheming|screem|search|search warrant|securities violation|sedition|seize|seized|seizure|sentence|sentenced|sentencing|served jail time|settle|settlement|sex offense|sexual|sexually|shoot|shooting|shoplifting|shot|smuggled|smuggler|smuggling|snatch|snatched|snatching|speed off|spying|stab|stabbed|stabbing|steal|stealing|stolen|struggle|subversive|sue|suing|suit|summon|summoned|summons|supervised release|surcharge|suspect|suspected|suspecting|suspend|suspended|suspension|syndicate|syndicates|tax|tax evasion|tax violation|terror|terrorism|terrorist|testified|testify|theft|thief|threat|threatened|threatening|threating|threats |thugs|torture|tortured|torturing|trafficker|traffickers|trafficking|treason|trial|unauthorise|unauthorised|undocument|undocumented|unlawful|vehicular assault|victim|victim surcharge|victims|violant|violation|violence|voilate|wanted|weapon|weapons|weapons possession|wire fraud|wound|wounds|infraction|lawlessness|transgression|transgressing|poaching|violating|hijacking|hijacker|hijack|shoplifter|Hack|hacking|hacked|patricide|blackmail|bombing|domestic violence|drunk driving|hit and run|hooliganism|libel|looting|lynching|mugging|pickpocketing|pilfering|rape|bomb|evil|genocide|euthanasia|speeding|vandalism|vandalised|assassination|slander|trespassing|trespass|shoplift|raid|Handcuffs|Gunrunning|Criminology|Damage|Danger|Dangerous|killer|Defamation|";
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
							$b = substr($each_santence_word,1);
							//preg_match('/^[0-9]+(\.[0-9]{1,4})?$/', $a)   preg_match("/^[0-9,]+$/", $a)
							if(preg_match('/^[0-9,]+(\.[0-9,]{1,4})?$/', $a) or preg_match('/^[0-9,]+(\.[0-9,]{1,4})?$/', $b)) {
							  $flag = 1;
							}
							
                            if(!in_array(strtolower($each_santence_word), $exception_data) && strpos($each_santence_word,".") && strpos($each_santence_word,".")>1 && is_numeric($a)==false )
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
 
 <footer>&copy; Copyright 2020 Kanhaiya</footer>
</body>

</html>
