<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$arCloudParams = array(
	"SEARCH" => $arResult["REQUEST"]["~QUERY"],
	"TAGS" => $arResult["REQUEST"]["~TAGS"],
	"CHECK_DATES" => $arParams["CHECK_DATES"],
	"arrFILTER" => $arParams["arrFILTER"],
	"SORT" => $arParams["TAGS_SORT"],
	"PAGE_ELEMENTS" => $arParams["TAGS_PAGE_ELEMENTS"],
	"PERIOD" => $arParams["TAGS_PERIOD"],
	"URL_SEARCH" => $arParams["TAGS_URL_SEARCH"],
	"TAGS_INHERIT" => $arParams["TAGS_INHERIT"],
	"FONT_MAX" => $arParams["FONT_MAX"],
	"FONT_MIN" => $arParams["FONT_MIN"],
	"COLOR_NEW" => $arParams["COLOR_NEW"],
	"COLOR_OLD" => $arParams["COLOR_OLD"],
	"PERIOD_NEW_TAGS" => $arParams["PERIOD_NEW_TAGS"],
	"SHOW_CHAIN" => $arParams["SHOW_CHAIN"],
	"COLOR_TYPE" => $arParams["COLOR_TYPE"],
	"WIDTH" => $arParams["WIDTH"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"RESTART" => $arParams["RESTART"],
);

if(is_array($arCloudParams["arrFILTER"]))
{
	foreach($arCloudParams["arrFILTER"] as $strFILTER)
	{
		if($strFILTER=="main")
		{
			$arCloudParams["arrFILTER_main"] = $arParams["arrFILTER_main"];
		}
		elseif($strFILTER=="forum" && IsModuleInstalled("forum"))
		{
			$arCloudParams["arrFILTER_forum"] = $arParams["arrFILTER_forum"];
		}
		elseif(mb_strpos($strFILTER, "iblock_") === 0)
		{
			if (isset($arParams["arrFILTER_".$strFILTER]) && is_array($arParams["arrFILTER_".$strFILTER]))
			{
				foreach($arParams["arrFILTER_".$strFILTER] as $strIBlock)
					$arCloudParams["arrFILTER_".$strFILTER] = $arParams["arrFILTER_".$strFILTER];
			}
		}
		elseif($strFILTER=="blog")
		{
			$arCloudParams["arrFILTER_blog"] = $arParams["arrFILTER_blog"];
		}
		elseif($strFILTER=="socialnetwork")
		{
			$arCloudParams["arrFILTER_socialnetwork"] = $arParams["arrFILTER_socialnetwork"];
		}
	}
}

$APPLICATION->IncludeComponent("bitrix:search.tags.cloud", ".default", $arCloudParams, $component);

$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"ast", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1",
		"COMPONENT_TEMPLATE" => "ast"
	),
	false
);


?><br />


<div class="">
	<div class="">
		<div class="">
		<div class="search-page">

		<div style="margin-top:20px">Найдено: <b><?= count($arResult["SEARCH"]);?></b></div>
		<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
			?>
			<div class="search-language-guess">
				<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
			</div><br /><?
		endif;?>

		<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
		<?elseif($arResult["ERROR_CODE"]!=0):?>
			<p><?=GetMessage("SEARCH_ERROR")?></p>
			<?ShowError($arResult["ERROR_TEXT"]);?>
			<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
			<br /><br />
			<p><?=GetMessage("SEARCH_SINTAX")?><br /><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
			<table border="0" cellpadding="5">
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
					<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
					<td><?=GetMessage("SEARCH_AND_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
					<td><?=GetMessage("SEARCH_OR_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
					<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top">( )</td>
					<td valign="top">&nbsp;</td>
					<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
				</tr>
			</table>
		<?elseif(count($arResult["SEARCH"])>0):?>
			<?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
			<br />
			<?foreach($arResult["SEARCH"] as $arItem):?>
				<a href="<?echo $arItem["URL"]?>"><?echo $arItem["TITLE_FORMATED"]?></a>
				<p><?echo (!empty($arItem["BODY_FORMATED"]) ? htmlspecialchars_decode($arItem["BODY_FORMATED"]) : 'Описание отсутствует')?></p>
				<?if (
					$arParams["SHOW_RATING"] == "Y"
					&& $arItem["RATING_TYPE_ID"] <> ''
					&& $arItem["RATING_ENTITY_ID"] > 0
				):?>
					<div class="search-item-rate">
					</div>
				<?endif;?>
			<?
				if (!empty($arItem["TAGS"]))
				{
					?><?
				}
	
				?><hr />
			<?endforeach;?>
			<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
			<br />
			<p>
	
			</p>
		<?else:?>
			<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
		<?endif;?>
		</div>
		</div>
	</div>
</div>
<br><br><br><br>