<?php

function ail_add_admin_menu() {
    add_options_page('Automate Internal Links', 'Automate Internal Links', 'manage_options', 'automate_internal_links', 'ail_settings_page_content');
}
add_action('admin_menu', 'ail_add_admin_menu');

function ail_settings_page_content() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['ail_settings_nonce']) && wp_verify_nonce($_POST['ail_settings_nonce'], 'ail_save_settings')) {
        update_option('ail_keywords_options', $_POST['ail_keywords']);
    }

    $keywords_options = get_option('ail_keywords_options', []);

    ?>
    <style>
        /* ... (estilos existentes) ... */
        #addMore { cursor: pointer; color: blue; text-decoration: underline; }
        input[type=date], input[type=datetime-local], input[type=datetime], input[type=email], input[type=month], input[type=number], input[type=password], input[type=search], input[type=tel], input[type=text], input[type=time], input[type=url], input[type=week]{width: 100%;}
    </style>
    <div class="wrap">

        <form method="post">
            <?php wp_nonce_field('ail_save_settings', 'ail_settings_nonce'); ?>

            <!-- ... (contenido existente) ... -->
            <img src="<?php echo plugin_dir_url(__FILE__) . 'logo.png'; ?>" alt="Automate Internal Links Logo" style="width: 100px;"><h1><?php _e('Automate Internal Links Settings', 'automate-internal-links'); ?></h1>

            <div>
                <p>1. Crea enlaces internos automáticos en contenidos basados en palabras clave.</p>
                <p>2. Añade un atributo title al enlace, con el contenido de la palabra clave.</p>
                <p>3. Evita la creación de enlaces en palabras clave ya vinculadas.</p>
                <p>4. Evita enlazar a la misma URL de la página o publicación actual.</p>
                <p>5. Funciona en el contenido principal de las entradas y páginas de WordPress.</p>
                <p>6. Si WooCommerce está activo, se aplica también a las descripciones cortas de productos y a las descripciones de categorías de productos</p>
            </div>

            <table class="form-table" id="keywordsTable">
                <thead>
                    <tr>
                        <th><?php _e('Palabra clave', 'automate-internal-links'); ?></th>
                        <th><?php _e('Página de destino', 'automate-internal-links'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < max(10, count($keywords_options)); $i++) {
                        $keyword = isset($keywords_options[$i]['keyword']) ? $keywords_options[$i]['keyword'] : '';
                        $url = isset($keywords_options[$i]['url']) ? $keywords_options[$i]['url'] : '';
                    ?>
                        <tr>
                            <td><input style="width: 100%;" type="text" name="ail_keywords[<?php echo $i; ?>][keyword]" value="<?php echo esc_attr($keyword); ?>"></td>
                            <td><input style="width: 100%;" type="text" name="ail_keywords[<?php echo $i; ?>][url]" value="<?php echo esc_attr($url); ?>"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <p id="addMore" style="color: white;text-decoration: none;" class="button button-primary">Mostrar más</p> <!-- Botón para añadir más campos -->

            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Guardar cambios', 'automate-internal-links'); ?>">
            </p>
        </form>
    </div>

    <script>
        document.getElementById('addMore').addEventListener('click', function() {
            var table = document.getElementById('keywordsTable').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);

            for (var i = 0; i < 2; i++) {
                var cell = newRow.insertCell(i);
                var input = document.createElement('input');
                input.type = 'text';
                input.name = 'ail_keywords[' + table.rows.length + '][' + (i === 0 ? 'keyword' : 'url') + ']';
                cell.appendChild(input);
            }
        });
    </script>
    <?php
}
