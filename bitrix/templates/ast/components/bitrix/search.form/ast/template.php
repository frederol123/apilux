<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>

<!-- <div class="search-block">
	<form action="<?//=$arResult["FORM_ACTION"]?>">
		<input type="text" name="q srch-input form-control" value="" size="15" maxlength="50" placeholder="Поиск по сайту"/>
		<input name="s" type="submit" value="Поиск" class="srch-btn form-control"/>
	</form>
</div> -->

<div class="search-block">
	<form action="<?=$arResult["FORM_ACTION"]?>">
        <input type="text"  name="q" class="q srch-input form-control" placeholder="Поиск по сайту">
        <input type="submit" value="Поиск"  class="srch-btn form-control">
	</form>
</div>