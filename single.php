<?php get_header(); ?>

<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-lg md:py-xl grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <?php 
        // Pegando as informações da categoria do post atual
        $categories = get_the_category();
        $cat_id     = !empty($categories) ? $categories[0]->term_id : 0;
        $cat_name   = !empty($categories) ? esc_html($categories[0]->name) : 'Geral';
        $cat_link   = !empty($categories) ? esc_url(get_category_link($cat_id)) : '#';
        ?>

        <!-- Left / Main Article Column -->
        <article class="lg:col-span-8 space-y-lg">
            
            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumb" class="text-caption font-caption text-on-surface-variant flex items-center space-x-xs">
                <a class="hover:text-primary transition-colors" href="<?php echo esc_url(home_url('/')); ?>">Início</a>
                <span class="material-symbols-outlined text-[16px]">></span>
                <a class="hover:text-primary transition-colors" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
                <span class="material-symbols-outlined text-[16px]">></span>
                <span aria-current="page" class="text-on-surface line-clamp-1"><?php the_title(); ?></span>
            </nav>
            
            <!-- Title & Meta -->
            <header class="space-y-sm">
                <h1 class="text-display-lg font-display-lg md:text-display-lg font-bold text-on-surface tracking-tight">
                    <?php the_title(); ?>
                </h1>
                <div class="flex items-center text-caption font-caption text-on-surface-variant space-x-md">
                    <span class="flex items-center gap-xs">
                        Última atualização: <?php echo get_the_modified_date('d \d\e M, Y'); ?>
                    </span>
                    <!-- O WordPress não calcula tempo de leitura nativamente, deixei um valor fixo estético como no seu HTML. 
                         Se quiser ocultar, basta apagar a linha abaixo -->
                    <span class="flex items-center gap-xs">
                        5 min de leitura
                    </span>
                </div>
            </header>
            
            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="w-full aspect-video rounded-xl overflow-hidden border border-outline-variant shadow-sm bg-white relative group flex items-center justify-center">
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-105']); ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>
                </div>
            <?php endif; ?>
            
            <!-- Article Body -->
            <div class="prose max-w-none text-body-lg font-body-lg text-on-surface space-y-md">
                <?php 
                // Exibe o conteúdo exato criado no painel do WordPress
                the_content(); 
                ?>
            </div>
            
            <!-- Feedback Section -->
             <?php if (false): ?>
            <div class="mt-xl pt-lg border-t-4 border-primary bg-white rounded-xl p-lg text-center shadow-md">
                <h3 class="text-headline-md font-headline-md text-primary mb-xs">Este artigo foi útil?</h3>
                <p class="text-body-md font-body-md text-on-surface-variant mb-md">Seu feedback nos ajuda a melhorar nossa documentação de suporte.</p>
                <div class="flex justify-center gap-md">
                    <button class="flex items-center gap-xs px-md py-sm bg-white border border-primary text-primary rounded-full hover:bg-primary hover:text-white transition-all text-label-md font-label-md font-medium shadow-sm hover:shadow-md">
                        <span class="material-symbols-outlined text-[20px]">thumb_up</span> Sim
                    </button>
                    <button class="flex items-center gap-xs px-md py-sm bg-white border border-primary text-primary rounded-full hover:bg-secondary hover:text-white hover:border-secondary transition-all text-label-md font-label-md font-medium shadow-sm hover:shadow-md">
                        <span class="material-symbols-outlined text-[20px]">thumb_down</span> Não
                    </button>
                </div>
            </div>
            <?php endif;?>
            
        </article>
        
        <!-- Right / Sidebar -->
        <aside class="lg:col-span-4 space-y-lg mt-lg lg:mt-0">
            
            <!-- Artigos Relacionados (Dinâmico: 3 artigos da mesma categoria) -->
            <?php if ($cat_id) : ?>
                <?php
                $related_query = new WP_Query(array(
                    'category__in'   => array($cat_id),     // Puxa da mesma categoria
                    'post__not_in'   => array(get_the_ID()),// Exclui o post atual que o usuário já está lendo
                    'posts_per_page' => 3,                  // Limita a 3 resultados
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                ));

                if ($related_query->have_posts()) :
                ?>
                    <div class="space-y-sm">
                        <h3 class="text-headline-sm font-headline-sm font-bold text-primary mb-md">Artigos Relacionados</h3>
                        
                        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                            <a class="block bg-white border-l-4 border-transparent rounded-lg p-sm hover:border-primary shadow-sm hover:shadow-md transition-all group" href="<?php the_permalink(); ?>">
                                <h4 class="text-body-md font-body-md font-semibold text-on-surface group-hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </h4>
                                <p class="text-caption font-caption text-on-surface-variant mt-1 line-clamp-2">
                                    <?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?>
                                </p>
                            </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                        
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
        <!-- Need Help Support CTA (Layout Claro Padronizado) -->
        <div class="bg-primary/5 border border-primary/20 rounded-xl p-md flex flex-col items-center text-center sticky top-24 shadow-sm">
            
            <h3 class="text-headline-md font-headline-md font-bold text-on-background mb-2">Ainda precisa de ajuda?</h3>
            <p class="text-body-md font-body-md text-on-surface-variant mb-6">Nossa equipe de suporte está pronta para atender você.</p>
            
            <a href="https://wa.me/5518991848492" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center bg-[#25D366] justify-center px-4 py-3 font-label-md text-label-md font-medium text-white rounded hover:bg-[#20bd5a] transition-colors shadow-sm gap-2">
                
                <!-- SVG do WhatsApp -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 32 32" version="1.1">
                    <path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"/>
                </svg>
                
                Contatar Suporte
            </a>
        </div>
                    
        </aside>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>