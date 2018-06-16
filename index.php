<?php 
ini_set('max_execution_time', 300);
//https://github.com/thephpleague/html-to-markdown
require 'vendor/autoload.php';

use League\HTMLToMarkdown\HtmlConverter;

$converter = new HtmlConverter();
$converter->getConfig()->setOption('strip_tags', true);

//blank the file
file_put_contents('readers/resulting_markdown_file.md', '');

$string100 = '';
if ($handle = opendir(__DIR__.'/readers')) {
	$x = 0;
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != ".." && $entry != "resulting_markdown_file.md" && $entry != "pandoc_ebook.bash") {

        	$file = file_get_contents(__DIR__.'/readers/' . $entry);
        	$markdown = $converter->convert($file);

            $markdown = str_replace('<?xml version="1.0" encoding="utf-8" standalone="yes"?>',"", $markdown);
            $markdown = str_replace('<?xml version="1.0" encoding="utf-8"?>',"", $markdown);
            $markdown = str_replace('<?xml version="1.0" encoding="UTF-8"?>',"", $markdown);
            $markdown = str_replace('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>',"", $markdown);

           	// if($x == 50 ){
           	// 	die();
           	// } 
            $string100 .= '## ' . $entry . "\n\r". $markdown . "\n\r";
        }
        if($x % 10){
            file_put_contents('readers/resulting_markdown_file.md', $string100, FILE_APPEND);
            $string100 = '';
        }
        $x = $x + 1;
    }

    closedir($handle);
}

?>

