<?php
require_once("config.php");
include "session.php";
$limit = 8;  
 
if(isset($_POST["action"])){
    $query = "
  SELECT r.r_img,j.j_title,j.j_cat,j.j_id,j.j_maxsalary,j.j_minsalary,j.j_loc,j.j_postdate FROM job_details AS j, rc_details AS r WHERE j.j_status = '1' AND r.r_id=j.r_id
  ";
         if(isset($_POST["minimum_range"], $_POST["maximum_range"]) && !empty($_POST["minimum_range"]) && !empty($_POST["maximum_range"]))
         {
          $query .= "
           AND j.j_minsalary >= '".$_POST["minimum_range"]."' AND j.j_maxsalary <= '".$_POST["maximum_range"]."'
          ";
         }
         if(isset($_POST["job_type"]))
         {
          $type_filter = implode("','", $_POST["job_type"]);
          $query .= "
           AND j.j_type IN('".$type_filter."')
          ";
         }
         
         if(isset($_POST["job_exp"]))
         {
          $exp_filter = implode("','", $_POST["job_exp"]);
          $query .= "
           AND j.j_eduex IN('".$exp_filter."')
          ";
         }
         if(isset($_POST["selectedtype2"]) && $_POST["selectedtype2"]!="0")
         {
          
          $query .= "
           AND j.j_cat ='".$_POST["selectedtype2"]."'
          ";
          
         }
         if(isset($_POST["selectedlocation2"]) && $_POST["selectedlocation2"]!="0")
         {
          $query .= "
           AND j.j_loc ='".$_POST["selectedlocation2"]."'
          ";
         }
         if(isset($_POST["job_post"]) && $_POST["job_post"][0]!="any")
         {
         
          $n=count($_POST["job_post"]);
          $days=$_POST["job_post"][$n-1];
          $query .="
          AND j.j_postdate >= (DATE(NOW()) - INTERVAL ".$days." DAY)
          ";
         }
         
         if(isset($_POST["sort"]))
         {
             if($_POST["sort"]=="lf"){
                $query .="
                ORDER BY j.j_postdate DESC
               "; 
             }
             if($_POST["sort"]=="dd"){
                $query .="
                ORDER BY j.j_deadline DESC
               "; 
             }
             if($_POST["sort"]=="ms"){
                $query .="
                ORDER BY j.j_maxsalary DESC
               "; 
             }
         }
         if (isset($_POST["pagenum"])){ 
            $pn  = $_POST["pagenum"]; 
            
            } 
            else { 
                $pn=1; 
               
                
            };  
            $start_from = ($pn-1) * $limit; 
         $query .= "LIMIT $start_from,$limit";
        
         try{
             $statement = $conn->prepare($query);
         $statement->execute();
         $result = $statement->fetchAll();
         $total_row = $statement->rowCount();
         $sql2=$conn->prepare("SELECT j_id FROM `job_saved` WHERE s_id=?");
         $sql2->bindParam(1,$_SESSION['sid']);
         $sql2->execute();
         $result2=$sql2->fetchAll();
         $total_row1=$sql2->rowCount();
         $b=array(0);
         for($i=0;$i<$total_row1;$i++){
           array_push($b,$result2[$i]["j_id"]);
           }
         
         
         
         $output = '
          <div class="container">
                                        <!-- Count of Job list Start -->
                                    
         ';
         if($total_row > 0)
         {
          foreach($result as $row)
          {
           if($row["j_cat"]=="DesignandCreative") $jobcat="Design & Creative";
           if($row["j_cat"]=="DesignandDevelopment") $jobcat="Design & Development";
           if($row["j_cat"]=="SalesandMarketing") $jobcat="Sales & Marketing";
           if($row["j_cat"]=="MobileApplication") $jobcat="Mobile Application";
           if($row["j_cat"]=="Construction") $jobcat="Construction";
           if($row["j_cat"]=="InformationTechnology") $jobcat="Information Technology";
           if($row["j_cat"]=="RealEstate") $jobcat="Real Estate";
           if($row["j_cat"]=="ContentWriter") $jobcat="Content Writer";
           $output .= '
        		<div class="single-job-items mb-30">
                                            <div class="job-items">
                                                <div class="company-img">
                                                    <a href="#"><img src="recruiter/uploads/'.$row['r_img'].'" width="85px" height="85px" style="border: 1px solid #1f2b7b; padding:3px;" alt=""></a>
                                                </div>
                                                <div class="job-tittle job-tittle2">
                                                    <a href="#">
                                                        <h4>'.$row["j_title"].'</h4>
                                                    </a>
                                                    <ul>
                                                        <li>'.$jobcat.'</li>
                                                        <li><i class="fas fa-map-marker-alt"></i>'.$row["j_loc"].'</li>
                                                        <li>&#x20B9;'.$row["j_minsalary"].'- &#x20B9;'.$row["j_maxsalary"].'</li>
                                                       
                                                    </ul>
                                                     <span>Post on:'.date("d-m-y",strtotime($row["j_postdate"])).'</span>
                                                </div>
                                            </div>';
                                                
                                        if(isset($_SESSION["seeker"]))
                                        {
                                            try
                                            {
                                                $sql = $conn->prepare("SELECT ja_id FROM job_apply WHERE j_id = ? && s_id = ?");
                                                $sql->bindParam(1, $row["j_id"]);
                                                $sql->bindParam(2, $_SESSION["sid"]);
                                                if($sql->execute())
                                                {
                                                    $num = $sql->rowCount();
                                                    if($num == 1)
                                                    {
                                                        $output.= '<div class="items-link items-link2 f-right">
                                                            <a href="job_details.php?id='.$row["j_id"].'">Applied</a>
                                                           
                                                        </div>
                                                    </div>';
                                                    }
                                                    else
                                                    {
                                                        $output.= '<div class="items-link items-link2 f-right">
                                                            <a href="job_details.php?id='.$row["j_id"].'">Apply</a>';
                                                if(array_search($row["j_id"],$b)){
                                                    $output.='<span id="'.$row["j_id"].'"><button class="bcbtn" data-id="'.$row["j_id"].'" >Bookmarked</button>';
                                               
                                                }else 
                                                {
                                                    $output.='<span id="'.$row["j_id"].'"><button class="bbtn"  data-id="'.$row["j_id"].'" value="">Bookmark</button>';
                                                
                                                }
                                                $output.=' </span>
                                                        </div>
                                                    </div>';    
                                                    }
                                                }
                                            }
                                            catch(PDOEXception $e)
                                            {
                                                echo "exception";
                                            }
                                        }
                                        else
                                        {
                                            $output.= '<div class="items-link items-link2 f-right">
                                                            <a href="job_details.php?id='.$row["j_id"].'">Apply</a>
                                                            <span>post:'.date("d-m-y",strtotime($row["j_postdate"])).'</span>
                                                        </div>
                                                    </div>';    
                                        }
                                            
          }
        }else
            {
            	$output .= '
            		<h3 align="center">No Product Found</h3>
            	';
            }

            $output .= '
            </div>
            ';
            
            echo $output;


         }catch(PDOException $e){
             echo $e->getMessage();
         }
         
}else{
    echo "not hello";
}
?>