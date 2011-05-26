{extends file="templates_c/index.tpl"}
{block name=content}
<div id="event_info">
  <p>
  <strong>Тръгва се от:</strong>
  {$ride_info['start']}</li>
  </p>
  <p>
  <strong>До:</strong>
  {$ride_info['end']}</li>
  </p>

  <p>
  <strong>Събитието е създадено от:</strong>
  {$owner_info['username']} ({$owner_info['fname']} {$owner_info['lname']})
  </p>
  <p>
  <strong>Дата и час:</strong>
  {$ride_info['when_datetime']}
  </p>
  <p>
  <strong>Информация за събитието:</strong>
  {$ride_info['ride_info']|default: "не е налична"}
  </p>
  <p>
  <strong>Денивелация:</strong>
  {$ride_info['displacement']|default: "не е налична"}</li>
  </p>
  <p>
  <strong>Разстояние:</strong>
  {$ride_info['distance']|default: "не е налично"}</li>
  </p>
  <p>
  <strong>Допълнителна информация за маршрута:</strong>
  {$ride_info['route_info']|default: "не е налична"}</li>
  </p>
  <strong>Ще присъстват:</strong>
  <ul>
    {foreach from=$users_attending item=attender}
      <li>{$attender['username']} ({$attender['fname']} {$attender['lname']})</li>
    {/foreach}
  </ul>
  {include file="templates_c/attend.tpl"}
</div>

{/block}
~        
