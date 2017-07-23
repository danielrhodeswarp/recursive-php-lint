<?php

$directory = new RecursiveDirectoryIterator(realpath('.'));
$iterator = new RecursiveIteratorIterator($directory);
//$phpMatches = new RegexIterator($iterator, '/^.+[.]php$/i', RecursiveRegexIterator::GET_MATCH);

$totalErrors = 0;

foreach($iterator as $name => $object)
{
	
	if($object->getExtension() != 'php')
	{
		continue;
	}

	
	$output = [];
    exec("php -l {$name}", $output, $return);

    if($return !== 0)
    {
    	echo implode(PHP_EOL, $output) . PHP_EOL;
    	echo "--------------------" . PHP_EOL;
    	$totalErrors++;
    }

    
    
}

echo "{$totalErrors} files have lint errors" . PHP_EOL;