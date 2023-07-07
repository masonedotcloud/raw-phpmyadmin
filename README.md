# Applicativo di gestione del database

Questo applicativo è stato sviluppato per consentire la gestione di un database tramite un'interfaccia web. Fornisce funzionalità per visualizzare, modificare ed eliminare record all'interno delle tabelle del database.

## Caratteristiche principali

- Visualizzazione del contenuto delle tabelle del database.
- Aggiunta di nuovi record alle tabelle.
- Modifica dei record esistenti.
- Eliminazione dei record.

## Requisiti di sistema

- PHP 5.6 o versione successiva
- Server web (ad esempio Apache)
- Database MySQL

## Configurazione

1. Assicurarsi di avere un server web con PHP e MySQL installati e funzionanti.
2. Creare un nuovo database nel server MySQL o utilizzare un database esistente.
3. Aprire il file `config.php` e modificare le seguenti variabili per riflettere le proprie impostazioni:

   ```php
   // Configurazione del database
   $dbHost = 'localhost';  // Indirizzo del server MySQL
   $dbUsername = 'username';  // Nome utente del database
   $dbPassword = 'password';  // Password del database
   $dbName = 'nome_database';  // Nome del database

   ```

4. Assicurarsi che il file `config.php` sia incluso correttamente in tutti gli altri file del progetto.

## Utilizzo

1. Avviare il server web e accedere all'applicativo tramite il proprio browser.
2. Nella pagina iniziale, saranno elencate tutte le tabelle presenti nel database.
3. Fare clic su una tabella per visualizzarne il contenuto.
4. Nella pagina del contenuto della tabella, saranno visualizzati tutti i record presenti, insieme alle opzioni di modifica ed eliminazione.
5. Per aggiungere un nuovo record, fare clic sul pulsante "Aggiungi record" e compilare il modulo.
6. Per modificare un record esistente, fare clic sul pulsante "Modifica" accanto al record desiderato e apportare le modifiche nel modulo.
7. Per eliminare un record, fare clic sul pulsante "Elimina" accanto al record desiderato.

## Personalizzazione

- Per personalizzare il layout delle pagine, è possibile modificare i file di intestazione (`head.php`) e piè di pagina (`foot.php`) presenti nella directory principale.

## Possibili miglioramenti futuri

- Implementare funzionalità di ricerca e ordinamento dei record.
- Aggiungere supporto per altri tipi di database, oltre a MySQL.
- Implementare autenticazione e autorizzazione per limitare l'accesso all'applicativo.
- Migliorare l'interfaccia utente per rendere l'esperienza di utilizzo più intuitiva.

## Segnalazione di problemi

Se si riscontrano errori, bug o si desidera suggerire miglioramenti, è possibile aprire una nuova issue nella sezione

 Issues del repository.

## Contributi

Sono benvenuti i contributi per migliorare l'applicativo. Se si desidera contribuire, è possibile aprire una pull request nel repository.

## Licenza

Questo progetto è distribuito con la licenza [MIT](https://opensource.org/licenses/MIT).

---
