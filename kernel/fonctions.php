<?php
$parentDirectory = getRootDirectory();

// The 'tarifs' page (A very special page, indeed!)
define("TARIFS_PAGE", 'tarifs');

// Check if the gallery exists
if (isset($_GET['name']))
{
	if (!in_array($_GET['name'], getChildrenDirectoriesIn('images')))
		header("Location: /404");
}

function getRootDirectory()
{
	$parent = explode('kernel', dirname(__FILE__));
	return $parent[0];
}

function getChildrenDirectoriesIn($directory)
{
	global $parentDirectory;

	$array = array();

	foreach (new DirectoryIterator($parentDirectory.'/'.$directory) as $fileInfo) 
	{
	    if ($fileInfo->isDot())
	    	continue;
	    elseif ($fileInfo->isDir())
	    	$array[] = $fileInfo->getFilename();
	}

	// Let's sort the array ("natural ordering")
	natsort($array);

	return $array;
}

function getFilesInDirectory ($directory)
{
	global $parentDirectory;

	$array = array();

	foreach (new DirectoryIterator($parentDirectory.'/'.$directory) as $fileInfo) 
	{
	    if ($fileInfo->isDot() OR $fileInfo->isDir() OR $fileInfo->getFilename() == '.DS_Store')
	    	continue;
	    elseif ($fileInfo->isFile())
	    	$array[] = $fileInfo->getFilename();
	}

	// Let's sort the array ("natural ordering")
	natsort($array);

	return $array;	
}

function displayMenu()
{
	$array = array();
	$array = getChildrenDirectoriesIn('images');

	foreach ($array as $link)
	{
		// We don't want to display the 'tarifs' page
		if ($link != TARIFS_PAGE)
		{
			if (preg_match("#_#", $link))
				$name = str_replace("_", " ", $link);
			else
				$name = $link;
		
			echo '<li><a href="/gallery/'.$link.'" onClick="_gaq.push([\'_trackEvent\', \'Gallerie\', \'clic\', \''.$name.'\']);">'.$name.'</a></li>';
		}
	}
}

function displayPageTitle()
{
	$default = "Lia's Images";

	if (empty($_GET['name']) AND !preg_match("#404|index#", $_SERVER['PHP_SELF']))
	{
		$name_page = substr($_SERVER['PHP_SELF'], 1, -4);

		switch ($name_page) 
		{
			case 'legal':
				$name_page = 'Mentions légales';
				break;
			
			case TARIFS_PAGE:
				$name_page = 'Tarifs';
				break;
		}

		echo ucfirst($name_page).' | '.$default;
	}
	elseif (!empty($_GET['name']))
	{
		if (!preg_match("#_#", $_GET['name']))
			$title = $_GET['name'];
		else
			$title = str_replace("_", " ", $_GET['name']);

		echo ucfirst($title).' | '.$default;
	}
	elseif (preg_match("#404#", $_SERVER['PHP_SELF']))
		echo '404 | '.$default;
	else
		echo $default;

}

function displayGallery($forceName=null)
{
	global $parentDirectory;

	// By default, based on $_GET['name'], unless we want to use a custom name
	if (is_null($forceName))
		$name = $_GET['name'];
	elseif (!empty($forceName))
		$name = $forceName;

	$array_images = getFilesInDirectory('images/'.$name);

	foreach ($array_images as $image)
	{
		list ($width, $height, $type, $attr) = getimagesize($parentDirectory.'/images/'.$name.'/'.$image);

		$ratio = $height / 750;
		$width = floor($width / $ratio);

		echo '<li><span style="background-image:url(/images/'.$name.'/'.$image.');width:'.$width.'px"></span></li>';
	}
}