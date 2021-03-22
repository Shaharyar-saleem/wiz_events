<?php
function asset_url($path)
{
	return base_url('assets/' . $path);
}

function asset_img($path)
{
	return asset_url('img/' . $path);
}

function asset_css($path)
{
	return asset_url('css/' . $path);
}

function asset_js($path)
{
	return asset_url('js/' . $path);
}