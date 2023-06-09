<div class="reaction-button-wrapper">
    <?php if( isset( $settings['exam_reaction_button_general_title'] ) ) : ?>
        <h3 class="reaction-heading"><?php echo esc_html( $settings['exam_reaction_button_general_title'] ) ?></h3>
    <?php else : ?>
        <h3><?php echo isset( $atts['title'] ) ? esc_html( $atts['title'] ) : __('Share your exparience with us!!','exam-reaction-button') ?></h3>
    <?php endif ?>
    <div class="reaction-button">
        <div class="reaction-icon smile <?php echo exam_reaction_button_cur() == 1 ? 'active' : 'inactive'; ?>" data-react-id="1">
            <span class="counting"><?php echo exam_reaction_button_count_by_post_and_react_id(get_the_ID(),1) ?></span>
            <svg fill="#018000" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330.00 330.00" xml:space="preserve" stroke="#018000" stroke-width="0.0033" transform="matrix(1, 0, 0, 1, 0, 0)">

                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="1.32"/>
                
                <g id="SVGRepo_iconCarrier"> <g id="XMLID_92_"> <path id="XMLID_93_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300 c-74.439,0-135-60.561-135-135S90.561,30,165,30s135,60.561,135,135S239.439,300,165,300z"/> <path id="XMLID_104_" d="M205.306,205.305c-22.226,22.224-58.386,22.225-80.611,0.001c-5.857-5.858-15.355-5.858-21.213,0 c-5.858,5.858-5.858,15.355,0,21.213c16.963,16.963,39.236,25.441,61.519,25.441c22.276,0,44.56-8.482,61.519-25.441 c5.858-5.857,5.858-15.355,0-21.213C220.661,199.447,211.163,199.448,205.306,205.305z"/> <path id="XMLID_105_" d="M115.14,147.14c3.73-3.72,5.86-8.88,5.86-14.14c0-5.26-2.13-10.42-5.86-14.14 c-3.72-3.72-8.88-5.86-14.14-5.86c-5.271,0-10.42,2.14-14.141,5.86C83.13,122.58,81,127.74,81,133c0,5.26,2.13,10.42,5.859,14.14 C90.58,150.87,95.74,153,101,153S111.42,150.87,115.14,147.14z"/> <path id="XMLID_106_" d="M229,113c-5.26,0-10.42,2.14-14.141,5.86C211.14,122.58,209,127.73,209,133c0,5.27,2.14,10.42,5.859,14.14 C218.58,150.87,223.74,153,229,153s10.42-2.13,14.14-5.86c3.72-3.72,5.86-8.87,5.86-14.14c0-5.26-2.141-10.42-5.86-14.14 C239.42,115.14,234.26,113,229,113z"/> </g> </g>
            </svg>
        </div>
        <div class="reaction-icon straight <?php echo exam_reaction_button_cur() == 2 ? 'active' : 'inactive'; ?>"  data-react-id="2">
            <span class="counting"><?php echo exam_reaction_button_count_by_post_and_react_id(get_the_ID(),2) ?></span>
            <svg fill="#183153" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">

                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                
                <g id="SVGRepo_iconCarrier"> <g id="XMLID_2_"> <path id="XMLID_4_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300 c-74.439,0-135-60.561-135-135S90.561,30,165,30s135,60.561,135,135S239.439,300,165,300z"/> <path id="XMLID_7_" d="M215.912,200.912H114.088c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15h101.824c8.284,0,15-6.716,15-15 C230.912,207.628,224.196,200.912,215.912,200.912z"/> <path id="XMLID_8_" d="M115.14,147.14c3.73-3.72,5.86-8.88,5.86-14.14c0-5.26-2.13-10.42-5.86-14.141 C111.42,115.14,106.26,113,101,113c-5.271,0-10.42,2.14-14.141,5.859C83.13,122.58,81,127.729,81,133 c0,5.26,2.13,10.42,5.859,14.14C90.58,150.859,95.74,153,101,153S111.42,150.859,115.14,147.14z"/> <path id="XMLID_9_" d="M229,113c-5.27,0-10.42,2.14-14.141,5.859C211.14,122.58,209,127.729,209,133c0,5.27,2.14,10.42,5.859,14.14 c3.721,3.72,8.881,5.86,14.141,5.86s10.42-2.141,14.14-5.86c3.72-3.72,5.86-8.88,5.86-14.14c0-5.26-2.141-10.42-5.86-14.141 C239.42,115.14,234.27,113,229,113z"/> </g> </g>
                
            </svg>
        </div>
        <div class="reaction-icon sad <?php echo exam_reaction_button_cur() == 3 ? 'active' : 'inactive'; ?>" data-react-id="3">
            <span class="counting"><?php echo exam_reaction_button_count_by_post_and_react_id(get_the_ID(),3) ?></span>
            <svg fill="#FF2500" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                <g id="SVGRepo_iconCarrier"> <g id="XMLID_85_"> <path id="XMLID_86_" d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165c90.981,0,165-74.019,165-165S255.982,0,165,0z M165,300 C90.561,300,30,239.44,30,165S90.561,30,165,30c74.439,0,135,60.561,135,135S239.439,300,165,300z"/> <path id="XMLID_89_" d="M164.999,179.823C164.998,179.823,165,179.823,164.999,179.823c-23.238,0-45.087,9.05-61.518,25.482 c-5.858,5.857-5.858,15.355,0,21.213c2.929,2.929,6.768,4.394,10.607,4.394s7.678-1.465,10.606-4.394 c10.766-10.766,25.08-16.694,40.305-16.694c15.225,0,29.539,5.929,40.305,16.694c5.857,5.857,15.355,5.857,21.213,0 c5.858-5.857,5.858-15.355,0-21.213C210.085,188.873,188.238,179.823,164.999,179.823z"/> <path id="XMLID_90_" d="M115.14,147.14c3.73-3.72,5.86-8.88,5.86-14.14s-2.13-10.42-5.86-14.141C111.42,115.14,106.26,113,101,113 c-5.27,0-10.42,2.14-14.14,5.859C83.14,122.58,81,127.74,81,133s2.14,10.42,5.86,14.14c3.72,3.72,8.88,5.86,14.14,5.86 C106.26,153,111.42,150.86,115.14,147.14z"/> <path id="XMLID_91_" d="M229,113c-5.27,0-10.42,2.14-14.14,5.859C211.13,122.58,209,127.74,209,133s2.13,10.42,5.86,14.14 c3.72,3.72,8.88,5.86,14.14,5.86c5.26,0,10.42-2.141,14.14-5.86c3.73-3.72,5.86-8.88,5.86-14.14s-2.13-10.42-5.86-14.141 C239.42,115.14,234.26,113,229,113z"/> </g> </g>
            </svg>
        </div>
    </div>
</div>
