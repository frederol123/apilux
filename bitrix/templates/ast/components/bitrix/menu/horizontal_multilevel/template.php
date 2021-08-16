<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav id=cssmenu>

<ul class="left-menu-agro">
	<!-- <li class="mobile-invisible"><a href="/"><img src="/bitrix/images/agro/logo.png" alt=""></a></li> -->
	<div class="mob-menu">
		<div class="button-burger"><img src="/bitrix/templates/ast/images/burger.svg" alt=""></div>
		<div class="m-phone">
			<img src="/bitrix/templates/ast/images/mphone.png" alt="">
            <div>
                <span><a href="tel:+79192724649">+7 919 272-46-49</a></span><br>
                <span><a href="tel:+74714422669">+7 (47144) 2-26-69</a></span>
            </div>
		</div>
		<div class="m-mail">
            <img src="/bitrix/templates/ast/images/mailm.svg" alt="">
            <div>
                <span><a href="mailto:salyabev@yandex.ru">salyabev@yandex.ru</a></span>
            </div>
        </div>
	</div>
<?

$APPLICATION->AddChainItem("Продукция", "/products");

CModule::IncludeModule("iblock");
//пример выборки дерева подразделов для раздела 

 
$rsSect = CIBlockSection::GetList(
    [
        'IBLOCK_ID' => 1,
        'ACTIVE' => 'Y'
    ]
);

while($arSect = $rsSect->fetch()){ 
    $list[$arSect['NAME']]['name'] = $arSect['NAME'];
	$list[$arSect['NAME']]['SORT'] = $arSect['SORT'];
	$list[$arSect['NAME']]['url'] = '/products/list?SECTION_ID=' . $arSect['ID'];
}

usort($list, function($a, $b){
    return ($a['SORT'] - $b['SORT']);
});



foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>

	<li class="menu-template-one <?=($arItem["TEXT"] == 'Продукция') ? 'arrow-menu': null?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
		<?if($arItem["TEXT"] == 'Продукция'):?>
			<ul class="dropdown-prods">
				<?foreach($list as $item):?>
					<li><a href="<?=$item['url']?>"><?=$item['name']?></a></li>
				<?endforeach;?>
			</ul>
		<?endif;?>
	</li>

	
<?endforeach?>

<li>
	<?$APPLICATION->IncludeComponent("bitrix:search.form", "ast", Array(
		"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
			"PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
			"COMPONENT_TEMPLATE" => "flat"
		),
		false
	);?> 
</li>
</ul>
</nav>
<?endif?>