=== My Plugin ===

Un plugin wordpress è un programma, una o più serie di funzioni, scritte in linguaggio di programmazione PHP, che aggiungono speciiche set di funzionalità o servizi al sito Wordpress,
che può essere perfettamente integrato con il sito utilizzando i punti di accesso e le modalità previste dal Plugin Application Programming Interface (API) di wordpress.

Es. 
Nome Plugin: My Plugin
Nome directory: my-plugin
Nome file php: my-plugin.php

La directory del plugin deve essere caricata in wp-content/plugins/

Considera di bloccare l'accesso diretto ai tuoi file PHP del tuo Plugin aggiungendo la riga seguente all'indirizzo di ognuno di essi, o di essere sicuri di non permettere l'esecuzione
di codice PHP sensibile prima di chiamare ogni funzione di Wordpress.

defined('ABSPATH') or die('No script kiddies please!');

defined() è una funzione PHP che controlla se una costante esiste o no, in altre parole se è definita o no.
ABSPATH è una costante PHP definita da Wordpress alla ine di wp-config.php e indica il percorso assoluto della directory Wordpress
die() è equivalente a exit() - exit mostra un messaggio e termina lo script corrente

Il readme dovrebbe avere al massimo 150 caratteri.

Molti Plugin di Wordpress svolgono il loro compito collegandosi ad uno o più "hooks" definiti in Wordpress. Quando Wordpress gira controlla per vedere se qualche Plugin ha 
registrato delle funzioni da eseguire in quel momento, ed in tal caso la funzione viene eseguita. Queste funzioni modificano il funzionamento di WordPress.

add_filter("the_content","add_line_to_footer");
function add_line_to_footer($content)
{
   if(is_single() && is_main_query()){
      $count = strlen($content);
      return $content.'<p>Son of a bitch!</p>'.$count;
   } //only if you're on a single screen for a post and only if it's the main query
   return $content;
}

// is_single()
// is_main_query()
// is_page()

2---------------------------

class WordCountAndTimePlugin
{
   function __construct()
   {
      add_action('admin_menu', array($this, 'adminPage'));
   }

   function adminPage()
   {
      add_options_page('Worsds Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this,'ourHTML')); //viene inserito nel menu impostazioni
   }

   /* 
   1. Titolo della pagina che vogliamo creare, title
   2. Testo del titolo nel menu laterale.
   3. Permessi - es manage_options
   4. slug (o short name) della pagina; usato alla fine dell'url.
   5. Funzione che visualizza il contenuto html che abbiamo nella pagina
*/
   function ourHTML()
   { ?>
      <div class="wrap">
         <h1>Word Count Settings</h1>
      </div>
   <?php }

   /*
      se non utilizziamo la classe dobbiamo sforzarci di cercare nomi univoci per le funzioni che non vadano in conflitto con altre funzioni già esistenti.
      all'interno della classe (nome unico) possiamo utilizzare i nomi che vogliamo
   */
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();



3--------------------------------

add_filter( 'woocommerce_coupon_message', 'filter_woocommerce_coupon_message', 10, 3 );
function filter_woocommerce_coupon_message( $msg, $msg_code, $coupon ) {
    // $applied_coupons = WC()->cart->get_applied_coupons(); // Get applied coupons

    if( $msg === __( 'Coupon code applied successfully.', 'woocommerce' ) && $coupon->get_code() === "promo60") {
        $msg = sprintf( 
            __( "The %s promotion code has been applied and redeemed successfully %s.", "woocommerce" ), 
            '<strong>' . $coupon->get_code() . '</strong>',$msg_code 
        );
    }

    return $msg;
}
