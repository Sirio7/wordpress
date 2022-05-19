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

