  {if $user_events}
    {if !in_array($event_id, $user_events)}
      <form method="post" action="{$webroot}/attend/{$event_id}">
	<input type="submit" id="attend" name="attend" value="Ще присъствам" />
      </form>
      {else}
      <form method="post" action="{$webroot}/attend/{$event_id}">
	<input type="submit" id="unattend" name="unattend" value="Няма да присъствам" />
      </form>
    {/if}
  {else}
    <form method="post" action="{$webroot}/attend/{$event_id}">
      <input type="submit" id="attend" name="attend" value="Ще присъствам" />
    </form>
  {/if}
