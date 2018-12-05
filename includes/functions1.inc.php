<?php
	function tagExists($tag, $tag_arr)
	{
		$bool = false;
		foreach ($tag_arr as $val)
		{
			if ($val == $tag)
			{
				$bool = TRUE;
			}
		}
		return ($bool);
	}