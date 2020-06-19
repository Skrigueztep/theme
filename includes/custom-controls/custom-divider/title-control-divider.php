<?php

    IF (class_exists('WP_Customize_Control')) {
        class Title_Control_Divider extends WP_Customize_Control {

            public function __construct($manager, $id, $args = array()) {
                parent::__construct($manager, $id, $args);
            }

            public function enqueue() {
                wp_enqueue_style(
                    'customizer-styles',
                    get_template_directory_uri()."/includes/custom-controls/custom-divider/customizer-styles.css",
                    array(),
                    wp_get_theme()->get('Version')
                );
            }

            protected function render_content() { ?>
                <div class="divider">
                    <label><?php echo esc_html($this->label); ?></label>
                    <?php
                        if ($this->description != '') wpautop($this->description);
                    ?>
                </div>
            <?php
            }

        }
    }
