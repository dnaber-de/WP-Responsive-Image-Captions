# WordPress Plugin: »Responsive Image Captions«

This plugin replaces the default Media-Caption markup which uses a `style` attribute and fix `width` values with a more flexible one.

## CSS
You'll need to adapt your themes or childthemes css. So this plugin is not just »plug'n'play«.

```CSS
.wp-caption-wrapper.aligncenter {
	text-align: center;
}
.wp-caption.aligncenter {
	display: inline-block;
}
/* and of course… */
img {
	max-width: 100%;
	height: auto;
}
```

## Five Classes, three interfaces WTF?
Indeed, one could handle this issue with exactly one function. So why this effort? _Because I can._ Seriously: first of all this somewhat a proof-of-concept and one example on a testable MVC pattern in a WordPress plugin. **Critical reviews are welcome!**