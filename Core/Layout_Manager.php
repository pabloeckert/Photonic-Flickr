<?php
class Layout_Manager {
    public static function get_template($layout) {
        $templates = [
            'grid-square' => 'Grid_Square.php',
            'grid-circle' => 'Grid_Circle.php',
            'justified' => 'Justified.php',
            'masonry' => 'Masonry.php',
            'mosaic' => 'Mosaic.php',
            'slideshow' => 'Slideshow_Splide.php',
        ];
        return $templates[$layout] ?? 'Grid_Square.php';
    }
}
