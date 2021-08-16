<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div class="bx-breadcrumb" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = '/';

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .=  '
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a class="bx-breadcrumb-item-link" href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					<span class="bx-breadcrumb-item-text" itemprop="name">'.$title.' /&nbsp;</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';
	}
	else
	{	
		$class = ($index == ($itemSize-1)) ? 'red-del' : 'gray-del';
		$delim = ($index !== ($itemSize-1)) ? ' /' : '';
		$strReturn .= '
			<div class="bx-breadcrumb-item">
				<span class="bx-breadcrumb-item-text ' . $class . '">'.$title. $delim . '<span style="margin:0px 2px;"></span></span>
			</div>';
	}
}

$strReturn .= '</div>';

return $strReturn;
