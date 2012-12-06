<div class="content" style="width:80%;">
	Hi, <strong><?php echo $username; ?></strong>! You are logged in now.


	
<h3>Tennis News</h3>

<?
		
	$feedUrl = 'http://feeds.feedburner.com/Tennis-AtpWorldTourHeadlineNews?format=xml'; 
	$rawFeed = file_get_contents($feedUrl); 
	$xml = new SimpleXmlElement($rawFeed);
	
	$channel['title'] = $xml->channel->title;
	$channel['link']  = $xml->channel->link;


	foreach ($xml->channel->item as $item) 
	{     

	    $article = array();
	    $article['title'] = $item->title;
	    $article['link'] = $item->link; 
	    $article['pubDate'] = $item->pubDate; 
	    $article['description'] = $item->description; 
	    ?>
	    <div class="well well-small">
	    	<legend><a target="_blank" href="<?=$item->link?>"><?=$item->title?></a></legend>
	    	<div><?=$item->description?></div>

	    </div>
	    <?

	}	



?>
</div> 