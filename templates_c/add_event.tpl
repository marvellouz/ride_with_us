{extends file="templates_c/index.tpl"}
{block name=content}

<form method="POST" action="{$webroot}/addevent/"> 
	<label for="date">Дата: </label>
	<br />
	<input type="text" id="date" name="date"/>
	<br/>
	<label for="ride_info">Допълнителна информация: </label>
	<br />
	<input type="ride_info" id="upass" name="ride_info"/>
	<br/>
	<label for="displacement">Денивелация: </label>
	<br />
	<input type="displacement" id="upass" name="displacement"/>
	<br/>
	<label for="distance">Разстояние: </label>
	<br />
	<input type="distance" id="distance" name="distance"/>
	<br/>


	<label for="from">От: </label>
	<br />
	<input type="from" id="from" name="from"/>
	<br/>

	<label for="to">До: </label>
	<br />
	<input type="to" id="to" name="to"/>
	<br/>

	<label for="route_info">Информация за маршрута: </label>
	<br />
	<input type="route_info" id="route_info" name="route_info"/>
	<br/>

	<input type="submit" name="addevent" value="Запази"/>
</form>

{/block}
