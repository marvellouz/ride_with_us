{extends file="templates_c/index.tpl"}
{block name=content}
<div id="day_events">
{foreach from=$day_events item=event}
<div class="day_event">
  <strong>Koгa:</strong> {$event['when_datetime']}
  <br/>
  <strong>Допълнителна информация:</strong> {$event['additional_info']}
</div>
{/foreach}
</div>

{/block}
~        
