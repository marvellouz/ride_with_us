{extends file="templates_c/index.tpl"}
{block name=content}

<form method="POST" action="search">
<label for="search_string">Въведете критерий за търсене на маршрут:</label>
<br /><br />
<!-- <input type="text" name="search_string" id="search_box" /> -->

<input type="text" name="start" />
<label for="start">начална точка на карането</label>
<br />
<input type="text" name="end" />
<label for="end">крайна точка на карането</label>
<br />
<input type="text" name="distance" />
<label for="distance">дължина на карането</label>
<br />
<input type="text" name="displacement" />
<label for="displacement">денивелация</label>
<br />
<input type="text" name="additional_info" />
<label for="additional_info">описание</label>


<br />
<input type="submit" name="search_submit" value="Търси" />
</form>
<div id="found_results">
{if isset($ride)}
<table rules="all">
	<tr>
		<th>Създател</th>
		<th>Дата</th>
		<th>Денивелация</th>
		<th>Дължина (км)</th>
		<th>Начална точка</th>
		<th>Крайна точка</th>
		<th>Допълнителна информация</th>
	</tr>
	
	{*{foreach from=$ride  item=rid}*}
	{for $i=0 to $cnt-1}
	<tr>
		
		{foreach from=$ride[$i]  item=rid}
		  <td><a href="{$webroot}/event/{$ride[$i]['id']}/">{$rid}</a>
		  </td>		
		{/foreach}
		
	</tr>
	{/for}
	
</table>
{elseif isset($ride_error)}
{$ride_error}
{/if}

</div>
{/block}
