{extends file="templates_c/index.tpl"}
{block name=content}
<div id="day_events">
<ul>
{foreach from=$user_events item=event}
  <li><a href="{$webroot}/event/{$event['event_id']}">Каране на {$event['when_datetime']} от {$event['start']} до {$event['end']}</a></li>
{/foreach}
</ul>
</div>

{/block}
