<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'oxfon');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'swordfish');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '?Z2Cp#p{qlm|/|5H~ bglUR9(k8v;FZl-xG5WKRBA)k`<g]|>_U:gUCY|2YUq>qy'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'jO<M,4 @+_Db=v.luUy|]@8y|N{h]ybpPm85+RV+xKm->_+hQc7dC,84z3Zed=.='); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', '+{2!<j(36vfyen^&<x}5|U)8[R~M8~i_v.r1t,E,IXu)_w`:64:SmuX7u~w9~dd7'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'G<X[#@.^oH4o(YgWI>p+>r-ccg(nDY;Iyi?p:GC/K_-;}ke+&|*nr4)JG6BfNrUm'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'OLM%b+DfEVEI{Fxu{gb*{uyamD%J/_Uz+/dO(##Qtfd>Xf+Z]BrclqKDP|js0V[N'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'P$KF8uKH<^g^atf^xRP#7?dBE)FIEu+R)c_oe82(@UU%%FE+awOq7>=CRLSYIB<u'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'hU*Ub$TCc^t4i:v[xQWEX=[C:(L j,|9CdqWY(lS+[AStRc A[uko*VoWuH+vuOL'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '8Js-^N4NLZ&o]+].IzB4+ be{wf^|&,~a$w1+bAT++nMOVj(%X4hF6HFrDarF=F;'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wiK_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

