<?php

$parentDirectory = getRootDirectory();

// Check if the gallery exists
if (isset($_GET['name']))
{
	if (!in_array($_GET['name'], getChildrenDirectoriesIn('images')))
	{
		header("Location: /404");
	}
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
	    {
	    	continue;
	    }
	    elseif ($fileInfo->isDir())
	    {
	    	$array[] = $fileInfo->getFilename();
	    }
	}

	// Let's sort the array
	natsort($array);

	return $array;
}

function getFilesInDirectory ($directory)
{
	global $parentDirectory;

	$array = array();

	foreach (new DirectoryIterator($parentDirectory.'/'.$directory) as $fileInfo) 
	{
	    if ($fileInfo->isDot() OR $fileInfo->isDir())
	    {
	    	continue;
	    }
	    elseif ($fileInfo->isFile())
	    {
	    	$array[] = $fileInfo->getFilename();
	    }
	}

	// Let's sort the array
	natsort($array);

	return $array;	
}

function displayMenu()
{
	$array = array();
	$array = getChildrenDirectoriesIn('images');

	foreach ($array as $link)
	{
		if (preg_match("#_#", $link))
		{
			$name = str_replace("_", " ", $link);
		}
		else
		{
			$name = $link;
		}

		echo '<li><a href="/gallery/'.$link.'" onClick="_gaq.push([\'_trackEvent\', \'Gallerie\', \'clic\', \''.$name.'\']);">'.$name.'</a></li>';
	}
}

function displayPageTitle()
{
	$default = "Lia's Images";

	if (empty($_GET['name']) AND !preg_match("#404|index#", $_SERVER['PHP_SELF']))
	{
		$name_page = substr($_SERVER['PHP_SELF'], 1, -4);

		if ($name_page == 'legal')
		{
			$name_page = 'Mentions légales';
		}

		echo ucfirst($name_page).' | '.$default;
	}
	elseif (!empty($_GET['name']))
	{
		if (!preg_match("#_#", $_GET['name']))
		{
			$title = $_GET['name'];
		}
		else
		{
			$title = str_replace("_", " ", $_GET['name']);
		}

		echo ucfirst($title).' | '.$default;
	}
	elseif (preg_match("#404#", $_SERVER['PHP_SELF']))
	{
		echo '404 | '.$default;
	}
	else
	{
		echo $default;
	}

}

function displayGallery()
{
	global $parentDirectory;

	$array_images = getFilesInDirectory('images/'.$_GET['name']);

	$name = $_GET['name'];

	foreach ($array_images as $image)
	{
		list ($width, $height, $type, $attr) = getimagesize($parentDirectory.'/images/'.$_GET['name'].'/'.$image);

		$ratio = $height / 750;
		$width = floor($width / $ratio);

		echo '<li><span style="background-image:url(/images/'.$name.'/'.$image.');width:'.$width.'px"></span></li>';
	}
}