<?php
$servername = "localhost";
$username = "gif";
$password = "Scbwd2blah123";
$database = "porngifs";
$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT COUNT(*) from pics";
$res = mysqli_query($conn,$sql);
$total_rows = mysqli_fetch_array($res)[0];

$host= 'ftpupload.net';
$user = 'epiz_27158838';
$password = 'DcCMcJwUrB';
$ftpConn = ftp_connect($host);
$login = ftp_login($ftpConn,$user,$password);

include_once('simple_html_dom.php');
$html = file_get_html("https://www.pornpics.com/recent/");

$counter = $total_rows + 1;
$counter2 = 1;
foreach($html->find('.lazy-load') as $x){
    file_put_contents($counter.".jpg",file_get_contents($x->getAttribute("data-src")));
    ftp_put($ftpConn, "/htdocs/pics/".$counter.".jpg", $counter.".jpg", FTP_ASCII);
    unlink($counter.".jpg");
    $counter++;
    $counter2++;
}
ftp_close($ftpConn);

$counter3 = 0;
for ($x = 1 ; $x <= $counter2 ; $x++){
    
    $sql_statement = "INSERT INTO pics (title,description) VALUES('".$title."','".$title."')";
    mysqli_query($conn,$sql_statement);
}


$conn->close();

?>