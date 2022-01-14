<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'lamis' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1oHKIrF6r q%]Qs+S(77:8I3-@MdYDh-L4gMVQu.OuhIl(C4)]}j>>@m1{y.cmd<' );
define( 'SECURE_AUTH_KEY',  'l9}w7C/F)u1xfY*,iV.cY5cF7ediyODkOi.;@Vw%SwM?9@=W.E`swG6^FWCKWqpN' );
define( 'LOGGED_IN_KEY',    'La~P3 S_ISR)-x;v:IHh`zxu48wp84@!duYi`-U-lu`#Fo?F}sO5ojb0l&3q7>!X' );
define( 'NONCE_KEY',        'nl1TC2FnU7e<xz,&8%bCvgUgpA2l3-Vox4pwEB?K2r:GXmwd&iEUwc1#&Xh^.eZw' );
define( 'AUTH_SALT',        'Fz(s|HHLQ4ZF|={^5AFSl%p<aFKw#DL7Y=](/$D{.)`yhk0tEK?@(%n )5qgLtV^' );
define( 'SECURE_AUTH_SALT', 'h)Gcr<ivs@6o_!43CsjJlT.za_(|tu1rdh!}S#*~.61u60V&+^;kKAw<q~?%,awr' );
define( 'LOGGED_IN_SALT',   'nw%)]4xh-msIAK|)o2c->QrI}E(jm;$vX[RtyeZ9jafV7Y^tJdqr8@lWyZ/D?k_$' );
define( 'NONCE_SALT',       '7HCY4|iE)_I2k<1<FUPce^.9#arzZ*oF?gr-wQ%U-3rF/*2G@U 2n3[n5V3yLV4O' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
