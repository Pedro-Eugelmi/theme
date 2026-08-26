<?php get_header(); ?>

<main class="flex-grow flex flex-col">
    
    <!-- Category Header & Search Area -->
    <section class="bg-primary/5 border-b border-primary/20 py-xl">
        <div class="max-w-container-max mx-auto px-gutter w-full">
            
            <!-- Breadcrumbs Dinâmico -->
            <?php include ("includes/breadcrumb.php") ?>
            
            <div class="max-w-3xl">
                <h1 class="font-display-lg text-display-lg text-on-background mb-4">
                     <?php single_cat_title(); ?>
                </h1>
                
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg">
                    <?php 
                    if (category_description()) {
                        echo strip_tags(category_description());
                    } else {
                        echo 'Confira todos os tutoriais desta categoria.';
                    }
                    ?>
                </p>
                
                <!-- Formulário de Busca Integrado -->
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative w-full shadow-sm group">
                    <input 
                        type="search" 
                        name="s" 
                        value="<?php echo get_search_query(); ?>" 
                        class="bg-white border-2 border-primary/20 text-on-background text-body-md rounded-lg focus:ring-primary focus:border-primary block w-full pl-12 p-4 transition-all hover:shadow-md outline-none" 
                        placeholder="Buscar sobre <?php single_cat_title(); ?>..." 
                        required
                    />
                    <!-- Input oculto para forçar a busca apenas nesta categoria (Opcional, remova se quiser busca global) -->
                    <input type="hidden" name="cat" value="<?php echo get_query_var('cat'); ?>">
                    
                    <button type="submit" class="absolute inset-y-2 right-2 px-6 bg-primary hover:bg-primary/90 text-white font-label-md text-label-md rounded transition-colors shadow-sm flex items-center">
                        Buscar
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Post List Canvas -->
    <section class="py-xl bg-surface flex-grow">
        <div class="max-w-container-max mx-auto px-gutter w-full flex flex-col lg:flex-row gap-xl">
            
            <!-- Main Posts Area -->
            <div class="w-full lg:w-3/4 flex flex-col gap-md">
                
                <div class="flex justify-between items-center mb-sm border-b border-primary/20 pb-2">
                    <h2 class="font-headline-md text-headline-md text-on-background">
                        Artigos (<?php echo $wp_query->found_posts; ?>)
                    </h2>
                </div>

                <?php if (have_posts()) : ?>
                    <?php 
                    // Array de estilos para alternar as cores dos cards
                    $card_styles = [
                        [
                            'border' => 'border-l-primary', 'hover_bg' => 'hover:bg-primary/5',
                            'img_overlay' => 'bg-primary/10', 'pill_bg' => 'bg-primary/10',
                            'pill_text' => 'text-primary', 'pill_border' => 'border-primary/20',
                            'title_hover' => 'group-hover:text-primary', 'link_color' => 'text-primary'
                        ],
                        [
                            'border' => 'border-l-secondary', 'hover_bg' => 'hover:bg-secondary/5',
                            'img_overlay' => 'bg-secondary/10', 'pill_bg' => 'bg-secondary/10',
                            'pill_text' => 'text-secondary', 'pill_border' => 'border-secondary/20',
                            'title_hover' => 'group-hover:text-secondary', 'link_color' => 'text-secondary'
                        ],
                        [
                            'border' => 'border-l-error', 'hover_bg' => 'hover:bg-error/5',
                            'img_overlay' => 'bg-error/5', 'pill_bg' => 'bg-surface-container-high',
                            'pill_text' => 'text-on-surface-variant', 'pill_border' => 'border-outline-variant',
                            'title_hover' => 'group-hover:text-primary', 'link_color' => 'text-primary'
                        ]
                    ];
                    $style_index = 0;
                    
                    while (have_posts()) : the_post(); 
                        $style = $card_styles[$style_index % 3];
                        $style_index++;
                    ?>
                        <!-- Post Item -->
                        <a href="<?php the_permalink(); ?>" class="flex flex-col sm:flex-row gap-md p-sm md:p-md bg-white border-l-4 <?php echo $style['border']; ?> border-y border-r border-outline-variant rounded-xl <?php echo $style['hover_bg']; ?> hover:shadow-[0px_4px_12px_rgba(0,0,0,0.05)] transition-all duration-300 group cursor-pointer block text-left">
                            
                            <!-- Thumbnail -->
                            <div class="w-full sm:w-48 h-32 flex-shrink-0 rounded-lg overflow-hidden border border-outline-variant/50 relative bg-surface-container-low flex items-center justify-center">
                                <div class="absolute inset-0 <?php echo $style['img_overlay']; ?> mix-blend-multiply z-10"></div>
                                
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 relative z-0']); ?>
                                <?php else : ?>
                                    <span class="material-symbols-outlined text-display-lg text-primary opacity-50 relative z-0">article</span>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Content -->
                            <div class="flex flex-col justify-between flex-grow py-1">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-medium uppercase tracking-wider <?php echo $style['pill_bg'] . ' ' . $style['pill_text'] . ' ' . $style['pill_border']; ?> border">
                                            Artigo
                                        </span>
                                    </div>
                                    <h3 class="font-headline-lg-mobile text-headline-lg-mobile text-on-background <?php echo $style['title_hover']; ?> transition-colors mb-2">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                    </p>
                                </div>
                                
                                <div class="mt-4 flex items-center <?php echo $style['link_color']; ?> font-label-md text-label-md group-hover:underline">
                                    Ler Tutorial 
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>

                    <!-- Pagination Tailwind Injector -->
                    <div class="flex justify-center mt-xl border-t border-primary/20 pt-lg">
                        <?php
                        $pagination_links = paginate_links(array(
                            'type'      => 'array',
                            'prev_text' => '<span class="material-symbols-outlined">chevron_left</span><span class="sr-only">Anterior</span>',
                            'next_text' => 'Próxima <span class="material-symbols-outlined">Próxima</span>',
                            'mid_size'  => 2,
                        ));

                        if (!empty($pagination_links)) {
                            echo '<nav aria-label="Navegação de página" class="flex items-center gap-2">';
                            foreach ($pagination_links as $link) {
                                // Se for a página ativa
                                if (strpos($link, 'current') !== false) {
                                    $link = str_replace("page-numbers current", "flex items-center justify-center w-8 h-8 rounded-full bg-primary text-white font-label-md text-label-md shadow-sm", $link);
                                }
                                // Se for o botão próximo ou anterior
                                elseif (strpos($link, 'next') !== false || strpos($link, 'prev') !== false) {
                                    $link = str_replace("page-numbers", "flex items-center justify-center p-2 text-primary hover:text-primary/80 transition-colors font-label-md text-label-md gap-1", $link);
                                }
                                // Se forem os números padrão
                                else {
                                    $link = str_replace("page-numbers", "flex items-center justify-center w-8 h-8 rounded-full text-on-surface-variant hover:bg-primary/10 transition-colors font-label-md text-label-md", $link);
                                }
                                echo $link;
                            }
                            echo '</nav>';
                        }
                        ?>
                    </div>

                <?php else : ?>
                    <div class="col-12 text-center py-xl border-t border-primary/20 mt-4">
                        <span class="material-symbols-outlined text-display-lg text-outline-variant mb-4" style="font-size: 64px;">Ops...</span>
                        <h3 class="font-headline-md text-headline-md text-on-surface-variant mb-4">Nenhum tutorial encontrado nesta categoria.</h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex px-6 py-3 bg-primary text-white font-label-md rounded hover:bg-primary/90 transition-colors">Voltar para o Início</a>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Sidebar (Contextual Help) -->
            <?php include "includes/support_aside.php"?>

        </div>
    </section>
</main>

<?php get_footer(); ?>