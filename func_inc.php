<?php
function arrayFromHtml($fn)
{
	$file = file_get_contents($fn);
	$file = explode('</TR>', $file);
	array_pop($file);
	return $file;
}

function checkField($item, $marker, $field) //Функция проверки полей на наличие нужных маркеров
{
	foreach($item as $r)
	{
		global $field ;
		$pos = strpos($r, "$marker");
		if ($pos === 0)
		{
			$field = substr_replace($r, '', 0, 7);
			break;
		}
		else
		{
			$field = '&nbsp;';
		}
	}
	return $field;
}

function checkFieldPeriod($item, $marker, $field) //Функция проверки полей на наличие нужных маркеров
{
	foreach($item as $r)
	{
		global $field ;
		$pos = strpos($r, "$marker");
		if ($pos === 0)
		{
			$field = substr_replace($r, '', 0, 1);
			break;
		}
		else
		{
			$field = '&nbsp;';
		}
	}
	return $field;
}

function checkFieldBook($item, $marker, $field) //Функция проверки полей на наличие нужных маркеров
{
	foreach($item as $r)
	{
		global $fn ;
		$pos = strpos($r, "$marker");
		if ($pos === 0)
		{
			if($field == 'pubyear')
			{
				$r = explode('&#31;c', $r);
				$fn= $r[1];
				break;
			}
			elseif($field == 'publisher')
			{
				$r = explode('&#31;c', $r);
				$fn = substr_replace($r[0], '', 0, 7);
				break;
			}
			else
			{
				$fn = substr_replace($r, '', 0, 7);
				break;
			}	
		}
		else
		{
			$fn = '&nbsp;';
		}
	}
	return $fn;
}

?>