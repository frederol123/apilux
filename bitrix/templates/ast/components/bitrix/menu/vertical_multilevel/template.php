<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="catalog-menu">
<ul class="main-menu-left"> <!--id="vertical-multilevel-menu"-->
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li  class="first-vertical <?=(mb_strlen($arItem["TEXT"]) > 41) ? 'big-height': ''?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?><?endif?>">
			<a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>">
				<?=$arItem["TEXT"]?>
			</a>
				<ul class="drop-menu">
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="drop-menu"  style="display:none">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?><?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?><?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>

</div>
<?endif?>

<script>

document.addEventListener("DOMContentLoaded", function(){
	$('.catalog-menu .drop-menu').each(function(){
		var link = $(this).parent();
		link.addClass('with-arrow');
	});

	makeMenu();

	function makeMenu(){
		document.querySelectorAll('.main-menu>li').forEach(function(everyitem){
			
		everyitem.addEventListener('mouseover', function(e){

			let el_link = $(this).find('>.drop-menu');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.show();
				// nextEl.classList.addClass('show');
			}

		});

		everyitem.addEventListener('mouseleave', function(e){
			let el_link = $(this).find('>.drop-menu');;

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.hide();
				// nextEl.classList.remove('show');
			}


		})
		});

		document.querySelectorAll('.with-arrow .drop-menu > .with-arrow').forEach(function(everyitem){

		everyitem.addEventListener('mouseover', function(e){

			let el_link = $(this).find('>.drop-menu');

			console.log(el_link);

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.stop().stop().show(400);
				// nextEl.classList.addClass('show');
			}

			});

			everyitem.addEventListener('mouseleave', function(e){
				let el_link = $(this).find('>.drop-menu');;

				if(el_link != null){
					let nextEl = el_link.nextElementSibling;
					el_link.stop().stop().hide(400);
					// nextEl.classList.remove('show');
				}


			})
		});

	}
	// $('.with-arrow>a').click(function(e){
	// 	e.preventDefault();
	// 	e.stopPropagation();
	// });

	

// end if innerWidth
}); 
</script>