<?php
/**
 * Template Name: Resources Filter
 * @package WordPress
 */
get_header();
?>

<form id="resource-filter-form" style="text-align: center";>
    <select id="resource-type">
        <option value="">Select Resource Type</option>
        <?php
        $terms = get_terms('resource_type');
        foreach ($terms as $term) {
            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
        }
        ?>
    </select>

    <select id="resource-topic">
        <option value="">Select Resource Topic</option>
        <?php
        $terms = get_terms('resource_topic');
        foreach ($terms as $term) {
            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
        }
        ?>
    </select>

    <input type="text" id="resource-keyword" placeholder="Keyword">

    <button type="submit">Filter</button>
</form>

<div id="resource-list">

    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'resource');
        }
    } else {
        echo 'No resources found.';
    }
    ?>
</div>

<?php get_footer(); ?>

