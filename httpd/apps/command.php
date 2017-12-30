<!-- 
 deltaBox - Algorithmic Non-Intrusive Load Monitoring
 
 Copyright (c) 2008-2009 Mikael Mieskolainen.
 Licensed under the MIT License <http:opensource.org/licenses/MIT>.
 
 Permission is hereby  granted, free of charge, to any  person obtaining a copy
 of this software and associated  documentation files (the "Software"), to deal
 in the Software  without restriction, including without  limitation the rights
 to  use, copy,  modify, merge,  publish, distribute,  sublicense, and/or  sell
 copies  of  the Software,  and  to  permit persons  to  whom  the Software  is
 furnished to do so, subject to the following conditions:
 
 The above copyright notice and this permission notice shall be included in all
 copies or substantial portions of the Software.
 
 THE SOFTWARE  IS PROVIDED "AS  IS", WITHOUT WARRANTY  OF ANY KIND,  EXPRESS OR
 IMPLIED,  INCLUDING BUT  NOT  LIMITED TO  THE  WARRANTIES OF  MERCHANTABILITY,
 FITNESS FOR  A PARTICULAR PURPOSE AND  NONINFRINGEMENT. IN NO EVENT  SHALL THE
 AUTHORS  OR COPYRIGHT  HOLDERS  BE  LIABLE FOR  ANY  CLAIM,  DAMAGES OR  OTHER
 LIABILITY, WHETHER IN AN ACTION OF  CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE  OR THE USE OR OTHER DEALINGS IN THE
 SOFTWARE.
-->

<?php
	//haetaan luokat
	require_once("/disk/home/classes/MAIN.class.php");

	$command = $_GET['com'];
	
	if ($command == "get_log") {
			
		$logitiedosto = $_GET['log_type'];
		
		$clear = $_GET['clear'];
		
		if ($clear == "true") { //tyhjennetään tiedosto, jos clear==yes
			
			if ($fp = @fopen ("/tmp/$logitiedosto", 'w' ) ) {
				fclose ( $fp );
			}
			
		}	
		
		if ( $tiedosto = @file("/tmp/$logitiedosto") ) { //luetaan tiedosto taulukkoon
		
			echo "<textarea name='textarea' id='log_area' cols='100' rows='28'>";
			
			//tulostetaan tiedosto taulukon rivit
			for ($i = 0; $i < count($tiedosto); ++$i) {				
				echo  $tiedosto[$i];				
			}
			
			echo "</textarea>";
		
		} else {
			echo "<p>Empty log file!</p>";
		}
  		
	}
	
	else if ($command == "get_sensors") {
	
		//luodaan asetusoliot
		$jsObj = new Live();
		
		// Onewire
		$jsObj->printOwData();
	}
	
	else if ($command == "garage_push_output") {
		
		$io1tila=exec("gpioctl -i 1");
		$nyt = date("H:i:s");
		
		echo "Command sent: ".$nyt." ";
		
	    if ($io1tila == "GPIO1 -> State:Low, Mode:Output") {
		    exec("gpioctl -i 1 -s 1");
		    
		    sleep(2);
		    exec("gpioctl -i 1 -s 0");
	    }
	
		$IP=getenv("REMOTE_ADDR");
		$logged_string = "$IP | " . "Garage    | ". date("d.m.y H:i:s");
		$file = fopen("/tmp/door_control.log", "a");
		fputs($file, $logged_string, strlen($logged_string));
		fputs($file, "\r\n");
		fclose($file);
	  		
	}
	
	else if ($command == "garage_input") {
		
		$tila=exec("gpioctl -i 16");
		
	    if ($tila == "GPI16 -> State:Low, Mode:Input") {
		    
			echo "<p></p>";    
		    echo "Garage Door Closed";
	
	    } else {
		    
			echo "<p></p>";    
		    echo "Garage Door Open!";
	
	    }
  		
	}
	
	else if ($command == "front_push_output") {
		
		$tila=exec("gpioctl -i 0");
		
	    if ($tila == "GPIO0 -> State:Low, Mode:Output") {
	    
		    exec("gpioctl -i 0 -s 1");
	    	$komento="F. Unlock";
	    
	    } else {
		    exec("gpioctl -i 0 -s 0");
		    $komento="F. Lock  ";
	    }
	    
		$nyt = date("H:i:s");
		
		echo "Command sent: ".$nyt." ";
		
		$IP=getenv("REMOTE_ADDR");
		$logged_string = "$IP | " . "$komento | ". date("d.m.y H:i:s");
		$file = fopen("/tmp/door_control.log", "a");
		fputs($file, $logged_string, strlen($logged_string));
		fputs($file, "\r\n");
		fclose($file);
  		
	}
	
	else if ($command == "front_io") {
		
		$tila = exec("gpioctl -i 0");
		
	    if ($tila == "GPIO0 -> State:Low, Mode:Output") {
		    
	    	echo "<p></p>";
	    	echo "Locked (Web Control)<br/>";
	
	    } else {
		    
	    	echo "<p></p>";
	    	echo "Unlocked! (Web Control)<br/>";
	
	    }
	    
	    $tila = exec("gpioctl -i 15");
		
	    if ($tila == "GPIO15 -> State:Low, Mode:Input") {
			
		    echo "<p></p>";    
		    echo "Unlocked! (Relay circuit)";
	
	    } else {
		    
			echo "<p></p>";    
		    echo "Locked (Relay circuit)";
	
	    }
		
	}
	
	else if ($command == "ow_data") {
			
		//haetaan luokat
		require_once("/home/classes/SETTINGS.class.php");

		//luodaan asetusolio
		$owObj = new OW();
		
		//printataan OW-taulukot
		$owObj->printData();
  		
	}

	else if ($command == "uptime") {
		
	  	$result = exec ("uptime");
  		echo $result;
  		
	}
	
	else if ($command == "sidebar") {
		
		//luodaan olio
		$nialmObj = new NIALM();
		$nialmObj->printNialm(10);
		
	}		
	
	else if ($command == "css_bar") {
		
		$deviceId = $_GET['deviceId'];
		$liveObj = new LIVE();
		$liveObj->printCssBar($deviceId);
		
	}
	
	else if ($command == "cpu") {
		
	  	$result = exec ("cpu");
  		echo $result;
  		
	}	
	
	else if ($command == "reboot") {
		
		session_destroy();
		
		//käynnistetään kone
		exec ("reboot");
		
	}


?>