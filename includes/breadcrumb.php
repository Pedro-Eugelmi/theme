<nav aria-label="Breadcrumb" class="flex text-on-surface-variant font-caption text-caption mb-md items-center">
    <ol class="inline-flex items-center flex-wrap gap-1 md:gap-2">
        
        <!-- Home (Sempre visível) -->
        <li class="inline-flex items-center">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-primary transition-colors">
                Início
            </a>
        </li>

        <?php
        // Separador Universal usando SVG limpo e sem dependência de fontes externas
        $separator = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-outline-variant opacity-70"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>';

        // Lógica: Se for página de Categoria
        if (is_category()) {
            echo '<li class="flex items-center gap-1 md:gap-2">' . $separator;
            echo '<span class="text-on-background font-medium">' . single_cat_title('', false) . '</span>';
            echo '</li>';
        } 
        
        // Lógica: Se for Artigo Individual (Single)
        elseif (is_single()) {
            $categories = get_the_category();
            if (!empty($categories)) {
                $cat = $categories[0];
                echo '<li class="flex items-center gap-1 md:gap-2">' . $separator;
                echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="hover:text-primary transition-colors">' . esc_html($cat->name) . '</a>';
                echo '</li>';
            }
            echo '<li class="flex items-center gap-1 md:gap-2">' . $separator;
            echo '<span class="text-on-background font-medium line-clamp-1" aria-current="page">' . get_the_title() . '</span>';
            echo '</li>';
        } 
        
        // Lógica: Se for Página de Busca
        elseif (is_search()) {
            echo '<li class="flex items-center gap-1 md:gap-2">' . $separator;
            echo '<span class="text-on-background font-medium">Busca: ' . get_search_query() . '</span>';
            echo '</li>';
        } 
        
        // Lógica: Se for uma Página Padrão (Ex: Contato, Sobre)
        elseif (is_page()) {
            echo '<li class="flex items-center gap-1 md:gap-2">' . $separator;
            echo '<span class="text-on-background font-medium">' . get_the_title() . '</span>';
            echo '</li>';
        }
        ?>
        
    </ol>
</nav>