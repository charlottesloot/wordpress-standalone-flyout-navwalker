# Wordpress standalone fullscreen navwalker
This navwalker is custom made to work without having to include any third parties (except for jquery, which is included in wordpress by default).
this navwalker is built as an extension of the wordpress core class [Walker_Nav_Menu](https://developer.wordpress.org/reference/classes/walker_nav_menu/).

Ideal for developers who don't want to include the full package of Bootstrap (or other third parties).

## Installation
1. Declare a new menu in your `functions.php` for the general menu AND an extra for your main CTA button.:
```PHP
if (function_exists('register_nav_menus')) {
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'text_domain' ),
        'call_to_action'  => __( 'Call To Action', 'text_domain' ),
    ));
}
```
I put the two in a different nav, because this worked a bit more flexible on the mobile sticky usage.

2. Place **class-standalone_wordpress_navwalker.php** in your Worpress `/inc/` directory (for example, `/wp-content/themes/inc/`). Or, just copy paste the whole file into your functions.php.  

3. Include the the custom navwalker in your `functions.php`.
```PHP
require get_template_directory() . '/inc/class-standalone_wordpress_navwalker.php';// include this line if you added the file in your ` inc`folder
require get_template_directory() . '/class-standalone_wordpress_navwalker.php';// include this line if you added it in your root
```

4. Add or update any wp_nav_menu() functions in your theme. To use this navigation walker, add it to the `'walker'`item to the wp_nav_menu args array. **See the `navigation.php` file**

**Congrats! Your nav menu should show up on your page now.**

## Adding the functionality (jQuery)
Now, you just need to add the jQuery: everything you need sits in the `navwalker.js` file.  Copy paste it into your jquery file.
**Or simply add the `navwalker.js` file into your files.**

## Adding the Styles
Depending wether or not you're using SCSS, you can:
* Use the `navwalker.css` file as an easy styling guide. Or; 
* Style everything yourself

## Setting up a different icon
All you need to do to change the dropdown icon is replace the `<span class="sub-menu-toggle">&#9654;</span>` on line 58 in the `class-standalone_wordpress_navwalker.php` file.


## Technical requirements
The below noted requirements are 100% compatible:
* PHP version: `7.4` or above. (tested and implemented on 7.4)
* WP Version: `6.0.0` or above. (tested on version `6.3.2`)

