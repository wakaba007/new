<?php
if ( ! function_exists( 'teconce_single_social' ) ) :
function teconce_single_social() {

    $dmsocialURL = urlencode(get_permalink());

    // Get current page title
    $dmsocialTitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));


    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/share?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$dmsocialURL;
    $googleURL = 'https://plus.google.com/share?url='.$dmsocialURL;
    $bufferURL = 'https://bufferapp.com/add?url='.$dmsocialURL.'&amp;text='.$dmsocialTitle;
    $whatsappURL = 'whatsapp://send?text='.$dmsocialTitle . ' ' . $dmsocialURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$dmsocialURL.'&amp;title='.$dmsocialTitle;

    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$dmsocialURL.'&amp;description='.$dmsocialTitle;

    echo '<li><a href="'.$facebookURL.'" target="_blank" class="facebook dropdown-item"><i class="zil zi-facebook"></i> <span>Facebook</span></a></li>';
    echo '<li><a href="'.$twitterURL.'" target="_blank" class="twitter dropdown-item"><i class="zil zi-twitter"></i> <span>Twitter</span></a></li>';
    echo '<li><a href=" '.$pinterestURL.'" target="_blank" class="pinterest dropdown-item"><i class="zil zi-pinterest"></i> <span>Pinterest</span></a></li>';
    echo '<li><a href=" '.$linkedInURL.'" target="_blank" class="linkedin dropdown-item"><i class="zil zi-linked-in"></i> <span>Linkedin</span></a></li>';



};
endif;

if ( ! function_exists( 'teconce_single_social_style_two' ) ) :
    function teconce_single_social_style_two() {

        $dmsocialURL = urlencode(get_permalink());

        // Get current page title
        $dmsocialTitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));


        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/share?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$dmsocialURL;
        $googleURL = 'https://plus.google.com/share?url='.$dmsocialURL;
        $bufferURL = 'https://bufferapp.com/add?url='.$dmsocialURL.'&amp;text='.$dmsocialTitle;
        $whatsappURL = 'whatsapp://send?text='.$dmsocialTitle . ' ' . $dmsocialURL;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$dmsocialURL.'&amp;title='.$dmsocialTitle;

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$dmsocialURL.'&amp;description='.$dmsocialTitle;

        echo '<ul class="social_list-style-two">';
        echo '<li><a href="'.$facebookURL.'" target="_blank" class="facebook dropdown-item"><i class="zil zi-facebook"></i> </a></li>';
        echo '<li><a href="'.$twitterURL.'" target="_blank" class="twitter dropdown-item"><i class="zil zi-twitter"></i> </a></li>';
        echo '<li><a href=" '.$pinterestURL.'" target="_blank" class="pinterest dropdown-item"><i class="zil zi-pinterest"></i> </a></li>';
        echo '<li><a href=" '.$linkedInURL.'" target="_blank" class="linkedin dropdown-item"><i class="zil zi-linked-in"></i> </a></li>';
        echo '</ul>';



    };
endif;