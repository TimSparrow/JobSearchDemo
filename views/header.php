<div id="search" class="clearfix">

	<form class="positions" action="/positions" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">

		<div class="bucket description">
			<h3>Job Description</h3>

			<div class="field">
        <input type="text" name="description" id="description_field" placeholder="Filter by title, benefits, companies, expertise" autocomplete="off" value="<?=$description?>">
			</div>
		</div>

		<div class="bucket location">
			<h3>Location</h3>

			<div class="field">
        <input type="text" name="location" id="location_field" placeholder="Filter by city, state, zip code or country" autocomplete="off" value="<?=$location?>">
			</div>
		</div>

		<div class="bucket fulltime">
			<label class="simplefield">
        <input type="checkbox" name="full_time" id="full_time_field" value="1"
			<?php if ($fulltime) {
				echo 'checked="checked" ';
			}
			?>
		>
				Full Time Only
			</label>
		</div>

		<button type="submit">Search</button>

</form>
</div>
