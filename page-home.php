<?php 
// O cabeçalho padrão do WP (Geralmente contém as tags <head> e a abertura do <body>)
// Nota: Certifique-se de adicionar as classes do body (bg-background text-on-background min-h-screen flex flex-col) no seu header.php
get_header(); 
?>


<main class="flex-grow flex flex-col items-center">
    
    <!-- Hero Search Section -->
    <section class="w-full bg-[#1976d2] py-xl flex flex-col items-center justify-center text-center px-gutter relative overflow-hidden">
        <!-- Abstract decorative background element -->
        <div class="absolute inset-0 pointer-events-none opacity-20 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
        
        <h1 class="font-display-lg text-display-lg text-white mb-xs relative z-10">Suporte Trovata</h1>
        <p class="font-body-lg text-body-lg text-[#e0e3e5] mb-lg relative z-10">Como podemos te ajudar hoje?</p>
        
<div class="w-full max-w-3xl relative z-10 px-4 md:px-0">
    <!-- Formulário de busca otimizado para Mobile e Desktop -->
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative flex items-center w-full h-14 md:h-16 rounded-full focus-within:shadow-[0_8px_24px_rgba(0,0,0,0.15)] bg-white border border-transparent focus-within:border-primary/20 overflow-hidden transition-all duration-300">

        <input 
            type="search"
            id="search"
            name="s" 
            value="<?php echo get_search_query(); ?>"
            placeholder="Buscar ajuda..." 
            class="peer h-full w-full outline-none text-base md:text-body-lg text-on-surface pl-6 md:pl-8 pr-3 bg-transparent border-none focus:ring-0 placeholder:text-outline-variant" 
            required
        />
        
        <button type="submit" class="h-full px-6 md:px-10 bg-[#3C6D47] text-white font-label-md text-sm md:text-base hover:bg-opacity-90 transition-colors rounded-r-full whitespace-nowrap shadow-sm">
            Buscar
        </button>
        
    </form>
</div>

    </section>

    <!-- Categories Grid -->
    <section class="w-full bg-[#f0f3ff] py-xl px-gutter relative border-t-8 border-[#3C6D47]">
        <div class="max-w-container-max mx-auto text-center">
            
            <h2 class="font-headline-lg text-headline-lg text-[#1976d2] mb-sm">Está começando com a Trovata?</h2>
            <p class="font-body-md text-body-md text-on-surface-variant mb-lg">Criamos alguns manuais para você!</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-md">
                
                <?php
                // Busca todas as categorias do WordPress
                $categories = get_categories(array(
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                    'hide_empty' => false // Exibe mesmo se não tiver posts
                ));

                // Array com as classes de cores do seu layout novo para manter o visual dinâmico
                $bg_colors = [
                    'bg-[#1976d2]', 
                    'bg-[#3C6D47]', 
                    'bg-[#1976d2] bg-opacity-80', 
                    'bg-[#3C6D47] bg-opacity-80', 
                    'bg-tertiary', 
                    'bg-inverse-surface'
                ];

                if (!empty($categories)) :
                    $color_index = 0; // Contador para alternar as cores do array
                    
                    foreach ($categories as $category) :
                        // Link da categoria
                        $category_link = get_category_link($category->term_id);

                        // Verificação do ACF para a imagem da categoria
                        $imagem_acf = false;
                        if (function_exists('get_field')) {
                            $imagem_acf = get_field('imagem_categoria', 'category_' . $category->term_id);
                        }
                        ?>
                        
                        <!-- Card Dinâmico -->
                        <a href="<?php echo esc_url($category_link); ?>" class="group flex flex-col items-center justify-center bg-white border border-[#c1c6d4] rounded-xl overflow-hidden hover:shadow-[0_4px_12px_rgba(0,0,0,0.1)] transition-all duration-300 transform hover:-translate-y-1">
                            
                            <div class="w-full h-32 bg-[#1976d2] flex items-center justify-center text-white">
                                <?php if ($imagem_acf) : ?>
                                    <img src="<?php echo esc_url($imagem_acf); ?>" alt="<?php echo esc_attr($category->name); ?>" class="h-16 w-auto object-contain">
                                <?php else : ?>
                                    <!-- Ícone de fallback caso não tenha imagem no ACF -->
                                    <span class="material-symbols-outlined text-display-lg fill" style="font-size: 64px;">menu_book</span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="p-md w-full text-center border-t border-[#c1c6d4] bg-white group-hover:bg-[#f0f3ff] transition-colors">
                                <h3 class="font-headline-md text-headline-md text-on-surface">
                                    <?php echo esc_html($category->name); ?>
                               </h3>
                            </div>
                            
                        </a>

                    <?php 
                    endforeach;
                else :
                ?>
                    <div class="col-span-full text-center py-8">
                        <p class="font-body-md text-body-md text-on-surface-variant">Nenhuma categoria encontrada.</p>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>