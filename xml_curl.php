


<?php 

	$url = "https://www.ntvbd.com/bangladesh";
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$html = curl_exec($ch);
	curl_close($ch);

	$dom = new DOMDocument();
	@$dom->loadHTML($html);


	$finder = new DomXPath($dom);
	$classname="full-height";
	$s1 = 1;
	$videos = $finder->query("//*[contains(@class, '$classname')]");

	foreach($videos as $e)
	{

		foreach ($e->getElementsByTagName('h4') as $tag) 
		{
			
			if ($tag->getElementsByTagName('a')[0]->nodeValue != "") 
			{
				
				foreach ($e->getElementsByTagName('div') as $value) 
				{
					if ($value->getAttribute("class") == "card-image relative") 
					{
						//for link
						foreach($value->getElementsByTagName('a') as $link)
						{
							# Show the <a href>
					        echo $link->getAttribute('href');
					        echo "<br />";
					        
						}

						//for image source
						foreach($value->getElementsByTagName('img') as $link)
						{
							# Show the <a href>
					        echo $link->getAttribute('data-srcset');
					        echo "<br />";
					        
						}

					}
					
				}


				//for title
				foreach($e->getElementsByTagName('h4') as $tag)
				{
			        echo $tag->getElementsByTagName('a')[0]->nodeValue;
			        echo "<br />";
				}

		        echo "<br />";
		        echo "<br />";
	    	}
	    }

	}


?>
