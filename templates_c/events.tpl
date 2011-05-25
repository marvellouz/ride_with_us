{extends file="templates_c/index.tpl"}
{block name=content}
<div id="day_events">
<ul>
{foreach from=$day_events item=event}
  <li><a href="{$webroot}/event/{$event['event_id']}">Каране на {$event['when_datetime']} от {$event['start']} до {$event['end']}</a></li>
  <form method="post" action="{$webroot}/attend/{$event['event_id']}">
    <input type="submit" id="attend" name="attend" value="Ще присъствам" />
  </form>
{/foreach}
</ul>
</div>

{/block}
~        
