<?php

/**
 *
 * Class A5 Excerpt
 *
 * @ A5 Plugin Framework
 * Version: 1.0 beta 20150316
 *
 * Gets the excerpt of a post according to some parameters
 *
 * standard parameters: offset(=0), usertext, excerpt, count
 * additional parameters: class(classname), filter(boolean), shortcode(boolean), format(boolean), links(boolean),
 * readmore_link(boolean), readmore_text(string)
 *
 */

class A5_Excerpt {
	
	public static function text($args) {
		
		extract($args);
		
		$offset = (isset($offset)) ? $offset : 0;
		
		$class = (!empty($class)) ? ' class ="'.$class.'"' : '';
		
		$filter = (isset($filter)) ? $filter : false;
		
		$shortcode = (isset($shortcode)) ? $shortcode : false;
		
		$format = (isset($format)) ? $format : false;
		
		$links = (isset($links)) ? $links : false;
		
		if (!empty($usertext)) :
		
			$output = $usertext;
		
		else: 
		
			if (!empty($excerpt)) :
			
				$output = $excerpt;
				
			else :
			
				$excerpt_base = (!empty($shortcode)) ? preg_replace('/(\[caption.*?caption\])/i', '', $content) : strip_shortcodes($content);
			
				$text = (empty($format)) ? strip_tags(trim(preg_replace('/\s\s+/', ' ', str_replace(array("\r\n", "\n", "\r", "&nbsp;"), ' ', $excerpt_base)))) : preg_replace('#(<a.*?><img.*?></a>)|(<img.*?>)#i', '', $excerpt_base);
				
				if (!$links) $text = preg_replace('#(<a.*?>)|(</a>)#i', '', $text);
				
				//erase videos
				
				$text = preg_replace('/[^"](https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$][^"]/i', '', $text);
				
				$length = (isset($count)) ? $count : 3;
				
				$style = (isset($type)) ? $type : 'sentences';
				
				switch ($style) :
				
					case 'words' :
						
						$short = array_slice(explode(' ', $text), $offset, $length);
						
						$output = trim(implode(' ', $short));
						
						break;
					
					case 'sentences' :
						
						$short = array_slice(preg_split("/([\t.!?:]+)/", $text, -1, PREG_SPLIT_DELIM_CAPTURE), $offset*2, $length*2);
						
						$output = trim(implode($short));
							
						break;
						
					case 'letters' :
							
						$output = substr($text, $offset, $length);
							
						break;
						
					default :
					
						$output = $text;
					
				endswitch;
				
			endif;
			
		endif;
		
		if (!empty($linespace)) :
		
			$short=preg_split("/([\t.!?:]+)/", $output, -1, PREG_SPLIT_DELIM_CAPTURE);
			
			$short[count($short)] = '';
			
			foreach ($short as $key => $pieces) :
			
				if (!($key % 2) && $key < (count($short)-1)) :
				
					$tmpex[] = implode(array($short[$key], $short[$key+1]));
					
				endif;
			
			endforeach;
			
			if (isset($tmpex)) $output = trim(implode('<br /><br />', $tmpex));
		
		endif;
		
		if (!empty($readmore)) $output.=' <a href="'.$link.'" title="'.$title.'"'.$class.'>'.$rmtext.'</a>';
		
		$output = ($filter === true) ? apply_filters('the_excerpt', $output) : $output;
		
		return $output;
	
	}
	
} // A5_Excerpt

?>