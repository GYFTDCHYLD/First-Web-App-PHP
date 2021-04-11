<?php
session_name('QUICK_CAB_DRIVER');
session_start();

if ( 
	 (isset($_SESSION['first_name']))
      && (isset($_SESSION['last_name']))
        &&(isset($_SESSION['UZR-ID']))
         && (isset($_SESSION['UZR-PS']))
	//	 &&  (($_SESSION['agent']) === SHA1($_SERVER ['HTTP_USER_AGENT']) ) // citreo browser not supported as yet 
		  )
	 
{
   ($_POST['name'] = $_SESSION['UZR-ID']);
  
 }
 else { // No valid ID, kill the script.
 setcookie (session_name(QUICK_CAB_DRIVER), '', time()-3600, '/'); //delete the session
 $url =  '../login'; // Define the URL.
			ob_end_clean(); // Delete the buffer.
			header("Location: $url");
			exit(); // Quit the script.
 
 exit( );
 }



function createForm(){
?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table align="center">
          <tr><td><u>Login name</u>: </td>
          <td><i><?php
	if (isset($_POST['name']))
	{
	print htmlspecialchars($_POST['name']); 
	} ?> </i></td></tr>
          <tr><td colspan="2" align="center">
             <input class="text" type="submit" name="submitBtn" value="Login" />
          </td></tr>
        </table>
      </form>
<?php
}

if (isset($_GET['u'])){
   unset($_SESSION['nickname']);
}

// Process login info
if (isset($_POST['submitBtn'])){
      $name    = $_SESSION['UZR-ID'] ? $_POST['name'] : "Unnamed";
      $_SESSION['nickname'] = $name;
}

$nickname = isset($_SESSION['UZR-ID']) ? $_SESSION['UZR-ID'] : "Hidden";  
echo "</p></div><a href='../quickcab_request_reciever' id='chat_icon'><button>Reciever</button></a>";	 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Anblascar</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
   <link href="style/style.css" rel="stylesheet" type="text/css" />
    <script language="javascript" type="text/javascript">
    <!--
      var httpObject = null;
      var link = "";
      var timerID = 0;
      var nickName = "<?php echo $nickname; ?>";

      // Get the HTTP Object
      function getHTTPObject(){
         if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
         else if (window.XMLHttpRequest) return new XMLHttpRequest();
         else {
            alert("Your browser does not support AJAX.");
            return null;
         }
      }   

      // Change the value of the outputText field
      function setOutput(){
         if(httpObject.readyState == 4){
            var response = httpObject.responseText;
            var objDiv = document.getElementById("result");
            objDiv.innerHTML += response;
            objDiv.scrollTop = objDiv.scrollHeight;
            var inpObj = document.getElementById("msg");
            inpObj.value = "";
            inpObj.focus();
         }
      }

      // Change the value of the outputText field
      function setAll(){
         if(httpObject.readyState == 4){
            var response = httpObject.responseText;
            var objDiv = document.getElementById("result");
            objDiv.innerHTML = response;
            objDiv.scrollTop = objDiv.scrollHeight;
         }
      }

      // Implement business logic    
      function doWork(){    
         httpObject = getHTTPObject();
         if (httpObject != null) {
            link = "message.php?nick="+nickName+"&msg="+document.getElementById('msg').value;
            httpObject.open("GET", link , true);
            httpObject.onreadystatechange = setOutput;
            httpObject.send(null);
         }
      }

      // Implement business logic    
      function doReload(){    
         httpObject = getHTTPObject();
         var randomnumber=Math.floor(Math.random()*10000);
         if (httpObject != null) {
            link = "message.php?all=1&rnd="+randomnumber;
            httpObject.open("GET", link , true);
            httpObject.onreadystatechange = setAll;
            httpObject.send(null);
         }
      }

      function UpdateTimer() {
         doReload();   
         timerID = setTimeout("UpdateTimer()", 5000);
      }
    
    
      function keypressed(e){
         if(e.keyCode=='13'){
            doWork();
         }
      }
    //-->
    </script>   
</head>
<body onload="UpdateTimer();">
    <div id="main">
      <div id="caption">ANBLASCAR</div>
      <div id="icon">&nbsp;</div>
<?php 

if (isset($_SESSION['UZR-ID']) ){ 
      $name    = ($_SESSION['UZR-ID']) ? $_POST['name'] : "Unnamed";
      $_SESSION['nickname'] = $name;
    ?>
      
     <div id="result">
     <?php 
        $data = file("msg.html");
        foreach ($data as $line) {
        	echo $line;
        }
     ?>
      </div>
      <div id="sender" onkeyup="keypressed(event);">
         Your message: <input required type="text" name="msg" size="30" id="msg" />
         <button onclick="doWork();">Send</button>
      </div>   
<?php            
    }

?>
    </div>
</body>   