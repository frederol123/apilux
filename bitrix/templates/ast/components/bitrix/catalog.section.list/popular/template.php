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

shuffle($arResult['SECTIONS']);
$arResult['SECTIONS'] = array_slice($arResult['SECTIONS'],0,6);
?>

<div class="popular-grid">
	<?
	foreach($arResult['SECTIONS'] as $arSection){
	?>
		<div class="product-card-wrap">
			<div class="card-popular">
				<a href="/catalog/?SECTION_ID=<?=$arSection['ID']?>">
					<div class="img-cat-wrapper">
						<img src="<?=$arSection['PICTURE']['SRC']?>" width="133px" height="95px" alt="" title="<? echo $arSection['PICTURE']['TITLE']; ?>">
					</div>

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
