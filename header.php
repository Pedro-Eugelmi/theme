<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- O WordPress gerencia a tag title nativamente através do add_theme_support('title-tag') no functions.php, 
         mas caso seu tema não suporte, mantemos o fallback abaixo: -->
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Fontes e Ícones -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100..900&family=Inter:wght@100..900&display=swap" rel="stylesheet"/>

    <!-- Configuração do Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Configuração do Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-fixed-variant": "#444749",
                        "tertiary-fixed": "#e0e3e5",
                        "on-tertiary-container": "#fffeff",
                        "inverse-primary": "#a5c8ff",
                        "inverse-on-surface": "#ebf1ff",
                        "tertiary-fixed-dim": "#c4c7c9",
                        "surface-container-low": "#f0f3ff",
                        "error-container": "#ffdad6",
                        "tertiary-container": "#737678",
                        "on-secondary-container": "#3e6f49",
                        "outline-variant": "#c1c6d4",
                        "primary-fixed-dim": "#a5c8ff",
                        "secondary-fixed-dim": "#9ed3a5",
                        "on-tertiary": "#ffffff",
                        "surface-container-high": "#dee8ff",
                        "surface-tint": "#005faf",
                        "surface-container": "#e7eeff",
                        "on-error": "#ffffff",
                        "on-surface": "#121c2c",
                        "background": "#f9f9ff",
                        "surface-container-highest": "#d9e3f9",
                        "surface-bright": "#f9f9ff",
                        "on-primary-container": "#fffdff",
                        "on-secondary-fixed": "#00210b",
                        "secondary-container": "#b9f0c0",
                        "on-secondary-fixed-variant": "#1f502d",
                        "primary-fixed": "#d4e3ff",
                        "on-surface-variant": "#414752",
                        "inverse-surface": "#273141",
                        "outline": "#717783",
                        "on-tertiary-fixed": "#191c1e",
                        "surface-dim": "#d0daf0",
                        "on-primary": "#ffffff",
                        "primary-container": "#1976d2",
                        "secondary": "#386943",
                        "tertiary": "#5a5d5f",
                        "on-secondary": "#ffffff",
                        "error": "#ba1a1a",
                        "on-primary-fixed": "#001c3a",
                        "surface-container-lowest": "#ffffff",
                        "on-error-container": "#93000a",
                        "surface": "#f9f9ff",
                        "secondary-fixed": "#b9f0c0",
                        "primary": "#005dac",
                        "surface-variant": "#d9e3f9",
                        "on-background": "#121c2c",
                        "on-primary-fixed-variant": "#004786"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "base": "4px",
                        "container-max": "1200px",
                        "xl": "80px",
                        "lg": "48px",
                        "sm": "16px",
                        "md": "24px",
                        "xs": "8px"
                    },
                    "fontFamily": {
                        "label-md": ["Inter"],
                        "headline-lg-mobile": ["Hanken Grotesk"],
                        "display-lg": ["Hanken Grotesk"],
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Hanken Grotesk"],
                        "headline-md": ["Hanken Grotesk"],
                        "caption": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "500" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "display-lg": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "fontWeight": "600" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "caption": ["12px", { "lineHeight": "16px", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .material-symbols-outlined.fill { font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .headline { font-family: 'Hanken Grotesk', sans-serif; }
    </style>

    <!-- Hook essencial do WordPress para carregar plugins e scripts -->
    <?php wp_head(); ?>
</head>

<!-- O body_class() permite que o WP injete classes úteis na página (ex: page-id-5, logged-in) -->
<body <?php body_class('bg-background text-on-background min-h-screen flex flex-col'); ?>>

<!-- Novo TopNavBar Integrado -->
<header class="bg-white border-b-4 border-[#3C6D47] backdrop-blur-md text-[#1976d2] font-headline-md text-headline-md docked full-width top-0 flat no shadows sticky z-50">
    <div class="flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-16">
        
        <div class="flex items-center gap-xs">
            <!-- Link do WordPress envolvendo a logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img alt="Trovata Logo" class="h-8 w-auto" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcEjqWTZsBZ2GT7EH6j_ybZX6lx8OLiUOX6ASLSw3PqTBvH1GpsgdMy5KJisYW2QmQb3A8b0LoUoi-8dyOyUydU7R67OH-VUOqWNWVAOeVl2qgXuW4qvzC7rhA732ag0srxfMzyGrUvw_H7jSb4BDo1GQW0PbVM_aAKu9GsYJg0G6z0t3Nle0aQ2VP_w-5A_WYgEvnOviE2i7_e-iym5SbrB1re0ZQfbCuCbvPjV-Gt5tgUko7ivdkR5aEJnOSYNf2HgY"/>
            </a>
        </div>

        <?php if (false): ?>
            <nav class="hidden md:flex gap-md font-body-md text-body-md">
                <a class="text-on-surface-variant hover:text-[#1976d2] transition-colors duration-200" href="#">Produtos</a>
                <a class="text-on-surface-variant hover:text-[#1976d2] transition-colors duration-200" href="#">Desenvolvedores</a>
                <a class="text-on-surface-variant hover:text-[#1976d2] transition-colors duration-200" href="#">Recursos</a>
                <a class="text-[#1976d2] border-b-2 border-[#1976d2] pb-1 opacity-80 transition-opacity" href="#">Suporte</a>
            </nav>
        <?php endif ?>

        <div class="flex gap-sm items-center font-label-md text-label-md">
            <!-- Aqui você pode adicionar as URLs do WordPress depois, se precisar (ex: /wp-login.php)
            <a class="text-[#1976d2] hover:underline" href="#">Entrar</a> -->
            <a href="https://wa.me/5518991848492" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 bg-[#25D366] text-white px-5 py-2.5 rounded-lg hover:bg-[#20bd5a] transition-colors shadow-sm font-label-md text-label-md">
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 32 32" version="1.1">
                    <path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"/></svg>
                
                Fale Conosco
            </a>
        </div>
        
    </div>
</header>