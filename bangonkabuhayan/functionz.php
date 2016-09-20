<?php
require "../zxcd9.php";

if(!empty($_POST)) 
{ 
    if($_POST['action'] == "submitpass") 
    {
       
      
				try 	
                	{	
                   
                     $stmt = $db->prepare("INSERT INTO bk_step1
                     (
                     hrdbid,
                     edt,
                     nameofproject ,
                     region,
                     province,
                     citymun,
                     projectstartdate,
                     ave_annual_inc_project,
                     cda, 
                     dole,
                     dti,
                     sec,
                     mod_scf,
                     mod_scf_sd, 
                     mod_scf_ed,
                     mod_cbla,
                     mod_cbla_sd,
                     mod_cbla_ed,
                     mod_peaf, 
                     mod_peaf_sd, 
                     mod_peaf_ed,
                     mod_st,
                     mod_st_sd,
                     mod_st_ed,
                     fs_dswd,
                     fs_lgu,
                     fs_mfi,
                     fs_partner,
                     fs_participant,
                     contactname,
                     altcontactname,
                     contactdp,
                     altcontactdp,
                     contactno,
                     altcontactno,
                      partner1,
                     partner2,
                     partner3,
                     partnertype1,
                     partnertype2,
                     partnertype3,
                     input1,
                     input2,
                     input3,
                     partnercontact1,
                     partnercontact2,
                     partnercontact3

                     )
                      VALUES
                      (
                         :id,
                         :dt,
                         :projectname,
                         :region,
                         :province,
                         :municipality,
                         :projectsd,
                         :AveAnnIncProject,
                         :cda,
                         :dole,
                         :dti,
                         :sec,
                         :mod_scf,
                         :scf_start,
                         :scf_end,
                         :mod_cbla,
                         :cbla_start,
                         :cbla_end,
                         :mod_peaf,
                         :peaf_start,
                         :peaf_end,
                         :mod_st,
                         :st_start,
                         :st_end,
                         :fund_dswd,
                         :fund_lgu,
                         :fund_mfi,
                         :fund_partner,
                         :fund_participant,
                         :contactname,
                         :altconname,
                         :contactdp,
                         :altcontactdp,
                         :contactno,
                         :altcontactno,
                          :partner1,
                         :partner2,
                         :partner3,
                         :f1,
                         :f2,
                         :f3,
                         :input1,
                         :input2,
                         :input3,
                         :partnercontact1,
                         :partnercontact2,
                         :partnercontact3
                         )

                       ");
                      $stmt->bindParam(':id',$_SESSION['id']);
                      $stmt->bindParam(':dt', date("mdY"));
          					  $stmt->bindParam(':projectname', $_POST['projectname']);
          					  $stmt->bindParam(':region', $_POST['region']);
          					  $stmt->bindParam(':province', $_POST['province']);
          					  $stmt->bindParam(':municipality', $_POST['municipality']);                 
          					  $stmt->bindParam(':projectsd', $_POST['projectsd']);
          					  $stmt->bindParam(':AveAnnIncProject', $_POST['AveAnnIncProject']);
          					  $stmt->bindParam(':cda', $_POST['cda']);
          					  $stmt->bindParam(':dole', $_POST['dole']);
          					  $stmt->bindParam(':dti', $_POST['dti']);
          					  $stmt->bindParam(':sec', $_POST['sec']);
          					  $stmt->bindParam(':mod_scf', $_POST['mod_scf']);
          					  $stmt->bindParam(':scf_start', $_POST['scf_start']);
          					  $stmt->bindParam(':scf_end', $_POST['scf_end']);
          					  $stmt->bindParam(':mod_cbla', $_POST['mod_cbla']);
          					  $stmt->bindParam(':cbla_start', $_POST['cbla_start']);
          					  $stmt->bindParam(':cbla_end', $_POST['cbla_end']);
          					  $stmt->bindParam(':mod_peaf', $_POST['mod_peaf']);
          					  $stmt->bindParam(':peaf_start', $_POST['peaf_start']);
          					  $stmt->bindParam(':peaf_end', $_POST['peaf_end']);
          					  $stmt->bindParam(':mod_st', $_POST['mod_st']);
          					  $stmt->bindParam(':st_start', $_POST['st_start']);
          					  $stmt->bindParam(':st_end', $_POST['st_end']);
                      $stmt->bindParam(':fund_dswd', $_POST['fund_dswd']);
                      $stmt->bindParam(':fund_lgu', $_POST['fund_lgu']);
                      $stmt->bindParam(':fund_mfi', $_POST['fund_mfi']);
                      $stmt->bindParam(':fund_partner', $_POST['fund_partner']);
                      $stmt->bindParam(':fund_participant', $_POST['fund_participant']);
                      $stmt->bindParam(':contactname', $_POST['contactname']);
                      $stmt->bindParam(':altconname', $_POST['altconname']);
                      $stmt->bindParam(':contactdp', $_POST['contactdp']);
                      $stmt->bindParam(':altcontactdp', $_POST['altcontactdp']);
                      $stmt->bindParam(':contactno', $_POST['contactno']);
                      $stmt->bindParam(':altcontactno', $_POST['altcontactno']);   
                      $stmt->bindParam(':partner1', $_POST['partner1']);                     
                      $stmt->bindParam(':partner2', $_POST['partner2']);
                      $stmt->bindParam(':partner3', $_POST['partner3']);
                      $stmt->bindParam(':f1', $_POST['f1']);
                      $stmt->bindParam(':f2', $_POST['f2']);
                      $stmt->bindParam(':f3', $_POST['f3']);
                      $stmt->bindParam(':input1', $_POST['input1']);                     
                      $stmt->bindParam(':input2', $_POST['input2']);
                      $stmt->bindParam(':input3', $_POST['input3']);           
                      $stmt->bindParam(':partnercontact1', $_POST['contactdetails1']);                  
                      $stmt->bindParam(':partnercontact2', $_POST['contactdetails2']);
                      $stmt->bindParam(':partnercontact3', $_POST['contactdetails3']);            
                     $stmt->execute();
                     $lastId = $db->lastInsertId('id');
                     return $lastId;
                      

                    
                  } 
                catch(PDOException $e) 
                  {
                      echo "Error: " . $e->getMessage();
                  }
    }

if($_POST['action'] == "submitpass2") 
    {
          
      //  $id= test_input($_GET['id']);
          
      $id1= $_POST['id1'];

        try   
                  { 
                   
                     $stmt1 = $db->prepare("INSERT INTO bk_step2
                     (
                          steponeid,
                         hrdbid,
                         dt,
                         rationale,
                         strategies,
                         projecthistory
                     )
                      VALUES
                      (
                         :id1,
                         :id2,
                         :dt,
                         :rationale,
                         :strategies,
                         :projecthistory                
                         )

                       ");

                          $stmt1->bindParam(':id1',$id1);    
                          $stmt1->bindParam(':id2',$_SESSION['id']);
                          $stmt1->bindParam(':dt', date("mdY"));
                          $stmt1->bindParam(':rationale', $_POST['rationale']);
                          $stmt1->bindParam(':strategies', $_POST['strategies']);
                          $stmt1->bindParam(':projecthistory', $_POST['projecthistory']);
                          $stmt1->execute();
                    
                  } 
                catch(PDOException $e) 
                  {
                      echo "Error: " . $e->getMessage();
                  }

                   
    }


if($_POST['action'] == "submitpass3") 
    {
          
      //  $id= test_input($_GET['id']);
              $id3= $_POST['id3'];

        try   
                  { 
                   
                     $stmt1 = $db->prepare("INSERT INTO bk_step3
                     (
                          steptwoid,
                         hrdbid,
                         dt,
                         major,
                         impact,
                         result
                     )
                      VALUES
                      (
                         :id3,
                         :id4,
                         :dt,
                         :major,
                         :impact,
                         :result                
                         )

                       ");

                          $stmt1->bindParam(':id3',$id3);    
                          $stmt1->bindParam(':id4',$_SESSION['id']);
                          $stmt1->bindParam(':dt', date("mdY"));
                          $stmt1->bindParam(':major', $_POST['major']);
                          $stmt1->bindParam(':impact', $_POST['impact']);
                          $stmt1->bindParam(':result', $_POST['result']);
                          $stmt1->execute();
                    
                  } 
                catch(PDOException $e) 
                  {
                      echo "Error: " . $e->getMessage();
                  }

                   
    }



}
?>
