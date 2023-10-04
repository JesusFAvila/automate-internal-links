# Automate Internal Links - Versión 2.0

Plugin de WordPress para automatizar la creación de enlaces internos en el contenido basado en palabras clave específicas.

## Características:

1. Crea enlaces internos automáticos en contenidos basados en palabras clave.
2. Añade un atributo title al enlace, con el contenido de la palabra clave.
3. Evita la creación de enlaces en palabras clave ya vinculadas.
4. Evita enlazar a la misma URL de la página o publicación actual.
5. Funciona en el contenido principal de las entradas y páginas de WordPress.
6. Si WooCommerce está activo, se aplica también a las descripciones cortas de productos y a las descripciones de categorías de productos.
7. Panel de administración para configurar las palabras clave y sus respectivas URLs.

## Cómo usar:

1. Instala y activa el plugin.
2. Ve a `Ajustes` -> `Automate Internal Links`.
3. Ingresa las palabras clave y las URLs asociadas.
4. Guarda los cambios.

## Futuras actualizaciones (Versión 3.0):

1. Añadir capacidad para más campos de palabras clave y URL.
2. Implementar mejoras de seguridad.
3. Optimización del código y mejor rendimiento.

## Soporte y Contribuciones:

Para reportar problemas o contribuir al desarrollo de este plugin, por favor [visita nuestro repositorio](#).

## Licencia:

GPL-2.0 License

## Notas de la última actualización 
1. Aumento de la capacidad para añadir campos adicionales:

a. Se añadió un botón "Añadir más campos" en la página de ajustes que permite al usuario agregar dinámicamente más campos de palabras clave y URLs.
b. Se utiliza JavaScript para agregar estos campos en el formulario.

2. Añadir un logotipo del plugin en el panel de administración:
a. Se añadió un logotipo en la parte superior de la página de ajustes. (Nota: Debes reemplazar "path_to_your_logo.png" con la ruta real de tu logotipo).

3. Características de seguridad:
1. Se validan todas las entradas antes de guardarlas en la base de datos.
2. Se verifica el nonce antes de procesar cualquier dato del formulario para prevenir ataques CSRF.
3. Se escapan correctamente los datos al mostrarlos en la página de ajustes para prevenir ataques XSS.

