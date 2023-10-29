<?php
/**
 * Class Name: Standalone_responsive_Wordpress_Navwalker
 * Plugin Name: Standalone Wordpress Responsive Navwalker
 * Plugin URI:  https://github.com/charlottesloot/wordpress-standalone-flyout-navwalker/
 * Description: A custom WordPress nav walker class to implement in a custom theme using the WordPress built in menu manager.
 * Author: Charlotte Slootmaeckers
 * Version: 1.0.0
 * Author URI: https://github.com/charlottesloot
 * GitHub Plugin URI: https://github.com/charlottesloot/wordpress-standalone-flyout-navwalker/
 */
class Standalone_Wordpress_Navwalker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $atts = array();
        $atts['title']  = ! empty($item->title)   ? $item->title  : '';
        $atts['target'] = ! empty($item->target)  ? $item->target : '';
        $atts['rel']    = ! empty($item->xfn)     ? $item->xfn    : '';
        $atts['href']   = ! empty($item->url)     ? $item->url    : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
        $attributes = '';

        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        if ($args->has_children) {
            $item_output .= '<span class="sub-menu-toggle">&#9654;</span>'; // Arrow icon - change this for a different icon.
        }

        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}
