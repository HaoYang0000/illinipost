@extends('index')
@section('body')

<?php
include(app_path().'/includes/libs/PHPCrawler.class.php');
set_time_limit(10000); 

class MyCrawler extends PHPCrawler 
{ 
  
  function handleDocumentInfo(PHPCrawlerDocumentInfo $p) 
  { 
    // Your code comes here! 
    // Do something with the $PageInfo-object that 
    // contains all information about the currently  
    // received document. 
    // if (PHP_SAPI == "cli") $lb = "\n"; 
    // else $lb = "<br />"; 

    // // As example we just print out the URL of the document 
    // echo "URL: ".$PageInfo->url."<br />";

    // // Print the http-status-code
    // echo "HTTP-statuscode: ".$PageInfo->http_status_code."<br />";

    // // Print the number of found links in this document
    // echo "Links found: ".count($PageInfo->links_found_url_descriptors)."<br />";
    // Just detect linebreak for output ("\n" in CLI-mode, otherwise "<br>"). 
    // if (PHP_SAPI == "cli") $lb = "\n"; 
    // else $lb = "<br />"; 

    // // Print the URL and the HTTP-status-Code 
    // echo "Page requested: ".$PageInfo->url." (".$PageInfo->http_status_code.")".$lb; 
     
    // // Print the refering URL 
    // echo "Referer-page: ".$PageInfo->referer_url.$lb; 

    // echo "Page content teessst  ".$PageInfo->content;
     
    // // Print if the content of the document was be recieved or not 
    // if ($PageInfo->received == true) 
    //   echo "Content received: ".$PageInfo->bytes_received." bytes".$lb; 
    // else 
    //   echo "Content not received".$lb;  
     
    // // Now you should do something with the content of the actual 
    // // received page or file ($DocInfo->source), we skip it in this example  
     
    // echo $lb; 
     
    // flush(); 

    $pageurl= $p->url;
	  $status = $p->http_status_code;
	  $source = $p->source;
	  if($status==200 && $source!=""){
	   $html = str_get_html($source );
		 if(is_object($html)){
		  $t = $html->find("title", 0);
		  if($t){
		   $title = $t->innertext;
		  }
		  echo $title." - ".$pageurl."<br/>";
		  $html->clear(); 
		  unset($html);
		 }
	   echo $pageurl."<br/>";
	   flush();
	  }

  } 
} 

$crawler = new MyCrawler(); 
$crawler->setURL("https://www.reddit.com"); 

// Only receive content of files with content-type "text/html" 
$crawler->addContentTypeReceiveRule("#text/html#"); 

// Ignore links to pictures, dont even request pictures 
$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i"); 

// Store and send cookie-data like a browser does 
$crawler->enableCookieHandling(true); 

// Set the traffic-limit to 1 MB (in bytes, 
// for testing we dont want to "suck" the whole site) 
$crawler->setTrafficLimit(1000 * 1024); 

// Thats enough, now here we go 
$crawler->go(); 



// At the end, after the process is finished, we print a short 
// report (see method getProcessReport() for more information) 
$report = $crawler->getProcessReport(); 

if (PHP_SAPI == "cli") $lb = "\n"; 
else $lb = "<br />"; 
     
echo "Summary:".$lb; 
echo "Links followed: ".$report->links_followed.$lb; 
echo "Documents received: ".$report->files_received.$lb; 
echo "Bytes received: ".$report->bytes_received." bytes".$lb; 
echo "Process runtime: ".$report->process_runtime." sec".$lb;
// ... 


?>
@endSection