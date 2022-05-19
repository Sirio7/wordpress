<?php
defined('ABSPATH') or die('No script kiddies please!');
/**
 * Plugin Name: My Plugin
 * Description: A truly amazing plugin.
 * Version: 1.0
 * Author: Giuseppe Di Stefano
 * Author URI: https://giuseppedistefano.altervista.org
 */

class WordCountAndTimePlugin
{
   function __construct()
   {
      add_action('admin_menu', array($this, 'adminPage'));
   }

   function adminPage()
   {
      add_options_page('Worsds Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this, 'ourHTML')); //viene inserito nel menu impostazioni
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
      <div class="wpwrap">
         <div class="wpbody">
            <div class="wbbody-content">
               <h1>Word Count Settings</h1>
               <div>
                  <h2>Simple form</h2>
                  <form action="">
                     <label for="">Input</label>
                     <input type="text">
                     <input type="submit">
                  </form>
               </div>
            </div>
         </div>
      </div>
<?php }

   /*
      se non utilizziamo la classe dobbiamo sforzarci di cercare nomi univoci per le funzioni che non vadano in conflitto con altre funzioni già esistenti.
      all'interno della classe (nome unico) possiamo utilizzare i nomi che vogliamo
   */
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();
