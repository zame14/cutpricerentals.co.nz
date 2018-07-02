<?php
vc_map( array(
    "name" => __("Banner CTA"),
    "base" => "banner_cta",
    "category" => __('Content'),
    'description' => 'CTA to be displayed on the home page',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Sentence 1"),
            "param_name" => "sentence1",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Sentence 2"),
            "param_name" => "sentence2",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Sentence 3"),
            "param_name" => "sentence3",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Label"),
            "param_name" => "button_label",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Link"),
            "param_name" => "button_link",
        ),
    )
));
add_shortcode('banner_cta', 'bannerCTA');
function bannerCTA($atts)
{
    $args = shortcode_atts(array(
        'sentence1' => '',
        'sentence2' => '',
        'sentence3' => '',
        'button_label' => '',
        'button_link' => ''
    ), $atts);
    $html = '
    <div class="cta-wrapper">
        <div class="cta">
            <div class="cta-inner-wrapper">
                <div class="line1">' . $args['sentence1'] . '</div>
                <div class="line2">' . $args['sentence2'] . '</div>
                <div class="line3">' . $args['sentence3'] . '</div>
                <a href="' . $args['button_link'] . '" class="btn btn-primary">' . $args['button_label'] . '</a>
            </div>
        </div>
    </div>';

    return $html;
}