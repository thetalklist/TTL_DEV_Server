<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 */
class CI_Paginationadmin {

	var $base_url			= ''; // The page we are linking to
	var $prefix				= ''; // A custom prefix added to the path.
	var $suffix				= ''; // A custom suffix added to the path.

	var $total_rows			=  0; // Total number of items (database results)
	var $per_page			= 10; // Max number of items you want shown per page
	//var $num_links			=  4; // Number of "digit" links to show before/after the currently viewed page
	var $num_links			=  9; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page			=  0; // The current page being viewed
	var $use_page_numbers	= FALSE; // Use page number for segment instead of offset
	//var $first_link			= '&lsaquo; First';
	var $first_link			= '&lt;&lt;';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	//var $last_link			= 'Last &rsaquo;';
	var $last_link			= '&gt;&gt;';
	var $uri_segment		= 3;
	var $full_tag_open		= '';
	var $full_tag_close		= '';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';
	var $first_url			= ''; // Alternative URL for the First Page.
	var $cur_tag_open		= '&nbsp;<strong>';
	var $cur_tag_close		= '</strong>';
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';
	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';
	var $page_query_string	= FALSE;
	var $query_string_segment = 'per_page';
	var $display_pages		= TRUE;
	var $anchor_class		= '';
	var $sort		= '';
	var $sortorder		= 'desc';
	var $sorturl		= '';

	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function __construct($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}

		if ($this->anchor_class != '')
		{
			$this->anchor_class = 'class="'.$this->anchor_class.'" ';
		}

		//log_message('debug', "Pagination Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}
		
		//skvirja override number of pages for first display with 11 and 11 to 20
		$num_pages = $num_pages + 1 - 1;
		// Set the base page index for starting page number
		if ($this->use_page_numbers)
		{
			$base_page = 1;
		}
		else
		{
			$base_page = 0;
		}

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			if ($CI->input->get($this->query_string_segment) != $base_page)
			{
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if ($CI->uri->segment($this->uri_segment) != $base_page)
			{
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		
		// Set current page to 1 if using page numbers instead of offset
		if ($this->use_page_numbers AND $this->cur_page == 0)
		{
			$this->cur_page = $base_page;
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = $base_page;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->use_page_numbers)
		{
			if ($this->cur_page > $num_pages)
			{
				$this->cur_page = $num_pages;
			}
		}
		else
		{
			if ($this->cur_page > $this->total_rows)
			{
				$this->cur_page = ($num_pages - 1) * $this->per_page;
			}
		}
		//echo $this->cur_page;
		$uri_page_number = $this->cur_page;
		
		if ( ! $this->use_page_numbers)
		{
			$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);
		}

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		//$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		//working copy
		//$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links) : 1;
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page + 1: 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;
		//echo $end;
		if($end < 11)
		{
			$end = 10;
		}
		
		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		//echo $this->base_url;exit;
		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}
		
		//create a sort parameter
		$sortorder = $this->urlSegment(6);
		
		if(!$sortorder)
		{
			$sortorder = 'desc';
		}
		$sort = $this->urlSegment(8);
		
		$sorturl = '';
		if($sort)
		{
			$sorturl = '/sortorder/'.$sortorder.'/sort/'.$sort;
		}else{
			$sorturl = '';
		}
		
		// And here we go...
		$output = '';
		$cursorDefaultStyle = 'style="cursor:default;"';
		// Render the "First" link
		//if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		
		if  ($this->first_link !== FALSE AND $this->cur_page <= ($this->num_links + 1) )
		{
			if($this->cur_page == 1)
			{
				$linkStyle = $cursorDefaultStyle;
			}else{
				$linkStyle = '';
			}
			$first_url = ($this->first_url == '') ? $this->base_url.$sorturl : $this->first_url.$sorturl;
			$output .= $this->first_tag_open.'<a  '.$this->anchor_class.'href="'.$first_url.'" '.$linkStyle.'>'.$this->first_link.'</a>'.$this->first_tag_close;
		}
		
		if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		{
			$first_url = ($this->first_url == '') ? $this->base_url.$sorturl : $this->first_url.$sorturl;
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}
		
