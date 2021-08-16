<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogProductsViewedComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

CModule::IncludeModule("iblock");

$res = CIBlockElement::GetProperty(4, $arResult['ITEM']["ID"], "sort", "asc");
while ($ob = $res->GetNext())
{
	$props[$ob['CODE']] = $ob['VALUE'];
}

$res = CIBlockElement::GetByID($arResult['ITEM']["ID"]);
if($ar_res = $res->GetNext())
	$sectId = $ar_res['IBLOCK_SECTION_ID']; 
?>
	<div class="product-card-wrap-popular-list" >
		<a href="/catalog/detail?SECTION_ID=<?=$sectId?>&ELEMENT_ID=<?=$arResult['ITEM']["ID"]?>" style="height:100%;align-items: center;display: grid;justify-content: center;">
		<div class="dostavka">техподдержка</div>
		<div class="product-photo">
				<img src="<?=$arResult['ITEM']["DETAIL_PICTURE"]["SRC"]?>" alt="" style="justify-self:center;display: block;max-height: -webkit-fill-available;max-width:210px">
			</div>
			<div class="articul-text" style="display:none;">
				<?=$props['articul']?>
			</div>
			<button data-id="<?=$arResult['ITEM']["ID"]?>" style="justify-self:center;" class="btn btn-primary open-vac buy-product">ЗАПРОСИТЬ СТОИМОСТЬ</button>
		</a>

		<div class="title-name">
			<a href="/catalog/detail?SECTION_ID=<?=$sectId?>&ELEMENT_ID=<?=$arResult['ITEM']["ID"]?>" style="">
			<?=htmlentities(str_replace('&amp;amp;amp;amp;quot;','',$arResult['ITEM']["NAME"]))?>
			</a>
		</div>
	</div>

<script>
	$(document).ready(function(){
		$('.product-card-wrap-popular-list').hover(function(){
			$(this).find('.open-vac').css('opacity', 1);
		});

		$('.product-card-wrap-popular-list').on('mouseleave',function(){
			$(this).find('.open-vac').css('opacity', 0);
		});
	});
</script>