function aux_nav(element, mode)
{
	if( (typeof(element) != 'undefined') && (typeof(mode) != 'undefined') )
	{
		if(mode == 1)
		{
			document.getElementById('nav_'+element).style.display = 'block';
		}
		else document.getElementById('nav_'+element).style.display = 'none';
	}
}