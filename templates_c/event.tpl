{extends file="templates_c/index.tpl"}
{block name=content}
<div id="event_info">
<h2>Събитието е създадено от:</h2>
  {$owner_info['username']} ({$owner_info['fname']} {$owner_info['lname']})
</div>

{/block}
~        
