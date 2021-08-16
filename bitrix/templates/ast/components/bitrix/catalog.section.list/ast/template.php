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
$this->setFrameMode(true);
?>

<div class="row">
	<?
	foreach($arResult['SECTIONS'] as $arSection){
	?>
		<div class="col-12 col-md-3">
			<div class="product-card-wrap" style="height:275px;">
				<a href="<?=$arSection['SECTION_PAGE_URL']?>">
					<img src="<?=$arSection['PICTURE']['SRC']?>" width="87px" height="124px" alt="" title="<? echo $arSection['PICTURE']['TITLE']; ?>">
					<div class="title-name">
							<?=$arSection['NAME']?>
					</div>
				</a>
			</div>
		</div>

	<?
	}
	?>

</div>
