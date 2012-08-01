<?php

/* ***************************************************************
// LinnLive
// Copyright (c) 2012 John Mitchell - http://www.minioak.com
// 
// Version: 1.0.0 (1/8/2012)
// 
// Dual licensed under the MIT and GPL licenses:
// http://www.opensource.org/licenses/mit-license.php
// http://www.gnu.org/licenses/gpl.html
// ***************************************************************/

public class LinnLive 
{
	protected $settings = array();
		
	protected function default_settings()
	{
		return array(
			'api_key' = ''
		);
	}

	public function __construct($settings = false)
	{
		parent::_construct();
		if (is_array($settings))
		{
			$this->initialize($settings);
		}
	}
		
	public function initialize($settings)
    {
	    foreach ($this->default_settings() as $key => $default)
	    {
            if (isset($settings[$key]))
            {
                // boolean settings must remain booleans
                $this->settings[$key] = is_bool($default) ? (bool)$settings[$key] : $settings[$key];
            }
	    }
    }
}