		// Render the "previous" link
		if  ($this->prev_link !== FALSE )
		{
			if($this->cur_page == 1)
			{
				$linkStyle = $cursorDefaultStyle;
			}else{
				$linkStyle = '';
			}
			
			if ($this->use_page_numbers)
			{
				$i = $uri_page_number - 1;
			}
			else
			{
				$i = $uri_page_number - $this->per_page;
			}
			//skvirja override previous link
			if($this->cur_page >10)
			{
				$i = $uri_page_number - ($this->per_page*10);
			}
			if($i < 0)
			{
				$i = 0;
			}
			if ($i == 0 && $this->first_url != '')
			{
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.$sorturl.'" '.$linkStyle.'>'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
			else
			{
				$i = ($i == 0) ? '0' : $this->prefix.$i.$this->suffix;
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$i.$sorturl.'" '.$linkStyle.'>'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}

		}
		//echo $output;
		// Render the pages
		//echo $this->display_pages;
		$last_pg_index = 0;
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				if ($this->use_page_numbers)
				{
					$i = $loop;
				}
				else
				{
					$i = ($loop * $this->per_page) - $this->per_page;
				}
				//echo $base_page;
				if ($i >= $base_page)
				{
					if ($this->cur_page == $loop)
					{
						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					}
					else
					{
						$n = ($i == $base_page) ? '' : $i;

						if ($n == '' && $this->first_url != '')
						{
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.$sorturl.'">'.$loop.'</a>'.$this->num_tag_close;
						}
						else
						{
							$n = ($n == '') ? '0' : $this->prefix.$n.$this->suffix;
							//echo $n.'<br/>';
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$n.$sorturl.'">'.$loop.'</a>'.$this->num_tag_close;
						}
					}
				}
				//skvirja get last page index
				if($loop == $end)
				{
					$last_pg_index = $i;
				}
			}
		}
		// Render the "next" link
		//echo $num_pages;
		if ($this->next_link !== FALSE)
		{
			if($this->cur_page == $num_pages)
			{
				$linkStyle = $cursorDefaultStyle;
			}else{
				$linkStyle = '';
			}
			
			if ($this->use_page_numbers)
			{
				$i = $this->cur_page + 1;
			}
			else
			{
				$i = ($this->cur_page * $this->per_page);
			}
			//skvirja override existing settings for each 10 page display
			//$i = $last_pg_index + ($this->per_page * 6);
			$i = $last_pg_index + ($this->per_page * 1);
			/*if(($num_pages - ($i/$this->per_page))<0)
			{
				$i = ($this->cur_page * $this->per_page);
				
			}*/
			if(($last_pg_index/$this->per_page)+1 == $num_pages)
			{
				$i = ($this->cur_page * $this->per_page);
				//$linkStyle = $cursorDefaultStyle;
			}
			
			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.$sorturl.'" '.$linkStyle.'>'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) >= $num_pages)
		{
			if($this->cur_page == $num_pages)
			{
				$linkStyle = $cursorDefaultStyle;
			}else{
				$linkStyle = '';
			}
			
			if ($this->use_page_numbers)
			{
				$i = $num_pages;
			}
			else
			{
				$i = (($num_pages * $this->per_page) - $this->per_page);
			}
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.$sorturl.'" '.$linkStyle.'>'.$this->last_link.'</a>'.$this->last_tag_close;
		}
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
		{
			if ($this->use_page_numbers)
			{
				$i = $num_pages;
			}
			else
			{
				$i = (($num_pages * $this->per_page) - $this->per_page);
			}
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.$sorturl.'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}
	function urlSegment($i = NULL) {
		static $uri;
		if ( NULL === $uri )
		{
			$uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
			$uri = explode( '/', $uri );
			$uri = array_filter( $uri );
			$uri = array_values( $uri );
		}
		if ( NULL === $i )
		{
			return '/' . implode( '/', $uri );
		}
		$i =  ( int ) $i - 1;
		$uri = str_replace('%20', ' ', $uri);
		return isset( $uri[$i] ) ? $uri[$i] : NULL;
	}
}
// END Pagination Class

/* End of file Pagination.php */
/* Location: ./system/libraries/Pagination.php */