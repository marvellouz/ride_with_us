{extends file="templates_c/index.tpl"}
{block name=content}

<form method="POST" action="search.php">
<input type="text" name="search_string" id="search_box" />
<input type="submit" name="search" value="search" />
</form>
<div id="found">

</div>
{/block}