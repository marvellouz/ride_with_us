{extends file="templates_c/index.tpl"}
{block name=content}
<div id="day_events">
<ul>
{foreach from=$day_events item=event}
  <li><a href="{$webroot}/event/{$event['event_id']}">Каране на {$event['when_datetime']} от {$event['start']} до {$event['end']}</a></li>
  {assign var="event_id" value=$event['event_id']}
  {include file="templates_c/attend.tpl"}
{/foreach}
</ul>
</div>

{/block}
~        
