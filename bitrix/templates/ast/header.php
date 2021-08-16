<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?
use Bitrix\Main\UI\Extension;
Extension::load('ui.bootstrap4');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?echo LANG_CHARSET;?>">
<?$APPLICATION->ShowMeta("keywords");?>
<?$APPLICATION->ShowMeta("description");?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="yandex-verification" content="cf498f8bf55b23d2" />
<script src="https://kit.fontawesome.com/419821370e.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/bitrix/templates/ast/styles.css">


<?$APPLICATION->ShowHead()?>
</head>

<?$APPLICATION->ShowPanel();?>

<div class="container">
    <div class="content">
        <div class="header-block">
            <div class="top-text-wrap">
                <div class="top-text">Звоните по будням с 9:00 до 18:00, наши эксперты ответят в течение минуты:</div>
                <div class="flags">
                    <div class="ru">
                        <img src="/bitrix/templates/ast/images/ru.png" width="25px" height="25px" alt="" class="">
                        <span class="">Рус</span>
                    </div>
                    <div class="en">
                        <img src="/bitrix/templates/ast/images/uk.png" width="25px" height="25px" alt="" class="">
                        <span class="">En</span>
                    </div>
                </div>
            </div>
            <div class="logo-wrapper">
                <div class="logo">
                    <img src="/bitrix/templates/ast/images/apiluxlogo.png" alt="" width="190px" height="89px">
                </div>
                <div class="logo-text-first">
                    <img src="/bitrix/templates/ast/images/phone.png" alt="">
                    <div>
                        <span><a href="tel:+79192724649">+7 919 272-46-49</a></span>
                        <span><a href="tel:+74714422669">+7 (47144) 2-26-69</a></span>
                    </div>
                </div>
                <div class="logo-text-first logo-text-second">
                    <img src="/bitrix/templates/ast/images/email.png" alt="">
                    <div>
                        <span><a href="mailto:salyabev@yandex.ru">salyabev@yandex.ru</a></span>
                    </div>
                </div>
            </div>
    </div>
    <div class="header-block-mobile">
    <div class="logo">
                    <img src="/bitrix/templates/ast/images/apiluxlogo.png" alt="" width="140px" height="69px">
                </div>
        <div class="flags">
                    <div class="ru">
                        <img src="/bitrix/templates/ast/images/ru.png" width="25px" height="25px" alt="" class="">
                        <span class="">Рус</span>
                    </div>
                    <div class="en">
                        <img src="/bitrix/templates/ast/images/uk.png" width="25px" height="25px" alt="" class="">
                        <span class="">En</span>
                    </div>
        </div>
    </div>
</div>
</div>

<div class="container container-menu">
    <div class="content">
            <div class="header-menu">
                <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"horizontal_multilevel", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "podrazdel",
		"DELAY" => "N",
		"MAX_LEVEL" => "4",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "horizontal_multilevel"
	),
	false
);?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="content">

<?php
$siteDir = 'http://' . SITE_SERVER_NAME . '/catalog/detail?ELEMENT_ID=';

?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.arrow-menu').on('mouseover', function(){
            $('.dropdown-prods').show();
        });

        $('.dropdown-prods').on('mouseleave', function(){
            $('.dropdown-prods').hide();
        });

        $('.button-burger').click(function(){
            $('.menu-template-one').toggle();
        });
    });
</script>
